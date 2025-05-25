<?php
session_start();

include 'conexion.php';
$con = connection();

// Consulta para obtener todas las publicaciones
$sql_all_posts = "SELECT * FROM publicaciones ORDER BY fecha DESC";
$query_all_posts = mysqli_query($con, $sql_all_posts);

if (!$query_all_posts) {
    die("Error en la consulta: " . mysqli_error($con));
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diseño web tipo blog - para practica</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="estilosPost.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/idioma.css">
    <style>
/* Estilos para el tooltip */
.tooltip {
    position: relative;
    display: inline-block;
    margin: 0 15px; /* Espaciado entre los íconos */
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: rgba(0, 0, 0, 0.8);
    color: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 8px;
    position: absolute;
    z-index: 1;
    top: 125%; /* Posición debajo del ícono */
    left: 50%;
    margin-left: -60px; /* Centrar el tooltip */
    opacity: 0;
    transform: translateY(-10px); /* Desplazamiento hacia arriba */
    transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; /* Transiciones suaves */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
    font-size: 14px; /* Tamaño de fuente */
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
    transform: translateY(0); /* Restablecer desplazamiento */
}

/* Estilo para los íconos */
.menu-contenido a {
    color: #333; /* Color del ícono */
    font-size: 24px; /* Tamaño del ícono */
    transition: color 0.3s; /* Transición de color */
}

.menu-contenido a:hover {
    color: #2c3e50; /* Color al pasar el mouse */
}


    </style>
</head>
<body>
    <div id="overlay-menu"></div>

    <header>
        <div class="contenido-heder">
            <div class="menu-tips">
                <div class="logo-ods"> 
                    <img src="imagenWeb/img9.png" alt="">
                </div>
                <h1>
                    <a href="indexUsuario.php">
                        <span data-es="Salud y " data-en="Health and ">Salud y </span><b><span data-es="bienestar" data-en="well-being">bienestar</span></b>
                    </a>
                </h1>
                <button class="menu-toggle" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>

<div class="menu-contenido" id="menu-contenido">
    <nav style="display: flex; align-items: center;">
        <ul style="display: flex; margin: 0; padding: 0;">
            <li class="tooltip">
                <div class="perfil-usuario" style="margin-left: 20px; color: white;">
                    <?php if (isset($_SESSION['usuario'])) { ?>
                    <span style="color:rgb(0, 0, 0);">
                    <i class="fas fa-user-circle"></i> 
                    <span class="lang-bienvenido" data-es="Bienvenido" data-en="Welcome">Bienvenido</span>, 
                    <?= htmlspecialchars($_SESSION['usuario']) ?>
                    <?php } ?>
                </div>
            </li>
             <li class="tooltip">
                <a href="indexUsuario.php"><i class="fas fa-home"></i></a>
                <span class="tooltiptext" data-es="Inicio" data-en="Home">Inicio</span>
            </li>

            <li class="tooltip">
                <a href="https://www.youtube.com/channel/UCP6DHuQs90149gArPEcevJg"><i class="fab fa-youtube"></i></a>
                <span class="tooltiptext" data-es="Tutoriales" data-en="Tutorials">Tutoriales</span>
            </li>
            <li class="tooltip">
                <a href="nosotros.php"><i class="fas fa-users"></i></a>
                <span class="tooltiptext" data-es="Nosotros" data-en="About Us">Nosotros</span>
            </li>
            <li class="tooltip">
                <a href="/crud/cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
                <span class="tooltiptext" data-es="Cerrar sesión" data-en="Log Out">Cerrar sesión</span>
            </li>
                            <!-- Botón de idioma -->
                <div class="language-toggle" onclick="toggleLanguage()">
                    <img id="flag-icon" src="IMG/esp.png" alt="Idioma" />
                </div>
        </ul>
    </nav>
</div>
  <li class="tooltip">
    <div id="search-icon" style="cursor: pointer;">
        <i class="fas fa-search"></i>
    </div>

    <form id="searchForm" action="buscar.php" method="GET" style="display: none; position: absolute; top: 40px; right: 0; background: white; padding: 10px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.2); z-index: 1000;">
        <input type="text" name="q" 
            placeholder="Buscar..." 
            data-placeholder-es="Buscar..." 
            data-placeholder-en="Search..."
            required 
            style="padding: 5px;">
        <button type="submit" style="padding: 5px;"><i class="fas fa-search"></i></button>
    </form>

    <span class="tooltiptext" data-es="Buscar" data-en="Search">Buscar</span>
</li>

    </header>
    <main class="posts-container">
        <div class="grid-container">
            <?php
            $count = 0; // Contador para las publicaciones
            while ($post = mysqli_fetch_assoc($query_all_posts)):
                if ($count % 3 == 0 && $count != 0): ?>
                    </div> <!-- Cierra el contenedor anterior cada 3 publicaciones -->
                <?php endif; ?>
                <div class="post-card">
                    <a href="detalle_publicacion.php?id=<?php echo $post['publicacion']; ?>">
                        <img src="../imagenWeb/<?php echo htmlspecialchars($post['imagen']); ?>" alt="Imagen de la publicación" class="post-image" />
                    </a>
                    <h2><a href="detalle_publicacion.php?id=<?php echo $post['publicacion']; ?>"><?php echo htmlspecialchars($post['titulo']); ?></a></h2>
                    <p><strong>Autor:</strong> <?php echo htmlspecialchars($post['autor']); ?></p>
                    <p><strong>Fecha:</strong> <?php echo htmlspecialchars($post['fecha']); ?></p>
                </div>
                <?php $count++; // Incrementa el contador ?>
            <?php endwhile; ?>
        </div> <!-- Cierra el último contenedor -->
    </main>

    <script>
    // Función para cambiar textos según el idioma
    function cambiarIdioma(idioma) {
        document.querySelectorAll('[data-es]').forEach(el => {
            el.textContent = el.getAttribute('data-' + idioma);
        });
    }

    // Detectar idioma guardado o usar español por defecto
    const idiomaGuardado = localStorage.getItem('language') || 'es';
    cambiarIdioma(idiomaGuardado);

    // Botones para cambiar idioma y guardar la elección
    document.getElementById('btn-es').addEventListener('click', () => {
        localStorage.setItem('language', 'es');
        cambiarIdioma('es');
    });
    document.getElementById('btn-en').addEventListener('click', () => {
        localStorage.setItem('language', 'en');
        cambiarIdioma('en');
    });
    </script>

    <div class="container-footer">
        <footer>
            <div class="logo-footer">
                <img src="imagenWeb/img9.png" alt="">
            </div>

            <div class="redes-footer">
                <a href="https://www.facebook.com/share/193M2XwD2p/?mibextid=wwXIfr" target="_blank"><i class="fa-brands fa-facebook icon-redes-footer"></i></a>
                <a href="https://www.instagram.com/salud_optimaa?igsh=MXJuNXlsZGdjNGpvaQ%3D%3D&utm_source=qr" target="_blank"><i class="fa-brands fa-instagram icon-redes-footer"></i></a>
                <a href="https://x.com/VALERIACUE96463"><i class="fab fa-twitter icon-redes-footer"></i></a>
            </div>

            <hr>
            <h4>
                <span data-es="@ 2025 salud y bienestar - Todos los derechos reservados"
                    data-en="@ 2025 health and well-being - All rights reserved">
                    @ 2025 salud y bienestar - Todos los derechos reservados
                </span>
            </h4>
        </footer>
    </div> 

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Slick Carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="js/script.js"></script>

    <!-- Script del selector de idioma -->
    <script src="js/idioma.js"></script>

    <script>


document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.querySelector(".menu-toggle");
    const menuContenido = document.querySelector(".menu-contenido");

    if (toggleButton && menuContenido) {
        toggleButton.addEventListener("click", function () {
            menuContenido.classList.toggle("active");
        });
    }

    // Cargar idioma al iniciar
    if (typeof loadLanguage === 'function') {
        loadLanguage();
    }
});



    // Función para cambiar el idioma
   function toggleLanguage() {
    const flagIcon = document.getElementById('flag-icon');
    let newLang;

    if (flagIcon.src.includes('esp.png')) {
        flagIcon.src = 'IMG/eng.png';
        newLang = 'en';
    } else {
        flagIcon.src = 'IMG/esp.png';
        newLang = 'es';
    }

    localStorage.setItem('language', newLang);
    cambiarIdioma(newLang);
}

    
    // Función para cargar el idioma guardado
    function loadLanguage() {
        const savedLang = localStorage.getItem('language') || 'es';
        const flagIcon = document.getElementById('flag-icon');
        
        flagIcon.src = savedLang === 'en' ? 'IMG/eng.png' : 'IMG/esp.png';
        applyLanguage(savedLang);
    }
    </script>

    <?php
    if (isset($_SESSION['usuario']) && isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'admin') {
        echo '<a href=" /crud/indexCrud.php" style="position: fixed; bottom: 20px; right: 20px; background-color: #2c3e50; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none; box-shadow: 0 4px 6px rgba(0,0,0,0.2); z-index: 1000;">
        ⬅ Regresar al panel</a>';
    }
    ?>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("search-icon");
    const searchForm = document.getElementById("searchForm");

    searchIcon.addEventListener("click", function (e) {
        e.stopPropagation();
        searchForm.style.display = searchForm.style.display === "none" ? "block" : "none";
    });

    // Ocultar formulario si se hace clic fuera
    document.addEventListener("click", function () {
        searchForm.style.display = "none";
    });

    // Evitar que se cierre al hacer clic dentro del formulario
    searchForm.addEventListener("click", function (e) {
        e.stopPropagation();
    });
});
</script>

</body>
</html>

