
DROP DATABASE IF EXISTS crud1;
CREATE DATABASE  crud1; 
USE crud1;

-- Volcando estructura para tabla crud1.miembros
CREATE TABLE IF NOT EXISTS alumnos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(30) NOT NULL,
  apellidos varchar(30) NOT NULL,
  direccion text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;


INSERT INTO alumnos (id, nombre, apellidos, direccion) VALUES
	(3, 'Angel', 'Paredes', 'c/ torrez'),
	(4, 'Juliana', 'Vargas', 'c/ palmas'),
	(5, 'Susana', 'Dallas', 'c/ tejerina'),
	(38, 'pedro', 'gomez', 'c/linares');
