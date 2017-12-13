-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2017 a las 17:39:36
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `car_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `precio` bigint(20) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `puertas` int(10) NOT NULL,
  `diesel` tinyint(1) NOT NULL,
  `tamanio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cars`
--

INSERT INTO `cars` (`id`, `marca`, `modelo`, `precio`, `disponible`, `puertas`, `diesel`, `tamanio`) VALUES
(1, 'Alfa Romeo', '4C', 242424242, 0, 2, 1, '3989'),
(2, 'Alfa Romeo', 'Giulia', 22246733, 0, 4, 1, '4643'),
(3, 'Aston Martin', 'Vanquish', 4588662, 1, 4, 1, '5000'),
(4, 'Audi', 'A4', 555577521, 1, 4, 0, '4587'),
(5, 'BMW', 'Z4', 578212, 1, 2, 0, '3500'),
(6, 'CHEVROLET', 'Aveo', 5782242, 1, 4, 1, '3425'),
(7, 'CHEVROLET', 'Spark', 525232, 1, 4, 0, '3212'),
(8, 'CITROEN', 'C4', 6665433, 1, 4, 1, '4000'),
(9, 'CITROEN', 'Nemo', 4578965, 1, 4, 1, '3875'),
(10, 'FERRARI', 'F12', 663431257, 1, 2, 1, '3758'),
(11, 'FERRARI', 'GTC4', 7545482, 1, 2, 1, '3864'),
(12, 'FIAT', 'Punto', 2456687, 1, 2, 0, '3456'),
(13, 'FIAT', 'Fiorino', 2453366, 1, 4, 1, '3965'),
(14, 'FIAT', 'Bravo', 3568453, 1, 4, 1, '3657'),
(15, 'FIAT ', 'Uno', 5532312, 1, 4, 0, '2965');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20171213133532, 'Initial', '2017-12-13 16:35:32', '2017-12-13 16:35:32', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cars_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` int(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `active`) VALUES
(1, 'alefer', 12345, 'Alejandra', 'Fernandez', 'alefer@gmail.com', 0),
(2, 'rder', 12345, 'Ricardo', 'Etcheverry', 'rder@gmail.com', 0),
(3, 'tilla', 12345, 'Tilla', 'Martinez', 'tilla@gmail.com', 0),
(4, 'carola', 12345, 'Carola', 'Tanez', 'carola@gmail.com', 0),
(5, 'sandra', 12345, 'Sandra', 'Oliveiro', 'sandrao@gmail.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_id` (`cars_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
