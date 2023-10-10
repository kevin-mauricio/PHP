DROP DATABASE IF EXISTS crud_usuarios_php;

CREATE DATABASE crud_usuarios_php;

USE crud_usuarios_php;

CREATE TABLE usuarios(
    id_usuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    passw VARCHAR(120),
    correo VARCHAR(100) UNIQUE,
    rol ENUM ('admin', 'cajero') NOT NULL
);