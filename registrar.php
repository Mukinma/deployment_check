<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");
$conexion = connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre     = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $usuario    = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $email      = isset($_POST['email']) ? trim($_POST['email']) : '';
    $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';
    $confirmar  = isset($_POST['confirmar_contraseña']) ? $_POST['confirmar_contraseña'] : '';
    $id_cargo   = 2;

    // Validaciones básicas
    if (empty($nombre) || empty($usuario) || empty($email) || empty($contraseña) || empty($confirmar)) {
        $_SESSION['mensaje_error'] = "❌ Todos los campos son obligatorios.";
        header("Location: registro.php");
        exit;
    }

    if (strlen($usuario) < 4 || strlen($usuario) > 20) {
        $_SESSION['mensaje_error'] = "❌ El nombre de usuario debe tener entre 4 y 20 caracteres.";
        header("Location: registro.php");
        exit;
    }

    if (strlen($nombre) > 50) {
        $_SESSION['mensaje_error'] = "❌ El nombre es demasiado largo (máximo 50 caracteres).";
        header("Location: registro.php");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensaje_error'] = "❌ Formato de correo no válido.";
        header("Location: registro.php");
        exit;
    }

    if (strlen($contraseña) < 6) {
        $_SESSION['mensaje_error'] = "❌ La contraseña debe tener al menos 6 caracteres.";
        header("Location: registro.php");
        exit;
    }

    if ($contraseña !== $confirmar) {
        $_SESSION['mensaje_error'] = "❌ Las contraseñas no coinciden.";
        header("Location: registro.php");
        exit;
    }

    // Verificar usuario existente
    $usuarioSafe = mysqli_real_escape_string($conexion, $usuario);
    $emailSafe = mysqli_real_escape_string($conexion, $email);

    $verificarUsuario = mysqli_query($conexion, "SELECT id FROM usuarios WHERE usuario = '$usuarioSafe'");
    if (mysqli_num_rows($verificarUsuario) > 0) {
        $_SESSION['mensaje_error'] = "❌ El nombre de usuario ya está registrado.";
        header("Location: registro.php");
        exit;
    }

    // Verificar email existente
    $verificarEmail = mysqli_query($conexion, "SELECT id FROM usuarios WHERE email = '$emailSafe'");
    if (mysqli_num_rows($verificarEmail) > 0) {
        $_SESSION['mensaje_error'] = "❌ El correo ya está registrado.";
        header("Location: registro.php");
        exit;
    }

    // Preparar datos para insertar
    $nombreSan = mysqli_real_escape_string($conexion, htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'));
    $usuarioSan = $usuarioSafe;
    $emailSan = $emailSafe;
    $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);

    // Manejo foto de perfil
    $fotoPerfilDB = NULL; // Por defecto NULL si no se sube

    if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] !== UPLOAD_ERR_NO_FILE) {
        $foto = $_FILES['fotoPerfil'];

        // Validar error en subida
        if ($foto['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['mensaje_error'] = "❌ Error al subir la foto de perfil.";
            header("Location: registro.php");
            exit;
        }

        // Validar que sea imagen con getimagesize (acepta cualquier formato válido)
        $esImagen = getimagesize($foto['tmp_name']);
        if ($esImagen === false) {
            $_SESSION['mensaje_error'] = "❌ El archivo no es una imagen válida.";
            header("Location: registro.php");
            exit;
        }

        // Validar tamaño <= 2MB
        $maxFileSize = 2 * 1024 * 1024;
        if ($foto['size'] > $maxFileSize) {
            $_SESSION['mensaje_error'] = "❌ La foto de perfil debe ser menor a 2MB.";
            header("Location: registro.php");
            exit;
        }

        // Crear carpeta si no existe
        $uploadDir = 'imagenUsuarios/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generar nombre único con extensión original
        $ext = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
        $nombreFoto = uniqid('perfil_', true) . '.' . $ext;
        $rutaDestino = $uploadDir . $nombreFoto;

        if (!move_uploaded_file($foto['tmp_name'], $rutaDestino)) {
            $_SESSION['mensaje_error'] = "❌ No se pudo guardar la foto de perfil.";
            header("Location: registro.php");
            exit;
        }

        $fotoPerfilDB = mysqli_real_escape_string($conexion, $nombreFoto);
    }

    // Insertar en BD
    $sql = "INSERT INTO usuarios (nombre, usuario, email, contraseña, id_cargo, foto_perfil)
            VALUES ('$nombreSan', '$usuarioSan', '$emailSan', '$contraseñaHash', $id_cargo, " . ($fotoPerfilDB ? "'$fotoPerfilDB'" : "NULL") . ")";

    if (mysqli_query($conexion, $sql)) {
        $_SESSION['registro_exitoso'] = "✅ Usuario registrado correctamente. ¡Bienvenido!";
        header("Location: inicioSesion.php");
        exit;
    } else {
        $_SESSION['mensaje_error'] = "❌ Error al registrar: " . mysqli_error($conexion);
        header("Location: registro.php");
        exit;
    }
} else {
    $_SESSION['mensaje_error'] = "⚠️ Acceso no válido. Solo se permiten solicitudes POST.";
    header("Location: registro.php");
    exit;
}
?>

