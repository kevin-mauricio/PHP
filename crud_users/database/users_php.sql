DROP DATABASE IF EXISTS users_php;

CREATE DATABASE users_php DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

USE users_php;

CREATE TABLE users(
    id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name_user VARCHAR(80),
    pword_user VARCHAR(100),
    email_user VARCHAR(120)
);