CREATE DATABASE sistemafactura;
USE sistemafactura;

CREATE TABLE proveedor(
    id_proveedor INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80),
    ubicacion VARCHAR(100),
    telefono CHAR(10)
);

CREATE TABLE producto(
    id_producto INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(255),
    costo FLOAT,
    precio FLOAT,
    stock INT,
    id_proveedor INT UNSIGNED,
    FOREIGN KEY (id_proveedor) REFERENCES proveedor(id_proveedor)
);

CREATE TABLE factura(
    id_factura INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_producto INT UNSIGNED,
    cantidad INT,
    dinero_recibido FLOAT,
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
);
