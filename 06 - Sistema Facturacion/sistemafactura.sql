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

INSERT INTO proveedor(nombre, ubicacion, telefono)
VALUE ("Mauro", "Dosquebradas", "3202152617");


-- creando procedimiento para insertar
DELIMITER //
CREATE PROCEDURE pr_insertar_proveedor(IN p_nombreProveedor VARCHAR(80), IN p_ubicacionProveedor VARCHAR(100), IN p_telefonoProveedor CHAR(10))
BEGIN
    INSERT INTO proveedor(nombre, ubicacion, telefono)
    VALUES (p_nombreProveedor, p_ubicacionProveedor, p_telefonoProveedor);
END;
// DELIMITER ;

-- creando trigger para insertar datos proveedor
DELIMITER //
CREATE TRIGGER tr_insertar_proveedor BEFORE INSERT ON proveedor
FOR EACH ROW
BEGIN 
    IF (NEW.nombre != NULL) THEN
        CALL pr_insertar_proveedor(NEW.nombre, NEW.ubicacion, NEW.telefono);
    END IF;
END;
// DELIMITER ;