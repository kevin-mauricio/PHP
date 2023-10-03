-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2023 a las 18:31:12
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(10) UNSIGNED NOT NULL,
  `nombre_cliente` varchar(30) DEFAULT NULL,
  `cantidad` int(10) UNSIGNED DEFAULT NULL,
  `id_producto` int(10) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `precio_und` int(30) UNSIGNED DEFAULT NULL,
  `importe` int(30) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `serial` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `costo` int(10) UNSIGNED DEFAULT NULL,
  `precio` int(10) UNSIGNED DEFAULT NULL,
  `cantidad` int(10) UNSIGNED DEFAULT NULL,
  `proveedor` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `serial`, `nombre`, `descripcion`, `costo`, `precio`, `cantidad`, `proveedor`) VALUES
(8, NULL, 'jabon', 'para baños', 1000, 1500, 20, 2),
(11, NULL, 'iphone', '13 pro', 215000, 300000, 10, 4),
(12, NULL, 'iphone', '13 pro', 215000, 300000, 10, 4),
(15, NULL, 'ddqwd', 'wdqdqw', 3232, 232, 323, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `producto` varchar(30) DEFAULT NULL,
  `ubicacion` varchar(30) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `producto`, `ubicacion`, `telefono`) VALUES
(1, 'Proveedor1', 'Producto1', 'Ubicacion1', '1234567890'),
(2, 'Proveedor2', 'Producto2', 'Ubicacion2', '9876543210'),
(3, 'Proveedor3', 'Producto3', 'Ubicacion3', '4567890123'),
(4, 'Proveedor4', 'Producto4', 'Ubicacion4', '7890123456'),
(5, 'Proveedor5', 'Producto5', 'Ubicacion5', '5678901234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
