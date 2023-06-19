DROP DATABASE IF EXISTS sistemafactura;
CREATE DATABASE sistemafactura
CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE sistemafactura;

CREATE TABLE proveedor(
    id_proveedor INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nit VARCHAR(10),
    nombre VARCHAR(80),
    ubicacion VARCHAR(100),
    telefono CHAR(10)
);

CREATE TABLE producto(
    id_producto INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80),
    id_proveedor INT UNSIGNED,
    descripcion VARCHAR(255),
    costo FLOAT,
    precio FLOAT,
    stock INT,
    FOREIGN KEY (id_proveedor) REFERENCES proveedor(id_proveedor)
);

CREATE TABLE factura(
    id_factura INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,    
    dinero_recibido FLOAT,
    total_facturado FLOAT,
    estado_factura BOOLEAN,
    fecha DATETIME
);

CREATE TABLE items_factura(
    id_items_factura INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_factura INT UNSIGNED,
    id_producto INT UNSIGNED,
    cantidad INT UNSIGNED,
    subtotal FLOAT,
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
    FOREIGN KEY (id_factura) REFERENCES factura(id_factura)
);

-- creando trigger para evitar que se registren tuplas repetidas
DELIMITER //
CREATE TRIGGER `tr_insertar_proveedor` BEFORE INSERT ON `proveedor`
 FOR EACH ROW BEGIN
    DECLARE proveedor_existente INT;
    SELECT COUNT(*) INTO proveedor_existente FROM proveedor WHERE nit = NEW.nit;
    IF (proveedor_existente > 0) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El proveedor ya existe';
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_insertar_producto` BEFORE INSERT ON `producto`
FOR EACH ROW BEGIN
    DECLARE producto_existente INT;
    SELECT COUNT(*) INTO producto_existente FROM producto WHERE nombre = NEW.nombre AND id_proveedor = NEW.id_proveedor;
    IF (producto_existente > 0) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El producto ya existe';
    END IF;
END //
DELIMITER ;



