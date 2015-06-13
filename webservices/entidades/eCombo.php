<?php
	class EntidadCombo {
		private $comboId;
		private $comboDesc;
		private $comboDato1;
		private $comboDato2;

		public function getComboId(){
			return $this->comboId;
		}
		
		public function setComboId($comboId){
			$this->comboId=$comboId;
		}

		public function getComboDesc(){
			return $this->comboDesc;
		}
		
		public function setComboDesc($comboDesc){
			$this->comboDesc=$comboDesc;
		}

		public function getComboDato1(){
			return $this->comboDato1;
		}
		
		public function setComboDato1($comboDato1){
			$this->comboDato1=$comboDato1;
		}

		public function getComboDato2(){
			return $this->comboDato2;
		}
		
		public function setComboDato2($comboDato2){
			$this->comboDato2=$comboDato2;
		}
	}
?>
