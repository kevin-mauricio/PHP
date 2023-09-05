DROP DATABASE IF EXISTS productos;

CREATE DATABASE IF NOT EXISTS `productos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `producto`;

CREATE TABLE productos(
    serial_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    descripcion VARCHAR(100),
    costo FLOAT,
    precio FLOAT,
    cantidad TINYINT UNSIGNED
    );