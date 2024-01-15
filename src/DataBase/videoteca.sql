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


INSERT INTO fondos (isan, titulo, director, genero, anio) VALUES
(1234567890123, 'Pelicula 1', 'Director 1', 'Drama', 2020),
(2345678901234, 'Pelicula 2', 'Director 2', 'Comedia', 2015),
(3456789012345, 'Pelicula 3', 'Director 3', 'Acción', 2018),
(4567890123456, 'Pelicula 4', 'Director 4', 'Ciencia Ficción', 2012),
(5678901234567, 'Pelicula 5', 'Director 5', 'Aventura', 2019),
(6789012345678, 'Pelicula 6', 'Director 6', 'Thriller', 2017),
(7890123456789, 'Pelicula 7', 'Director 7', 'Romance', 2014),
(8901234567890, 'Pelicula 8', 'Director 8', 'Comedia', 2016),
(9012345678901, 'Pelicula 9', 'Director 9', 'Acción', 2021),
(1234567890123, 'Pelicula 10', 'Director 10', 'Drama', 2013);



-- Profesor 1
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor1', 'password1', '123456789A', 'Juan Pérez', 'Pérez', 'Gómez', 'juan.perez@email.com', 'profesor');

-- Profesor 2
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor2', 'password2', '987654321B', 'María Gómez', 'Gómez', 'Martínez', 'maria.gomez@email.com', 'profesor');

-- Director
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'director1', 'directorpass', '567890123C', 'Director Apellido', 'Apellido', 'Director', 'director@email.com', 'direccion');
-- Profesor 3
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor3', 'password3', '345678901D', 'Ana Martínez', 'Martínez', 'López', 'ana.martinez@email.com', 'profesor');

-- Profesor 4
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor4', 'password4', '567890123E', 'Carlos Rodríguez', 'Rodríguez', 'García', 'carlos.rodriguez@email.com', 'profesor');

-- Director 2
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'director2', 'directorpass2', '789012345F', 'Directora Apellido', 'Apellido', 'Directora', 'directora@email.com', 'direccion');

-- Profesor 5
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor5', 'password5', '901234567G', 'Elena Sánchez', 'Sánchez', 'Fernández', 'elena.sanchez@email.com', 'profesor');

-- Profesor 6
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor6', 'password6', '123456789H', 'Miguel López', 'López', 'Martínez', 'miguel.lopez@email.com', 'profesor');

-- Profesor 7
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor7', 'password7', '234567890I', 'Isabel Gutiérrez', 'Gutiérrez', 'Sánchez', 'isabel.gutierrez@email.com', 'profesor');

-- Director 3
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'director3', 'directorpass3', '345678901J', 'Director Apellido', 'Apellido', 'Director', 'director3@email.com', 'direccion');

-- Profesor 8
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor8', 'password8', '456789012K', 'Sergio Rodríguez', 'Rodríguez', 'Gómez', 'sergio.rodriguez@email.com', 'profesor');

-- Profesor 9
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor9', 'password9', '567890123L', 'Laura Martínez', 'Martínez', 'López', 'laura.martinez@email.com', 'profesor');

-- Profesor 10
INSERT INTO profesores (cuenta_bloqueada, nombre_usuario, contrasena, dni, nombre_completo, apellido1, apellido2, correo, rol)
VALUES (0, 'profesor10', 'password10', '678901234M', 'Pedro Gómez', 'Gómez', 'Fernández', 'pedro.gomez@email.com', 'profesor');
