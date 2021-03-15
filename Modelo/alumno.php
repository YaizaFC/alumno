<?php


class Alumno{
		private $id;
		private $nombre;
		private $apellidos;
		private $direccion;
		function __construct(){}

		public function getId(){
			return $this->id;
			}

		public function setId($id){
			$this->id = $id;
		}

		public function getNombre(){
			return $this->nombre;
			}
	
		public function setNombre($nombre){
				$this->nombre = $nombre;
			}
	
		public function getApellidos(){
				return $this->apellidos;
			}
	
		public function setApellidos($apellidos){
				$this->apellidos = $apellidos;
			}
	
		public function getDireccion(){
			return $this->direccion;
			}
	
		public function setDireccion($direccion){
				$this->direccion = $direccion;
			}
			
		
	}

