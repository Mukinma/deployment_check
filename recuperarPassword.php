<?php
session_start();
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'es';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $lang == 'es' ? 'Recuperar Contraseña' : 'Recover Password'; ?></title>
    <style>
        /* Mensajes de éxito y error */
        .msg {
            text-align: center;
            margin: 20px auto;
            padding: 15px 20px;
            border-radius: 12px;
            font-weight: bold;
            max-width: 400px;
            animation: fadeInMsg 0.8s ease-in-out;
        }
        .msg.success {
            background-color: rgba(46, 204, 113, 0.2);
            color: #2ecc71;
            border: 2px solid #2ecc71;
        }
        .msg.error {
            background-color: rgba(231, 76, 60, 0.2);
            color: #e74c3c;
            border: 2px solid #e74c3c;
        }
        @keyframes fadeInMsg {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Otros estilos visuales... */
        body {
            background: linear-gradient(135deg,rgb(60, 88, 67),rgb(27, 76, 42));
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            animation: fadeInBg 1.5s ease forwards;
        }
        @keyframes fadeInBg {
            from { background-position: 0 0; }
            to { background-position: 100% 100%; }
        }
        h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            letter-spacing: 2px;
            animation: slideDown 1s ease forwards;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px);}
            to { opacity: 1; transform: translateY(0);}
        }
        form {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px 25px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            animation: fadeInForm 1.2s ease forwards;
        }
        @keyframes fadeInForm {
            from { opacity: 0; transform: translateY(20px);}
            to { opacity: 1; transform: translateY(0);}
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 10px;
            font-size: 1.1rem;
            user-select: none;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            outline: none;
            background: rgba(255,255,255,0.15);
            color: #fff;
            box-shadow: inset 2px 2px 5px rgba(0,0,0,0.2);
        }
        input[type="text"]:focus {
            box-shadow: 0 0 8px 2px #a29bfe;
            background: rgba(255,255,255,0.3);
        }
        input[type="submit"] {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            background:rgb(52, 141, 46);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 5px 15px rgba(21, 78, 11, 0.6);
        }
        input[type="submit"]:hover {
            background-color:rgb(105, 192, 109);
            box-shadow: 0 8px 20px rgba(124, 219, 122, 0.8);
        }
        p.link-back {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
            user-select: none;
        }
        p.link-back a {
            color: #dfe6e9;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        p.link-back a:hover {
            color:rgb(160, 254, 155);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <main>
        <h2><?php echo $lang == 'es' ? 'Recuperar Contraseña' : 'Recover Password'; ?></h2>

        <?php
        if (isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
        ?>

        <form action="enviar_recuperacion.php?lang=<?php echo $lang; ?>" method="post" novalidate>
            <p>
                <label for="usuario"><?php echo $lang == 'es' ? 'Ingresa tu correo o nombre de usuario:' : 'Enter your email or username:'; ?></label>
                <input type="text" id="usuario" name="usuario" required autocomplete="username" />
            </p>
            <input type="submit" value="<?php echo $lang == 'es' ? 'Enviar' : 'Send'; ?>">
            <p class="link-back">
                <a href="inicioSesion.php"><?php echo $lang == 'es' ? '← Volver al Login' : '← Back to Login'; ?></a>
            </p>
        </form>
    </main>
</body>
</html>

