<?php
	class EntidadObra {
		private $obraId;
		private $nombre;
		private $ruccliente;
		private $direccion;
		

		public function getObraId(){
			return $this->obraId;
		}
		
		public function setObraId($obraId){
			$this->obraId=$obraId;
		}

		public function getNombre(){
			return $this->nombre;
		}
		
		public function setNombre($nombre){
			$this->nombre=$nombre;
		}

		public function getDireccion(){
			return $this->direccion;
		}
		
		public function setDireccion($direccion){
			$this->direccion=$direccion;
		}

		public function getRuccliente(){
			return $this->ruccliente;
		}
		
		public function setRuccliente($ruccliente){
			$this->ruccliente=$ruccliente;
		}
		
	}
?>
