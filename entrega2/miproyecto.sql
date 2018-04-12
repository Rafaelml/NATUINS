-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2018 a las 15:38:59
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(255) NOT NULL,
  `nick` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8 NOT NULL,
  `repass` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`idAdmin`, `nick`, `pass`, `repass`, `email`, `telefono`) VALUES
(1, 'jorge', 'jorge', 'jorge', 'jorgefavi96@gmail.com', 699063110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tuin`
--

CREATE TABLE `tuin` (
  `idTuin` int(255) NOT NULL,
  `tuin` text CHARACTER SET utf8 NOT NULL,
  `idUser` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tuin`
--

INSERT INTO `tuin` (`idTuin`, `tuin`, `idUser`) VALUES
(1, 'Hola buena, me llamo Rafa', 1),
(2, 'Hola buenas, que honda.', 1),
(3, 'Hola que tal', 1),
(4, 'Hoy juega el Real Madrid', 1),
(5, 'Hola que tal, como esta', 1),
(6, 'HA GANDO EL MADRIDDD', 1),
(7, 'Siiiiiuuuuu', 1),
(8, '1-3 y al carrer', 1),
(9, 'Bienvenido', 1),
(10, 'Estoy hasta las narices de los rumanos', 1),
(11, 'En la uni', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userr`
--

CREATE TABLE `userr` (
  `idUser` int(255) NOT NULL,
  `nick` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8 NOT NULL,
  `repass` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `userr`
--

INSERT INTO `userr` (`idUser`, `nick`, `pass`, `repass`, `email`, `telefono`) VALUES
(1, 'rafa', 'rafa', 'rafa', 'rafa@gmail.com', 677895622),
(2, 'juan', 'juan', 'juan', 'juan@gmail.com', 3679236);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `tuin`
--
ALTER TABLE `tuin`
  ADD PRIMARY KEY (`idTuin`);

--
-- Indices de la tabla `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tuin`
--
ALTER TABLE `tuin`
  MODIFY `idTuin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `userr`
--
ALTER TABLE `userr`
  MODIFY `idUser` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
