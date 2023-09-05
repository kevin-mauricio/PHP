DROP DATABASE IF EXISTS datos;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2023 a las 18:49:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datos`
--
CREATE DATABASE IF NOT EXISTS `datos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `datos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `persona_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `apellido` varchar(80) DEFAULT NULL,
  `edad` tinyint(3) UNSIGNED DEFAULT NULL,
  `genero` varchar(15) DEFAULT NULL,
  `estado_civil` varchar(20) DEFAULT NULL,
  `php` char(2) DEFAULT 'no',
  `html` char(2) DEFAULT 'no',
  `python` char(2) DEFAULT 'no',
  `aws` char(2) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`persona_id`, `nombre`, `apellido`, `edad`, `genero`, `estado_civil`, `php`, `html`, `python`, `aws`) VALUES
(1, 'kevin', 'Mejia', 24, 'Masculino', '', 'si', NULL, NULL, NULL),
(3, 'Andres', 'Mejia', 34, 'Masculino', 'soltero', NULL, NULL, NULL, NULL),
(5, 'Damaez', 'Damez', 22, 'Masculino', NULL, 'no', NULL, NULL, NULL),
(20, 'Mauro', 'Almansa', 35, 'Masculino', 'casado', 'si', 'si', 'si', 'si'),
(21, 'Andres', 'Mejia', 34, 'Femenino', '', NULL, NULL, NULL, NULL),
(22, 'Andres', 'Mejia', 34, 'Masculino', 'soltero', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `persona_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
