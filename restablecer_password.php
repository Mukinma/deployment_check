<?php
session_start();
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'es';

// Conexión a la base de datos
 $mysqli = new mysqli("localhost", "u978931113_syb_user", "]q[W4^Sv", "u978931113_syb");
if ($mysqli->connect_errno) {
    die("Error al conectar con la base de datos");
}

$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $nueva_contrasena = $_POST['password'];
    $confirmar_contrasena = $_POST['confirm_password'];

    // Validación básica
    if ($nueva_contrasena !== $confirmar_contrasena) {
        $mensaje = ($lang == 'es') ? "Las contraseñas no coinciden." : "Passwords do not match.";
    } elseif (strlen($nueva_contrasena) < 6) {
        $mensaje = ($lang == 'es') ? "La contraseña debe tener al menos 6 caracteres." : "Password must be at least 6 characters.";
    } else {
        // Verificamos token
        $stmt = $mysqli->prepare("SELECT usuario_id, creado_en FROM password_resets WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $usuario_id = $row['usuario_id'];
            $creado_en = strtotime($row['creado_en']);

            // Validar que el token no haya expirado (ej. 1 hora)
            if (time() - $creado_en > 3600) {
                $mensaje = ($lang == 'es') ? "El enlace ha expirado." : "The link has expired.";
            } else {
                // Encriptar y actualizar contraseña
                $hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
                $stmt2 = $mysqli->prepare("UPDATE usuarios SET contraseña = ? WHERE id = ?");
                $stmt2->bind_param("si", $hash, $usuario_id);
                $stmt2->execute();

                // Eliminar token
                $stmt3 = $mysqli->prepare("DELETE FROM password_resets WHERE token = ?");
                $stmt3->bind_param("s", $token);
                $stmt3->execute();

                $mensaje = ($lang == 'es') ? "Contraseña restablecida con éxito." : "Password successfully reset.";
            }
        } else {
            $mensaje = ($lang == 'es') ? "Token no válido." : "Invalid token.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($lang == 'es') ? "Restablecer contraseña" : "Reset Password" ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            padding: 40px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }
        input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
        }
        .success {
            color: green;
            margin-top: 20px;
        }
        .error {
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2><?php echo ($lang == 'es') ? "Restablecer contraseña" : "Reset Password" ?></h2>

    <?php if (!empty($mensaje)): ?>
        <div class="<?php echo (strpos($mensaje, 'éxito') || strpos($mensaje, 'successfully')) ? 'success' : 'error' ?>">
            <?php echo htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>

    <?php if (!isset($mensaje) || (!str_contains($mensaje, 'éxito') && !str_contains($mensaje, 'successfully'))): ?>
    <form method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token) ?>">
        <label><?php echo ($lang == 'es') ? "Nueva contraseña:" : "New password:" ?></label>
        <input type="password" name="password" required>

        <label><?php echo ($lang == 'es') ? "Confirmar contraseña:" : "Confirm password:" ?></label>
        <input type="password" name="confirm_password" required>

        <input type="submit" value="<?php echo ($lang == 'es') ? "Restablecer" : "Reset" ?>">
    </form>
    <?php endif; ?>
</div>
</body>
</html>
