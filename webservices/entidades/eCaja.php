<?php
	class EntidadCaja {
		private $cajaId;
		private $cajaNro;
		private $nroTestigos;
		private $posicion;
		private $edad;
		private $errorResultado;
		private $fechaMoldeo;
		private $ordenNro;
		private $prensaId;

		public function getCajaId(){
			return $this->cajaId;
		}
		
		public function setCajaId($cajaId){
			$this->cajaId=$cajaId;
		}

		public function getCajaNro(){
			return $this->cajaNro;
		}
		
		public function setCajaNro($cajaNro){
			$this->cajaNro=$cajaNro;
		}

		public function getNroTestigos(){
			return $this->nroTestigos;
		}
		
		public function setNroTestigos($nroTestigos){
			$this->nroTestigos=$nroTestigos;
		}

		public function getPosicion(){
			return $this->posicion;
		}
		
		public function setPosicion($posicion){
			$this->posicion=$posicion;
		}
		
		public function getEdad(){
			return $this->edad;
		}
		
		public function setEdad($edad){
			$this->edad=$edad;
		}
		
		public function getErrorResultado(){
			return $this->errorResultado;
		}
		
		public function setErrorResultado($errorResultado){
			$this->errorResultado=$errorResultado;
		}
		
		public function getFechaMoldeo(){
			return $this->fechaMoldeo;
		}
		
		public function setFechaMoldeo($fechaMoldeo){
			$this->fechaMoldeo=$fechaMoldeo;
		}
		
		public function getOrdenNro(){
			return $this->ordenNro;
		}
		
		public function setOrdenNro($ordenNro){
			$this->ordenNro=$ordenNro;
		}
		
		public function getPrensaId(){
			return $this->prensaId;
		}
		
		public function setPrensaId($prensaId){
			$this->prensaId=$prensaId;
		}
	}
?>
