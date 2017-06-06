/*CREAR BASE DE DATOS*/
CREATE DATABASE login;

/*USAR BASE DE DATOS*/
USE login;

/*CREAR TABLA USUARIOS*/
CREATE TABLE `usuarios` ( 
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT, 
  `usuario` VARCHAR(20) NOT NULL, 
  `password` VARCHAR(10) NOT NULL, 
  PRIMARY KEY  (`idusuario`)
);

/*MOSTRAR TODO DE USUARIOS */
SELECT * FROM usuarios;

/*INSERTAR USUARIO EJEMPLO*/
INSERT INTO usuarios (usuario,password) values ('usuario','contraseña');

/*ELIMINAR SAFE MODE*/
SET SQL_SAFE_UPDATES = 0;

/*MODIFICAR USUARIO EJEMPLO*/
UPDATE usuarios SET password = 's' WHERE usuario = 'a';

/*BORRAR TODOS LOS USUARIOS*/
delete from usuarios;