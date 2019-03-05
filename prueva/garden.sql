-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-02-2019 a las 22:35:14
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `garden`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jardin`
--

CREATE TABLE `jardin` (
  `ID` int(11) NOT NULL,
  `t` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ph` double NOT NULL,
  `humidity` double NOT NULL,
  `temp` double NOT NULL,
  `img` text NOT NULL,
  `plant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jardin`
--

INSERT INTO `jardin` (`ID`, `t`, `ph`, `humidity`, `temp`, `img`, `plant`) VALUES
(117, '2019-02-25 11:14:36', 84.16, 106.78, -64.71, '/img1.jpg', 1),
(118, '2019-02-25 17:32:17', 191.56, 135.76, -39.98, '/img1.jpg', 1),
(119, '2019-02-25 23:29:41', 178.16, 121.13, -32.04, '/img1.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jardin`
--
ALTER TABLE `jardin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jardin`
--
ALTER TABLE `jardin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
