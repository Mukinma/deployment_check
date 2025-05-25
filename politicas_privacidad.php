<?php
// politicas_privacidad.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Políticas de Privacidad</title>
       <link rel="stylesheet" href="estilos.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Source Sans Pro', sans-serif;
    }

    body {
        background: linear-gradient(145deg, #eaf4ea, #ffffff);
        color: #333;
        max-width: 800px;
        margin: 3rem auto;
        padding: 2rem 3rem;
        line-height: 1.7;
        font-size: 18px;
        border-radius: 16px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1s ease-in-out;
    }

    h1, h2 {
        font-family: 'Poppins', sans-serif;
        color: #406837;
        font-weight: 700;
    }

    h1 {
        font-size: 2.8rem;
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
        animation: slideDown 0.8s ease-out;
    }

    h1::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background-color: #a5c882;
        margin: 0.5rem auto 0;
        border-radius: 5px;
        animation: expandBar 1s ease-out forwards;
    }

    h2 {
        font-size: 1.8rem;
        margin-top: 2.5rem;
        border-bottom: 2px solid #a5c882;
        padding-bottom: 0.3rem;
        animation: fadeInUp 0.6s ease forwards;
    }

    p {
        margin-bottom: 1.5rem;
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
        animation-delay: 0.2s;
        animation-fill-mode: forwards;
    }

    strong {
        color: #2e5d1a;
        font-weight: 600;
    }

    a {
        color: #406837;
        font-weight: 600;
        text-decoration: none;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
        position: relative;
    }

    a:hover {
        border-color: #a5c882;
        transform: translateY(-2px);
    }

    .btn-regresar {
        display: inline-block;
        margin-top: 3rem;
        padding: 12px 25px;
        background-color: #406837;
        color: white;
        font-weight: 600;
        border-radius: 30px;
        text-align: center;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(64, 104, 55, 0.3);
        animation: fadeIn 1.2s ease forwards;
    }

    .btn-regresar:hover {
        background-color: #2a4411;
        transform: scale(1.05) translateY(-2px);
        box-shadow: 0 8px 18px rgba(42, 68, 17, 0.6);
    }

    @media (max-width: 600px) {
        body {
            padding: 1.5rem 1.5rem;
            font-size: 16px;
        }

        h1 {
            font-size: 2.2rem;
        }

        h2 {
            font-size: 1.5rem;
        }
    }

    /* Animaciones */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideDown {
        0% { opacity: 0; transform: translateY(-30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes expandBar {
        0% { width: 0; }
        100% { width: 60px; }
    }
</style>

</head>
<body>
    <h1>Políticas de Privacidad</h1>
    <p>En <strong>Salud y Bienestar</strong>, respetamos tu privacidad y nos comprometemos a proteger tus datos personales.</p>

    <h2>Uso de cookies</h2>
    <p>Utilizamos cookies para mejorar tu experiencia en el sitio, analizar el tráfico y personalizar contenido. Puedes aceptar o rechazar el uso de cookies.</p>

    <h2>Datos recopilados</h2>
    <p>No recopilamos datos personales sin tu consentimiento explícito.</p>

    <h2>Contacto</h2>
    <p>Si tienes preguntas sobre nuestras políticas de privacidad, puedes contactarnos a través de nuestro sitio web.</p>

    <a href="index.php" class="btn-regresar">Regresar al sitio</a>
</body>
</html>
