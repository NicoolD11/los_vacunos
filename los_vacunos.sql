-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2021 a las 00:56:18
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `los_vacunos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `color` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `color`) VALUES
(1, 'BLANCO'),
(2, 'GRIS'),
(3, 'MAYORÍA BLANCO COMBINADO CON NEGRO'),
(4, 'MAYORÍA NEGRO COMBINADO CON BLANCO'),
(5, 'MAYORÍA ROJO COMBINADO CON BLANCO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fincas`
--

CREATE TABLE `fincas` (
  `codigo_finca` varchar(15) NOT NULL,
  `nombre_finca` varchar(20) NOT NULL,
  `nombre_vereda` varchar(20) NOT NULL,
  `departamento` varchar(20) NOT NULL,
  `hectareas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fincas`
--

INSERT INTO `fincas` (`codigo_finca`, `nombre_finca`, `nombre_vereda`, `departamento`, `hectareas`) VALUES
('FIN01', 'EL ROSAL', 'CAUCASIA', 'ANTIOQUIA', 8.1),
('FIN02', 'BELLA VISTA', 'CAUCASIA', 'ANTIOQUIA', 6.1),
('FIN03', 'LOS GIRASOLES', 'SANTA INES', 'VALLE DEL CAUCA', 1.1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `id` int(11) NOT NULL,
  `raza` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`id`, `raza`) VALUES
(1, 'NORMANDO'),
(2, 'BRAHMA'),
(3, 'ANGUS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunos`
--

CREATE TABLE `vacunos` (
  `codigo_vacuno` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `genero` varchar(6) NOT NULL,
  `color` int(11) NOT NULL,
  `raza` int(11) NOT NULL,
  `codigo_finca` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacunos`
--

INSERT INTO `vacunos` (`codigo_vacuno`, `fecha_nacimiento`, `nombre`, `genero`, `color`, `raza`, `codigo_finca`) VALUES
('AGC12569', '2021-09-24', 'ARTURITO', 'MACHO', 3, 1, 'FIN01'),
('AGC13456', '2015-01-01', 'MARTICA', 'HEMBRA', 5, 2, 'FIN02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD PRIMARY KEY (`codigo_finca`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacunos`
--
ALTER TABLE `vacunos`
  ADD PRIMARY KEY (`codigo_vacuno`),
  ADD KEY `codigo_finca` (`codigo_finca`),
  ADD KEY `color` (`color`),
  ADD KEY `raza` (`raza`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vacunos`
--
ALTER TABLE `vacunos`
  ADD CONSTRAINT `vacunos_ibfk_1` FOREIGN KEY (`codigo_finca`) REFERENCES `fincas` (`codigo_finca`),
  ADD CONSTRAINT `vacunos_ibfk_2` FOREIGN KEY (`raza`) REFERENCES `razas` (`id`),
  ADD CONSTRAINT `vacunos_ibfk_3` FOREIGN KEY (`color`) REFERENCES `colores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
