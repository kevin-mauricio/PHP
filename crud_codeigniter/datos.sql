DROP DATABASE IF EXISTS datos;

CREATE DATABASE datos CHARACTER SET utf8 COLLATE utf8_general_ci;

USE datos;

CREATE TABLE personas(
    nombre VARCHAR(80),
    apellido VARCHAR(80),
    edad TINYINT UNSIGNED,
    genero VARCHAR(15),
    estado_civil VARCHAR(20),
    habilidades VARCHAR(50)
);