<?php
// incluye la clase Db
require_once('Conexion.php');
	
    class CrudAlumnos{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo libro
		public function insertar($alumno){
			
			$conexion = new Conexion();
			$con = $conexion->open();
			//las ? son parametros a los cuales tengo que dar valor
			$sql="INSERT INTO  alumnos VALUES (NULL,?,?,?)";
			//1 parte preparar la sentencia
			$insert=$con->prepare($sql);
			//2 parte ejecutar y pasar los valores a los paremetros ? mediante un array
			$insert->execute(array($alumno->getNombre(),$alumno->getApellidos(),$alumno->getDireccion()));
			$conexion->close();

		}

		// método para mostrar todos los libros
		public function mostrar(){

			$conexion = new Conexion();
			$con = $conexion->open();
			$listaMiembros=[];
			$select=$con->prepare('SELECT * FROM alumnos');
			$select->execute();
			$filas=$select->fetchAll();
						
			$conexion->close();
			return $filas;
		}

		// método para eliminar un libro, recibe como parámetro el id del libro
		public function eliminar($id){
			 
			$conexion = new Conexion();
			$con = $conexion->open();
			 $sql="DELETE FROM alumnos WHERE id=?";
			 //preparo la sentencia
			$eliminar=$con->prepare($sql);
			//la ejecuto pasando los parametros que hagan falta
			$eliminar->execute(array($id));
			$conexion->close();
		}

		// método para buscar un libro, recibe como parámetro el id del libro
		public function obtenerMiembro($id){
			
			$conexion = new Conexion();
			$con = $conexion->open();
			$select=$con->prepare('SELECT * FROM alumnos WHERE ID=?');
			
			$select->execute(array($id));
			$alumno=$select->fetch();
			$myAlumno= new Alumno();
			$myAlumno->setId($alumno['id']);
			$myAlumno->setNombre($alumno['nombre']);
			$myAlumno->setApellidos($alumno['apellidos']);
			$myAlumno->setDireccion($alumno['direccion']);
			$conexion->close();
			return $myAlumno;
		}

		// método para actualizar un libro, recibe como parámetro el miembro
		public function actualizar($alumno){
			$conexion = new Conexion();
			$con = $conexion->open();
			
			$sql="UPDATE alumnos SET nombre=?, apellidos=?,direccion=?  WHERE ID=?";
			//preparo la sentencia
			$actualizar=$con->prepare($sql);
			//la ejecuto dando valor a los parametros
			$actualizar->execute(array($alumno->getNombre(),$alumno->getApellidos(),$alumno->getDireccion(),$alumno->getId()));
			$conexion->close();
		}
	}


