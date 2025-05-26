<?php
session_start();
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'es';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer-master/src/SMTP.php';
require_once __DIR__ . '/PHPMailer-master/src/Exception.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);

    $mysqli = new mysqli("localhost", "u978931113_syb_user", "]q[W4^Sv", "u978931113_syb");
    if ($mysqli->connect_errno) {
        $mensaje = "<p class='msg error'>Error de conexión a la base de datos</p>";
    } else {
        $stmt = $mysqli->prepare("SELECT id, email FROM usuarios WHERE usuario = ? OR email = ? LIMIT 1");
        $stmt->bind_param("ss", $usuario, $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $userId = $row['id'];
            $email = $row['email'];

            $token = bin2hex(random_bytes(32));
            $fecha = date("Y-m-d H:i:s");

            $stmt2 = $mysqli->prepare("INSERT INTO password_resets (usuario_id, token, creado_en) VALUES (?, ?, ?)");
            $stmt2->bind_param("iss", $userId, $token, $fecha);
            $stmt2->execute();

            $url_base = "https://tusitio.com/restablecer_password.php";
            $link = $url_base . "?token=" . $token . "&lang=" . $lang;

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'roxanacodeorozco77@gmail.com';
                $mail->Password = '7314 5134'; // Asegúrate de usar un app password real.
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('tu_correo@gmail.com', 'Soporte');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = ($lang == 'es') ? 'Recuperación de contraseña' : 'Password Recovery';
                $mail->Body = ($lang == 'es')
                    ? "Hola,<br><br>Haz clic en el siguiente enlace para restablecer tu contraseña:<br><a href='$link'>$link</a><br><br>Si no solicitaste esto, puedes ignorar este mensaje."
                    : "Hello,<br><br>Click the following link to reset your password:<br><a href='$link'>$link</a><br><br>If you did not request this, you can ignore this message.";

                $mail->send();

                $mensaje = "<p class='msg success'>" .
                    (($lang == 'es')
                        ? "Si el usuario existe, se enviaron instrucciones de recuperación a su correo registrado."
                        : "If the user exists, recovery instructions have been sent to the registered email.") .
                    "</p>";
            } catch (Exception $e) {
                $mensaje = "<p class='msg error'>Error al enviar el correo: {$mail->ErrorInfo}</p>";
            }
        } else {
            $mensaje = "<p class='msg error'>" .
                (($lang == 'es')
                    ? "No se encontró el usuario o correo."
                    : "User or email not found.") .
                "</p>";
        }
        $stmt->close();
        $mysqli->close();
    }

    // Guardar el mensaje en sesión y redirigir
    $_SESSION['mensaje'] = $mensaje;
    header("Location: recuperarPassword.php?lang=$lang");
    exit;
}
?>
