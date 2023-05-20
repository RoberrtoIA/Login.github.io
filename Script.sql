CREATE TABLE registros (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Nombre VARCHAR(30),
Apellido VARCHAR(30),
Ciudad VARCHAR(50),
FechaInscripcion DATE,
Email VARCHAR(200)
);

INSERT INTO registros (id, Nombre, Apellido, Ciudad, FechaInscripcion, Email)
VALUES (DEFAULT, 'Roberto', 'Moreno', 'Santa Ana', '1999-09-17', 'roberto@gmail.com');
INSERT INTO registros (id, Nombre, Apellido, Ciudad, FechaInscripcion, Email)
VALUES (DEFAULT, 'Balmore', 'Romero', 'Ciudad Real', '1997-09-15', 'balmore@gmail.com');
INSERT INTO registros (id, Nombre, Apellido, Ciudad, FechaInscripcion, Email)
VALUES (DEFAULT, 'Miguel', 'GOD', 'El Cairo', '2000-10-01', 'miguel@gmail.com');
INSERT INTO registros (id, Nombre, Apellido, Ciudad, FechaInscripcion, Email)
VALUES (DEFAULT, 'Luis', 'Antonio', 'Jerusalem', '1990-01-01', 'antonio@gmail.com');
INSERT INTO registros (id, Nombre, Apellido, Ciudad, FechaInscripcion, Email)
VALUES (DEFAULT, 'Dross', 'Marco', 'Roma', '2021-12-12', 'marco@gmail.com');