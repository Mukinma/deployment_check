-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-05-2025 a las 23:50:55
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u978931113_syb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `publicacion_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `publicacion_id`, `usuario_id`, `comentario`, `fecha`) VALUES
(8, 4, 14, 'hola', '2025-05-18 14:30:18'),
(9, 14, 14, 'hola', '2025-05-18 14:47:05'),
(10, 14, 12, 'wow que interesante', '2025-05-18 14:47:50'),
(11, 2, 14, 'muy interesante, me encanta', '2025-05-18 14:56:53'),
(12, 4, 1, 'hola', '2025-05-18 14:58:02'),
(13, 1, 1, 'hola', '2025-05-18 15:42:33'),
(14, 7, 22, 'hola', '2025-05-18 17:56:10'),
(15, 4, 22, 'wow me encanta', '2025-05-18 17:56:33'),
(16, 15, 22, 'que buena info', '2025-05-18 17:56:56'),
(17, 4, 1, 'hola', '2025-05-18 18:03:10'),
(18, 1, 14, 'holi', '2025-05-18 18:13:54'),
(19, 14, 1, 'excelente', '2025-05-18 18:14:57'),
(20, 7, 14, 'hiub', '2025-05-18 18:24:40'),
(21, 7, 14, 'hola', '2025-05-19 14:05:31'),
(22, 1, 19, 'wow que interesante informacion!!!', '2025-05-19 15:38:45'),
(23, 4, 19, 'increible', '2025-05-19 15:39:33'),
(24, 7, 1, 'wowowowow', '2025-05-19 16:07:49'),
(26, 15, 14, 'Omg', '2025-05-23 19:52:40'),
(27, 7, 24, 'que interesante', '2025-05-23 20:58:36'),
(28, 7, 1, '😄😄😄', '2025-05-24 02:14:53'),
(29, 1, 23, 'eee', '2025-05-24 08:27:09'),
(30, 1, 1, '👏👏👏', '2025-05-24 14:34:40'),
(31, 1, 26, 'Excelente información', '2025-05-24 18:33:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `publicacion_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `publicacion_id`, `usuario_id`, `fecha`) VALUES
(13, 4, 14, '2025-05-18 14:30:35'),
(19, 2, 14, '2025-05-18 14:40:21'),
(23, 14, 12, '2025-05-18 14:47:54'),
(33, 1, 12, '2025-05-18 14:54:29'),
(35, 7, 12, '2025-05-18 14:56:10'),
(36, 4, 12, '2025-05-18 14:56:19'),
(38, 2, 1, '2025-05-18 14:58:23'),
(39, 7, 22, '2025-05-18 17:56:13'),
(40, 4, 22, '2025-05-18 17:56:36'),
(41, 15, 22, '2025-05-18 17:56:50'),
(42, 1, 14, '2025-05-18 18:13:57'),
(43, 7, 14, '2025-05-18 18:24:43'),
(44, 1, 19, '2025-05-19 15:38:27'),
(45, 4, 19, '2025-05-19 15:39:21'),
(55, 14, 14, '2025-05-23 20:09:31'),
(58, 7, 24, '2025-05-23 20:58:15'),
(62, 7, 1, '2025-05-24 02:14:44'),
(63, 1, 23, '2025-05-24 08:26:56'),
(65, 15, 14, '2025-05-24 15:45:23'),
(68, 14, 1, '2025-05-24 18:29:28'),
(69, 1, 1, '2025-05-24 18:29:39'),
(70, 1, 26, '2025-05-24 18:33:07'),
(74, 23, 1, '2025-05-24 20:35:04'),
(78, 23, 14, '2025-05-24 21:57:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `publicacion` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `contenido` text NOT NULL,
  `resumen` text NOT NULL,
  `imagen` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`publicacion`, `titulo`, `autor`, `contenido`, `resumen`, `imagen`, `fecha`) VALUES
(1, 'La salud', 'Roxana Orozco Prudente', 'La salud es fundamental para vivir plenamente y con bienestar. Una buena salud física y mental permite realizar actividades cotidianas, trabajar, disfrutar del tiempo libre y mantener relaciones personales. Además, previene enfermedades, mejora la calidad de vida y promueve la longevidad. Cuidar la salud mediante una alimentación equilibrada, ejercicio regular, descanso adecuado y manejo del estrés es clave para tener una vida activa y satisfactoria.', 'La salud es esencial para una vida plena. Permite disfrutar las actividades diarias, prevenir enfermedades y mantener el bienestar físico y mental.', 'img12.jpg', '2024-09-11'),
(2, 'La nutricion', 'Eliana Ramirez', 'la importancia de la salud blalalal', 'yeeeeeeees', 'img14.jpg', '2025-04-17'),
(4, 'Prueba oficiallll', 'Roxana Orozco Prudente', 'hola esto es una prueba', 'ojala funcione', 'img7.jpg', '2025-04-18'),
(7, 'hole', 'rox', 'pruebeeeeeeeee', 'que funcione por favor', 'img19.jpeg', '2025-04-24'),
(14, 'PRUEBA', 'Roxana Orozco Prudente', 'hola esto es una prueba', 'ojala funcione', 'img8.jpeg', '2025-05-17'),
(15, 'adios', 'no', 'si', 'no', 'img6.jpg', '2025-02-18'),
(23, 'Salud: Un Derecho, No un Privilegio', 'Axel Flores Barragán', 'La salud es un derecho humano fundamental. El Objetivo de Desarrollo Sostenible número 3 (ODS 3) busca garantizar que todas las personas, sin importar su edad, género o condición económica, tengan acceso a servicios de salud de calidad y puedan llevar una vida sana.  En un mundo donde millones de personas aún carecen de atención médica básica, es urgente actuar. Promover el bienestar significa más que curar enfermedades: implica prevenirlas, educar a la población sobre hábitos saludables, y fortalecer los sistemas de salud.  Desde la vacunación infantil hasta el apoyo a la salud mental, el ODS 3 nos recuerda que invertir en salud es invertir en un futuro más justo y sostenible. Tú también puedes ser parte del cambio: infórmate, comparte y cuida de tu bienestar y el de los demás.                                                chatgpt.com', 'Este artículo reflexiona sobre la importancia del ODS 3, que busca asegurar salud y bienestar para todos. Destaca la urgencia de una atención médica universal, la prevención de enfermedades y la promoción de hábitos saludables.', 'img_683221c191164.jpg', '2025-05-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contraseña` varchar(250) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `contraseña`, `id_cargo`) VALUES
(1, 'administrador', 'administrador100', 'administrador100@gmail.com', '$2y$10$ug9OCTY.gRsHd5ZkRoG0J.fHGrGWX0X/JKsAhNfyCy5yNJRYgmbjG', 1),
(4, 'Eliana', 'Eliachan', 'Eliana55@gmail.com', '$2y$10$AXySArpicMZ3K9Bm3bJBtulvKkIXS4avyunFmgfRaL1fb/vA/JnBm', 2),
(5, 'Eliana', 'Elianachan', 'Eliana55@gmail.com', '$2y$10$eSaZKT4nq.KJ0Pqijmjjau21vfs2uwshC7LqOz0ZJS5/x7myk87MW', 2),
(6, 'Gustavo Solorzano', 'guchiboy', 'gustavo@gmail.com', '$2y$10$NTloEzOTCGWNf7Dqnae5uegxQdyC3txTZ./DjArYOOztnDjCTv4g.', 2),
(9, 'Valeria', 'Valeriaa', 'valeria88@gmail.com', '$2y$10$UvpWD8igzXpF.2A0XcZQUu2XznacjgtpkkKS.87ZHS7lxn6cP9xFW', 2),
(11, 'concha concha', 'concha99', 'concha@gmail.com', '$2y$10$CBGUFti79KV.7lEV5cIB3.zATRPUE.64bUPyEbN4s9cFDT9cftv8e', 2),
(12, 'prueba', 'pruebaa', 'pruebaa@ucol.mx', '$2y$10$a.BVBOCu7w40ak3MCWfikOvXGVYLTvGHgszRxdsketVyqpS.Zzu3.', 2),
(13, 'Alain', 'alain22', 'alain22@gmail.com', '$2y$10$CuO44P63R..dABJoRLKOwOCLphCd5mwa2YDeD5//5E/nL8.s2W4sO', 2),
(14, 'Roxana Orozco Prudente', 'Roxana', 'roxana@gmail.com', '$2y$10$BBlXPJNSjITVmqI2vxi04O2hx4A5f5c0zBW28qtPuz5RJN1T0SUyy', 2),
(15, 'Michoacane Foraneo', 'Michoacane', 'michoacane@gmail.com', '$2y$10$uLtTsAWzh1JagMG0MZPYi.77qJ1mVq5n/AV7q6lXUV6pXCTnBjzLa', 2),
(16, 'Axel', 'Axel', 'axel@gmail.com', '$2y$10$J5gFEn2.VsFw6cIfXsXsOePdXxhjcZHGAXbBERtWp5TPAytuIGvDq', 2),
(17, 'jahirgay', 'jahirgay', 'jahirgay@gmail.com', '$2y$10$TeoAPk2sJTI.ZECQJwIVQOHCTE2vD65XGtDoSYAlMz0mRP5E7Gpgm', 2),
(18, 'fernando', 'fernando', 'fernado@gmail.com', '$2y$10$tj481SYMGWx87zTbmmL0Le0TbGhF1MZPCKPaQrDKoZst29MEx9LKK', 2),
(19, 'juen', 'juen', 'juen@gmail.com', '$2y$10$lfXLNIPaNo40VSrBT3JxEu/IS6FBRCiywe4j6xjQON3SyQ9YS3QRa', 2),
(20, 'a', 'a', 'a@gmail.com', '$2y$10$x1X2Kikv/39X96DZWu22PuReYamySI9VLQcK89j29Y/81mbU9M6SK', 2),
(21, 'vv', 'vvf', 'f@e', '$2y$10$dGZbBeKTKapN6wa7tkx76u9TtdGm/lhFGwSpV7U1X8hn3lwXrZbqK', 2),
(22, 'roxi', 'roxi', 'roxi@gmail.com', '$2y$10$E3qsd8UD8eLz8P8SsRFXWu8yCmi7j2I21EMV1dzpaAQeI4TPcGLAy', 2),
(23, 'Christopher Eugenio Nieves Martínez', 'Crisis', 'cnieves0@ucol.mx', '$2y$10$/tDeDYsxUpTNxG25.5epSepUb3WtnQGUgVHsazy0uDTTIPOmkc/xy', 2),
(24, 'Rosario Nomaly', 'Rosario', 'rosario@gmail.com', '$2y$10$Sm9Xr7fYtewupXwapA.zXOn2oaa6nVsBUlu4qinG67WowCP4dityW', 2),
(25, 'valeria cervantes', 'valeria', 'valeria.cervantes.2510@hotmail.com', '$2y$10$CX.HEjBK0CJpsvD2gDSjl.5rhD6JtzRyLtm6UiLLzgE.IWorXYkUC', 2),
(26, 'Abigail', 'Abigail', 'amartinez127@ucol.mx', '$2y$10$2wextjaWm0esffyPDMXGa.9o8QYWTvnwVgQ9bFz9uJ.OYjAMkeItK', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `comentarios_ibfk_1` (`publicacion_id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `likes_ibfk_1` (`publicacion_id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`publicacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`publicacion_id`) REFERENCES `publicaciones` (`publicacion`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`publicacion_id`) REFERENCES `publicaciones` (`publicacion`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
