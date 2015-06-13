<?php
	require_once("../entidades/eOrden.php");
	require_once("../entidades/eCaja.php");
	require_once("../modelos/conex.php");
	
	class Orden {
		
		private $conn;
		private $conn2;
		
		public function listaAnaqueles($planta){
			$this->conn2 = Conexion::abrir2();
			$cadena = "";
			$sql = "SELECT MAX(CONVERT(ANAQUEL, UNSIGNED INTEGER)) FROM cuartos WHERE PLANTA_ID=?";
			$stmt = $this->conn2->prepare($sql);
			$stmt->bindParam(1, $planta);
			$stmt->execute();
			$row = $stmt->fetch();
			
			for($i=1; $i<=$row[0]; $i++){ //se recorren todos los anaqueles de la planta
				$flag = "";
				$sqlCaja = "SELECT CAJA_ID FROM cuartos WHERE ANAQUEL=? AND PLANTA_ID=?";
				$stmt = $this->conn2->prepare($sqlCaja);
				$stmt->bindParam(1, $i);
				$stmt->bindParam(2, $planta);
				$stmt->execute();
				while($rowCaja = $stmt->fetch()){
					if($rowCaja['CAJA_ID'] == ''){
						$flag = "no";
					}
				}
				if($flag == 'no'){
					$cadena .=  "," . $i . "|";
				} else {
					$cadena .= "lleno," . $i . "|";
				}
			}
			$this->conn2 = NULL;
			
			return $cadena;
		}
		
		public function listaPosiciones($anaquel, $planta){
			$this->conn2 = Conexion::abrir2();
			$cadena = "";
			$arr = array("1","2","3","4","5","6","7","8","9","0");
			$sql = "SELECT POSICION, CAJA_ID FROM cuartos WHERE ANAQUEL=? AND PLANTA_ID=?";
			$stmt = $this->conn2->prepare($sql);
			
			$stmt->bindParam(1, $anaquel);
			$stmt->bindParam(2, $planta);

			$stmt->execute();
			
			while($row = $stmt->fetch()){
				if($row['CAJA_ID'] == ''){
					$cadena .= "," . str_replace($arr,'',$row['POSICION']) . "|";
				} else {
					$cadena .= "lleno," . str_replace($arr,'',$row['POSICION']) . "|";
				}
			}
			$this->conn2 = NULL;
			return $cadena;
		}

		public function actualizarPosicion($posicion, $cajaId, $planta){
			$this->conn = Conexion::abrir();
			$sqlCuartos = "UPDATE cuartos SET CAJA_ID=? WHERE POSICION=? AND PLANTA_ID=?";
			$stmt = $this->conn->prepare($sqlCuartos);
			$stmt->bindParam(1, $cajaId);
			$stmt->bindParam(2, $posicion);
			$stmt->bindParam(3, $planta);
			$stmt->execute();
			$this->conn = NULL;
		}
		
		public function validaciones($eOrden, $testigos, $fMoldeo){
			$errores = "ok";
			$fActual = strtotime(date("Y-m-d H:i"));
			$fMoldeo = strtotime($fMoldeo);
			$fRecojo = strtotime($eOrden->getFechaRecojo());
			//$errores = round(($fActual - $fMoldeo)/60,0);

			$error1 = $this->erroresTestigos(count($testigos), $testigos);
			
			if($eOrden->getClienteId() == ''){ //valida que se haya ingresado un cliente
				$errores = "error01";
			} elseif($eOrden->getOrdenNro() == ''){ //valida que se haya ingresado una orden de servicio
				$errores = "error02";
			} elseif($eOrden->getObraId() == ''){ //valida que se haya seleccionado una obra
				$errores = "error03";
			} elseif($eOrden->getGuiaCamion() == ''){ //valida que se haya ingresado la guía de camión
				$errores = "error05";
			} elseif($eOrden->getEstructura() == ''){ //valida que se haya ingresado la estructura
				$errores = "error06";
			} elseif($eOrden->getResistencia() == ''){ //valida que se haya ingresado una resistencia
				$errores = "error07";
			} elseif($eOrden->getFechaRecojo() == ''){ //verifica que se haya ingresado la fecha de recojo
				$errores = "error13";			
			} elseif(count($testigos)-1 == 0){ //valida que se hayan ingresado testigos
				$errores = "error08";
			} elseif($error1 == 'blanco'){ //valida que se hayan ingresado testigos
				$errores = "error09";
			}
			/*} elseif(round(($fRecojo - $fMoldeo)/60/60,0) < 1){ //verifica que la fecha de recojo no sea menor igual que la fecha de moldeo
				$errores = "error14";
			} elseif(round(($fActual - $fMoldeo)/60,0) < 0){ //verifica que la fecha de recojo no sea menor igual que la fecha de moldeo
				$errores = "error15";*/
			return $errores;
		}

		private function erroresTestigos($longitud, $arrFilas){
			$error = "ok";
			//este for recorre cada fila de los testigos
			for($i=0; $i<$longitud-1; $i++){
				//se genera un arreglo de cada columna de la fila
				$arrColumnas = explode('@', $arrFilas[$i]);
				//se recorre cada columna de la fila
				for($j=0; $j<count($arrColumnas); $j++){
					//se verifica si el dato de la columna está vacío
					if($arrColumnas[$j] == '' && $j != 3){
						$error = "blanco";
						break;
					}
				}
			}
			return $error;
		}
	}
?>
