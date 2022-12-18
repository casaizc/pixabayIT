-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2022 a las 20:43:11
-- Versión del servidor: 8.0.27
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pixabay`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda`
--

CREATE TABLE `busqueda` (
  `ID` int NOT NULL,
  `categoria` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagina` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `busqueda`
--

INSERT INTO `busqueda` (`ID`, `categoria`, `pagina`) VALUES
(1, 'Albert', 1),
(2, 'ciencia', 1),
(3, 'educacion', 1),
(4, 'personas', 1),
(5, 'ciencia', 1),
(6, 'educacion', 1),
(7, 'sentimientos', 1),
(8, 'sentimientos', 1),
(9, 'sentimientos', 1),
(10, 'ciencia', 1),
(11, 'construccion', 1),
(12, '', 1),
(13, '', 1),
(14, '', 1),
(15, '', 1),
(16, '', 1),
(17, 'ciencia', 1),
(18, 'amor', 1),
(19, 'edificios', 1),
(20, 'universidad', 1),
(21, 'perros', 1),
(22, 'gatos', 1),
(23, '', 1),
(24, 'personas', 1),
(25, 'ciencia', 1),
(26, '', 1),
(27, '', 1),
(28, '', 1),
(29, 'casa', 1),
(30, 'casas', 1),
(31, 'bosques', 1),
(32, '', 1),
(33, '', 1),
(34, '', 1),
(35, '', 1),
(36, '', 1),
(37, 'educacion', 1),
(38, '', 1),
(39, 'arboles', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
