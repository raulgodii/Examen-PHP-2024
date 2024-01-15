-- Borra base de datos si existe
DROP DATABASE IF EXISTS videoteca;

-- Crear la base de datos videoteca
CREATE DATABASE IF NOT EXISTS videoteca;

-- Usar la base de datos videoteca
USE videoteca;

-- Crear la tabla profesores
CREATE TABLE IF NOT EXISTS profesores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cuenta_bloqueada BOOLEAN NOT NULL,
    nombre_usuario VARCHAR(50) NOT NULL,
    contrasena VARCHAR(50) NOT NULL,
    dni VARCHAR(10) NOT NULL,
    nombre_completo VARCHAR(100) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    rol VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

-- Crear la tabla fondos o peliculas
CREATE TABLE IF NOT EXISTS fondos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isan INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    director VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    anio INT NOT NULL
)ENGINE=InnoDB;
