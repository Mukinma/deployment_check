-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 09:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u978931113_syb`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contraseña` varchar(250) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `contraseña`, `id_cargo`, `foto_perfil`) VALUES
(1, 'administrador', 'administrador100', 'administrador100@gmail.com', '$2y$10$ug9OCTY.gRsHd5ZkRoG0J.fHGrGWX0X/JKsAhNfyCy5yNJRYgmbjG', 1, NULL),
(4, 'Eliana', 'Eliachan', 'Eliana55@gmail.com', '$2y$10$AXySArpicMZ3K9Bm3bJBtulvKkIXS4avyunFmgfRaL1fb/vA/JnBm', 2, NULL),
(5, 'Eliana', 'Elianachan', 'Eliana55@gmail.com', '$2y$10$eSaZKT4nq.KJ0Pqijmjjau21vfs2uwshC7LqOz0ZJS5/x7myk87MW', 2, NULL),
(6, 'Gustavo Solorzano', 'guchiboy', 'gustavo@gmail.com', '$2y$10$NTloEzOTCGWNf7Dqnae5uegxQdyC3txTZ./DjArYOOztnDjCTv4g.', 2, NULL),
(9, 'Valeria', 'Valeriaa', 'valeria88@gmail.com', '$2y$10$UvpWD8igzXpF.2A0XcZQUu2XznacjgtpkkKS.87ZHS7lxn6cP9xFW', 2, NULL),
(11, 'concha concha', 'concha99', 'concha@gmail.com', '$2y$10$CBGUFti79KV.7lEV5cIB3.zATRPUE.64bUPyEbN4s9cFDT9cftv8e', 2, NULL),
(12, 'prueba', 'pruebaa', 'pruebaa@ucol.mx', '$2y$10$a.BVBOCu7w40ak3MCWfikOvXGVYLTvGHgszRxdsketVyqpS.Zzu3.', 2, NULL),
(13, 'Alain', 'alain22', 'alain22@gmail.com', '$2y$10$CuO44P63R..dABJoRLKOwOCLphCd5mwa2YDeD5//5E/nL8.s2W4sO', 2, NULL),
(14, 'Roxana Orozco Prudente', 'Roxana', 'roxana@gmail.com', '$2y$10$BBlXPJNSjITVmqI2vxi04O2hx4A5f5c0zBW28qtPuz5RJN1T0SUyy', 2, NULL),
(15, 'Michoacane Foraneo', 'Michoacane', 'michoacane@gmail.com', '$2y$10$uLtTsAWzh1JagMG0MZPYi.77qJ1mVq5n/AV7q6lXUV6pXCTnBjzLa', 2, NULL),
(16, 'Axel', 'Axel', 'axel@gmail.com', '$2y$10$J5gFEn2.VsFw6cIfXsXsOePdXxhjcZHGAXbBERtWp5TPAytuIGvDq', 2, NULL),
(17, 'jahirgay', 'jahirgay', 'jahirgay@gmail.com', '$2y$10$TeoAPk2sJTI.ZECQJwIVQOHCTE2vD65XGtDoSYAlMz0mRP5E7Gpgm', 2, NULL),
(18, 'fernando', 'fernando', 'fernado@gmail.com', '$2y$10$tj481SYMGWx87zTbmmL0Le0TbGhF1MZPCKPaQrDKoZst29MEx9LKK', 2, NULL),
(19, 'juen', 'juen', 'juen@gmail.com', '$2y$10$lfXLNIPaNo40VSrBT3JxEu/IS6FBRCiywe4j6xjQON3SyQ9YS3QRa', 2, NULL),
(20, 'a', 'a', 'a@gmail.com', '$2y$10$x1X2Kikv/39X96DZWu22PuReYamySI9VLQcK89j29Y/81mbU9M6SK', 2, NULL),
(21, 'vv', 'vvf', 'f@e', '$2y$10$dGZbBeKTKapN6wa7tkx76u9TtdGm/lhFGwSpV7U1X8hn3lwXrZbqK', 2, NULL),
(22, 'roxi', 'roxi', 'roxi@gmail.com', '$2y$10$E3qsd8UD8eLz8P8SsRFXWu8yCmi7j2I21EMV1dzpaAQeI4TPcGLAy', 2, NULL),
(23, 'Christopher Eugenio Nieves Martínez', 'Crisis', 'cnieves0@ucol.mx', '$2y$10$/tDeDYsxUpTNxG25.5epSepUb3WtnQGUgVHsazy0uDTTIPOmkc/xy', 2, NULL),
(24, 'Rosario Nomaly', 'Rosario', 'rosario@gmail.com', '$2y$10$Sm9Xr7fYtewupXwapA.zXOn2oaa6nVsBUlu4qinG67WowCP4dityW', 2, NULL),
(25, 'valeria cervantes', 'valeria', 'valeria.cervantes.2510@hotmail.com', '$2y$10$CX.HEjBK0CJpsvD2gDSjl.5rhD6JtzRyLtm6UiLLzgE.IWorXYkUC', 2, NULL),
(26, 'Abigail', 'Abigail', 'amartinez127@ucol.mx', '$2y$10$2wextjaWm0esffyPDMXGa.9o8QYWTvnwVgQ9bFz9uJ.OYjAMkeItK', 2, NULL),
(27, 'roxe', 'roxe', 'rorozco8@ucol.mx', '$2y$10$pCb0c4tdsqfRJAFouNvBw.gmVVq6ginlrrGT.NvkEYdLYzE8Xkg2C', 2, NULL),
(28, 'pedro', 'pedrito', 'pedro@gmail.com', '$2y$10$pSgTBJ75zftYNQ9LL0UEdO5Jc41RaIjgdSaaeCAt5T3guFBl2kwIK', 2, 'perfil_683403f341ec87.89907452.png'),
(29, 'paco', 'paco', 'paco@gmail.com', '$2y$10$ohnPNb0hHUQ1y40NQf32hO7S05K55MvhERkWLXYYZB.xgIj8ax9ji', 2, 'perfil_683408daf1ddf5.55300159.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
