<?php
session_start();
$lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'es');
$_SESSION['lang'] = $lang;
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang == 'es' ? 'Login' : 'Login'; ?></title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!-- Asegura que esté cargado -->
    <style>
        .language-toggle {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .password-wrapper {
            position: relative;
            display: inline-block;
        }
        .password-wrapper input {
            padding-right: 30px;
        }
        .password-wrapper .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }
        .language-toggle {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .eye-button {
            position: absolute;
            right: 10px;
            top: 38px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        .password-wrapper {
            position: relative;
        }

        /* Título con texto negro y la imagen con contorno de la figura */
        h1 {
            display: flex;
            align-items: center;
            gap: 15px;
            color: black;
            font-size: 2rem;
            font-weight: bold;
        }
       h1 img {
            height: 4cm;
            width: auto;
            border: none;
            border-radius: 0;
            filter: drop-shadow(0 0 3px black) drop-shadow(0 0 3px black);
            position: relative;
            top: -10px;     /* Mueve la imagen hacia arriba */
            right: -5px;   /* Mueve la imagen hacia la derecha */
        }
    </style>
</head>
<body>
    <!-- Botón de idioma -->
    <div class="language-toggle" onclick="toggleLanguage()">
        <img id="flag-icon" src="IMG/<?php echo $lang == 'es' ? 'esp.png' : 'eng.png'; ?>" alt="Idioma">
    </div>

    <form action="validar.php?lang=<?php echo $lang; ?>" method="post">
        <input type="hidden" name="lang" value="<?php echo $lang; ?>">
        
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'usuario') {
                echo '<p style="color:red; text-align:center;">'.($lang == 'es' ? 'ERROR EN LA AUTENTICACIÓN: Usuario no encontrado.' : 'AUTHENTICATION ERROR: User not found.').'</p>';
            } elseif ($_GET['error'] == 'contraseña') {
                echo '<p style="color:red; text-align:center;">'.($lang == 'es' ? 'ERROR EN LA AUTENTICACIÓN: Contraseña incorrecta.' : 'AUTHENTICATION ERROR: Incorrect password.').'</p>';
            }
        }
        ?>
     <h1>
            <?php echo $lang == 'es' ? 'Login' : 'Login'; ?>
            <img src="imagenWeb/img9.png" alt="Icono Login" />
        </h1>
        <a href="index.php?lang=<?php echo $lang; ?>" class="btn-regresar"><?php echo $lang == 'es' ? '← Regresar' : '← Back'; ?></a>

        <p>
            <span><?php echo $lang == 'es' ? 'Usuario' : 'Username'; ?></span>
            <input type="text" 
                   placeholder="<?php echo $lang == 'es' ? 'Ingrese su nombre' : 'Enter your username'; ?>" 
                   name="usuario" required>
        </p>

        <p>
            <span><?php echo $lang == 'es' ? 'Contraseña' : 'Password'; ?></span><br>
            <div class="password-wrapper">
                <input type="password" id="contraseña" 
                       placeholder="<?php echo $lang == 'es' ? 'Ingrese su contraseña' : 'Enter your password'; ?>" 
                       name="contraseña" required>
                <i id="toggle-password" class="fas fa-eye toggle-password"></i>
            </div>
        </p>

        <input type="submit" value="<?php echo $lang == 'es' ? 'Ingresar' : 'Login'; ?>">
        <p style="text-align: center; margin-top: 10px;">
            <a href="recuperarPassword.php?lang=<?php echo $lang; ?>">
                <?php echo $lang == 'es' ? '¿Olvidaste tu contraseña?' : 'Forgot your password?'; ?>
            </a>
        </p>

        <p style="text-align: center; margin-top: 20px;">
            <span><?php echo $lang == 'es' ? '¿No tienes una cuenta?' : 'Don\'t have an account?'; ?></span>
            <a href="registro.php?lang=<?php echo $lang; ?>" class="btn-registro"><?php echo $lang == 'es' ? 'Regístrate' : 'Register'; ?></a>
        </p>
    </form>

    <script>
        // Mostrar/ocultar contraseña con icono ojito
        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordField = document.getElementById('contraseña');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });

        // Traducción dinámica
        let currentLang = '<?php echo $lang; ?>';

        function toggleLanguage() {
            currentLang = currentLang === 'es' ? 'en' : 'es';
            document.getElementById('flag-icon').src = currentLang === 'es' ? 'IMG/esp.png' : 'IMG/eng.png';
            localStorage.setItem('language', currentLang);
            
            // Redirigir para aplicar cambios en PHP
            window.location.href = window.location.pathname + '?lang=' + currentLang;
        }

        // Cargar idioma guardado
        window.addEventListener('DOMContentLoaded', function() {
            var savedLang = localStorage.getItem('language') || '<?php echo $lang; ?>';
            if(savedLang !== '<?php echo $lang; ?>') {
                window.location.href = window.location.pathname + '?lang=' + savedLang;
            }
        });
    </script>
</body>
</html>
