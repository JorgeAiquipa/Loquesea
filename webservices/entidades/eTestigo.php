<?php
	class EntidadTestigo {
		private $testBarras;
		private $ordenNro;
		private $testCod;
		private $testPeso;
		private $testDiametro;
		private $cajaId;
		private $estado;
		private $ensResultadoKN;
		private $ensResultadoKG;
		private $ensFecha;
		private $tipoFalla;

		public function getTestBarras(){
			return $this->testBarras;
		}
		
		public function setTestBarras($testBarras){
			$this->testBarras=$testBarras;
		}

		public function getOrdenNro(){
			return $this->ordenNro;
		}
		
		public function setOrdenNro($ordenNro){
			$this->ordenNro=$ordenNro;
		}

		public function getTestCod(){
			return $this->testCod;
		}
		
		public function setTestCod($testCod){
			$this->testCod=$testCod;
		}

		public function getTestFecha(){
			return $this->testFecha;
		}
		
		public function setTestFecha($testFecha){
			$this->testFecha=$testFecha;
		}

		public function getTestEdad(){
			return $this->testEdad;
		}
		
		public function setTestEdad($testEdad){
			$this->testEdad=$testEdad;
		}

		public function getTestPeso(){
			return $this->testPeso;
		}
		
		public function setTestPeso($testPeso){
			$this->testPeso=$testPeso;
		}

		public function getTestDiametro(){
			return $this->testDiametro;
		}
		
		public function setTestDiametro($testDiametro){
			$this->testDiametro=$testDiametro;
		}

		public function getCajaId(){
			return $this->cajaId;
		}
		
		public function setCajaId($cajaId){
			$this->cajaId=$cajaId;
		}

		public function getEstado(){
			return $this->estado;
		}
		
		public function setEstado($estado){
			$this->estado=$estado;
		}

		public function getEnsResultadoKN(){
			return $this->ensResultadoKN;
		}
		
		public function setEnsResultadoKN($ensResultadoKN){
			$this->ensResultadoKN=$ensResultadoKN;
		}

		public function getEnsResultadoKG(){
			return $this->ensResultadoKG;
		}
		
		public function setEnsResultadoKG($ensResultadoKG){
			$this->ensResultadoKG=$ensResultadoKG;
		}

		public function getEnsFecha(){
			return $this->ensFecha;
		}
		
		public function setEnsFecha($ensFecha){
			$this->ensFecha=$ensFecha;
		}

		public function getTipoFalla(){
			return $this->tipoFalla;
		}
		
		public function setTipoFalla($tipoFalla){
			$this->tipoFalla=$tipoFalla;
		}
	}
?>
