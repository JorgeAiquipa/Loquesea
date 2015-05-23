<?php
	class EntidadCliente {
		private $clienteId;
		private $razon;
		private $ruc;
		private $direccion;
		private $telf;

		public function getClienteId(){
			return $this->clienteId;
		}
		
		public function setClienteId($clienteId){
			$this->clienteId=$clienteId;
		}

		public function getRazon(){
			return $this->razon;
		}
		
		public function setRazon($razon){
			$this->razon=$razon;
		}

		public function getRuc(){
			return $this->ruc;
		}
		
		public function setRuc($ruc){
			$this->ruc=$ruc;
		}

		public function getDireccion(){
			return $this->direccion;
		}
		
		public function setDireccion($direccion){
			$this->direccion=$direccion;
		}
		
		public function getTelf(){
			return $this->telf;
		}
		
		public function setTelf($telf){
			$this->telf=$telf;
		}
	}
?>
