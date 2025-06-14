CREATE DATABASE parqueadero;
USE parqueadero;

CREATE TABLE vehiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(100),
    placa VARCHAR(30)
);

INSERT INTO vehiculos (tipo, placa) VALUES
('Carro', 'iiq98e'),
('Moto', 'idq98e'),
('Moto', 'idq98j'),
('Carro', 'idq98k'),
('Moto', 'idq98m'),
('Carro', 'aiq98e');

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100),
    apellidos VARCHAR(100),
    contrasena VARCHAR(255),
    telefono INT(10),
    correo VARCHAR(50) UNIQUE
);
