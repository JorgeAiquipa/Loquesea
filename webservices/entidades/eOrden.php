<?php
	class EntidadOrden {
		private $ordenId;
		private $ordenNro;
		private $ordenFecha;
		private $clienteId;
		private $obraId;
		private $guiaCamion;
		private $estructura;
		private $comentarios;
		private $resistencia;
		private $usuario;
		private $fechaRecojo;

		public function getOrdenId(){
			return $this->ordenId;
		}
		
		public function setOrdenId($ordenId){
			$this->ordenId=$ordenId;
		}

		public function getOrdenNro(){
			return $this->ordenNro;
		}
		
		public function setOrdenNro($ordenNro){
			$this->ordenNro=$ordenNro;
		}

		public function getOrdenFecha(){
			return $this->ordenFecha;
		}
		
		public function setOrdenFecha($ordenFecha){
			$this->ordenFecha=$ordenFecha;
		}

		public function getClienteId(){
			return $this->clienteId;
		}
		
		public function setClienteId($clienteId){
			$this->clienteId=$clienteId;
		}
		
		public function getObraId(){
			return $this->obraId;
		}
		
		public function setObraId($obraId){
			$this->obraId=$obraId;
		}
		
		public function getGuiaCamion(){
			return $this->guiaCamion;
		}
		
		public function setGuiaCamion($guiaCamion){
			$this->guiaCamion=$guiaCamion;
		}
		
		public function getEstructura(){
			return $this->estructura;
		}
		
		public function setEstructura($estructura){
			$this->estructura=$estructura;
		}
		
		public function getComentarios(){
			return $this->comentarios;
		}
		
		public function setComentarios($comentarios){
			$this->comentarios=$comentarios;
		}
		
		public function getResistencia(){
			return $this->resistencia;
		}
		
		public function setResistencia($resistencia){
			$this->resistencia=$resistencia;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
		
		public function setUsuario($usuario){
			$this->usuario=$usuario;
		}

		public function getFechaRecojo(){
			return $this->fechaRecojo;
		}
		
		public function setFechaRecojo($fechaRecojo){
			$this->fechaRecojo=$fechaRecojo;
		}
	}
?>
