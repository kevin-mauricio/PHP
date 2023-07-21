-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2023 a las 01:46:20
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
-- Base de datos: `sistemafactura`
--
DROP DATABASE IF EXISTS sistemafactura;
CREATE DATABASE sistemafactura
CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE sistemafactura;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarStock` (IN `producto_id` INT, IN `cantidad_vendida` INT)   BEGIN
    DECLARE stock_actual INT;

    -- Obtener el stock actual del producto
    SELECT stock INTO stock_actual
    FROM producto
    WHERE id_producto = producto_id;

    -- Verificar si hay suficiente stock para la venta
    IF stock_actual >= cantidad_vendida THEN
        -- Restar la cantidad vendida al stock actual
        SET stock_actual = stock_actual - cantidad_vendida;

        -- Actualizar el stock en la tabla producto
        UPDATE producto
        SET stock = stock_actual
        WHERE id_producto = producto_id;

        SELECT 'Venta realizada. Stock actualizado correctamente.' AS mensaje;
    ELSE
        SELECT 'No hay suficiente stock para realizar la venta.' AS mensaje;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(10) UNSIGNED NOT NULL,
  `dinero_recibido` float NOT NULL DEFAULT 0,
  `total_facturado` float DEFAULT 0,
  `cambio` float NOT NULL,
  `estado_factura` tinyint(1) DEFAULT 1,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `dinero_recibido`, `total_facturado`, `cambio`, `estado_factura`, `fecha`) VALUES
(7, 20000, 18000, 2000, 1, '2023-07-20 12:57:45'),
(8, 7000, 7000, 0, 1, '2023-07-20 13:02:32'),
(9, 10000, 7000, 3000, 1, '2023-07-20 17:40:34'),
(10, 70000, 68000, 2000, 1, '2023-07-21 18:19:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_factura`
--

CREATE TABLE `items_factura` (
  `id_items_factura` int(10) UNSIGNED NOT NULL,
  `id_factura` int(10) UNSIGNED DEFAULT NULL,
  `id_producto` int(10) UNSIGNED DEFAULT NULL,
  `cantidad` int(10) UNSIGNED DEFAULT NULL,
  `subtotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `items_factura`
--

INSERT INTO `items_factura` (`id_items_factura`, `id_factura`, `id_producto`, `cantidad`, `subtotal`) VALUES
(6, 7, 22, 3, 18000),
(7, 8, 21, 2, 7000),
(8, 9, 21, 2, 7000),
(9, 10, 23, 8, 68000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `id_proveedor` int(10) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `id_proveedor`, `descripcion`, `costo`, `precio`, `stock`, `estado`) VALUES
(21, 'Agua', 8, 'Agua en botella 1000 ml', 1500, 3500, 8, 1),
(22, 'Leche', 10, 'Leche en polvo 500gr', 3000, 6000, 15, 1),
(23, 'Granola', 9, 'Frutos secos', 5000, 8500, 12, 1),
(24, 'Papel Higiénico', 8, 'Rollo de papel higiénico', 2000, 4000, 20, 1),
(25, 'Jabón de Baño', 11, 'Jabón de baño en barra', 2500, 5000, 15, 1),
(26, 'Café', 9, 'Café tostado en grano', 4000, 8000, 10, 1),
(27, 'Detergente', 9, 'Detergente líquido 1 litro', 3500, 7000, 18, 1),
(28, 'Harina de Trigo', 9, 'Harina de trigo todo uso', 2800, 5600, 25, 1),
(29, 'Cereal', 9, 'Cereal de maíz en caja', 4500, 9000, 8, 1),
(30, 'Aceite de Oliva', 12, 'Aceite de oliva virgen', 6000, 12000, 12, 1),
(31, 'Pasta de Dientes', 8, 'Pasta de dientes sabor menta', 1800, 3600, 30, 1),
(32, 'Galletas', 8, 'Galletas surtidas', 2200, 4400, 22, 1),
(33, 'Chocolate', 9, 'Chocolate negro 70% cacao', 3200, 6400, 14, 1);

--
-- Disparadores `producto`
--
DELIMITER $$
CREATE TRIGGER `tr_insertar_producto` BEFORE INSERT ON `producto` FOR EACH ROW BEGIN
    DECLARE producto_existente INT;
    SELECT COUNT(*) INTO producto_existente FROM producto WHERE nombre = NEW.nombre AND id_proveedor = NEW.id_proveedor;
    IF (producto_existente > 0) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El producto ya existe';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `nit` varchar(10) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nit`, `nombre`, `ubicacion`, `telefono`, `estado`) VALUES
(8, '108801', 'Kevin Mejia', 'Dosquebradas', '3201234567', 1),
(9, '108802', 'Mauricio', 'Pereira', '3207654321', 1),
(10, '108803', 'María', 'Cali', '3109876543', 1),
(11, '108804', 'Ana López', 'Medellín', '3008765432', 1),
(12, '108805', 'Pedro Gómez', 'Bogotá', '3152345678', 1);

--
-- Disparadores `proveedor`
--
DELIMITER $$
CREATE TRIGGER `tr_insertar_proveedor` BEFORE INSERT ON `proveedor` FOR EACH ROW BEGIN
    DECLARE proveedor_existente INT;
    SELECT COUNT(*) INTO proveedor_existente FROM proveedor WHERE nit = NEW.nit;
    IF (proveedor_existente > 0) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El proveedor ya existe';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `correo_usuario` varchar(100) DEFAULT NULL,
  `contrasenia_usuario` varchar(60) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `correo_usuario`, `contrasenia_usuario`, `fecha_registro`) VALUES
(1, 'Prueba', 'prueba@gmail.com', 'prueba123', '2023-07-17 20:26:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `items_factura`
--
ALTER TABLE `items_factura`
  ADD PRIMARY KEY (`id_items_factura`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo_usuario` (`correo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `items_factura`
--
ALTER TABLE `items_factura`
  MODIFY `id_items_factura` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `items_factura`
--
ALTER TABLE `items_factura`
  ADD CONSTRAINT `items_factura_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `items_factura_ibfk_2` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
