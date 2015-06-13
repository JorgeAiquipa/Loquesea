<?php
	require_once("../entidades/eCombo.php");
	require_once("../modelos/conex.php");
	
	class Combo {
		
		private $conn2;
		private $listaCombo;
		
		public function __construct(){
			$this->listaCombo = array();
			$this->conn2 = Conexion::abrir2();
		}
		
		public function autocompletar($term){
			$sql = "SELECT ruc,razonsocial,direccion,telefono FROM clientes WHERE razonsocial LIKE ?";
			$stmt = $this->conn2->prepare($sql);
			
			$term = "%$term%";
			$stmt->bindParam(1, $term);

			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['ruc']);
				$eCombo->setComboDesc(utf8_encode($row['razonsocial']));
				$eCombo->setComboDato1($row['ruc']);
				$eCombo->setComboDato2(utf8_encode($row['direccion']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		/*public function autocompletar2($term){
			$sql = "SELECT FACTURAR_ID, FACTURAR_RAZON, FACTURAR_RUC, FACTURAR_DIR FROM empresa_facturar WHERE FACTURAR_RAZON LIKE ?";
			$stmt = $this->conn2->prepare($sql);
			
			$term = "%$term%";
			$stmt->bindParam(1, $term);

			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['FACTURAR_ID']);
				$eCombo->setComboDesc(utf8_encode($row['FACTURAR_RAZON']));
				$eCombo->setComboDato1($row['FACTURAR_RUC']);
				$eCombo->setComboDato2(utf8_encode($row['FACTURAR_DIR']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		public function autocompletar3($term){
			$sql = "SELECT OBRA_ID, OBRA_DESC FROM obras WHERE OBRA_DESC LIKE ?";
			$stmt = $this->conn2->prepare($sql);
			
			$term = "%$term%";
			$stmt->bindParam(1, $term);

			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['OBRA_ID']);
				$eCombo->setComboDesc(utf8_encode($row['OBRA_DESC']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}*/
		
		public function cargarComboObra($clienteId){
			$sql = 'SELECT id,nombreobra FROM obras WHERE ruccliente=?';
			$stmt = $this->conn2->prepare($sql);

			$stmt->bindParam(1, $clienteId);

			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['id']);
				$eCombo->setComboDesc(utf8_encode($row['nombreobra']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}
		
		/*public function cargarComboAcuerdo($obraId){
			$sql = "SELECT ACUERDO_ID, ACUERDO_DESC FROM acuerdos WHERE ACUERDO_ESTADO='1' AND OBRA_ID=?";
			$stmt = $this->conn2->prepare($sql);

			$stmt->bindParam(1, $obraId);

			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['ACUERDO_ID']);
				$eCombo->setComboDesc(utf8_encode($row['ACUERDO_DESC']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}
		
		public function cargarComboRangoCajas($obraId, $planta){
			$sql = 'SELECT NRO_CAJA FROM rango_cajas WHERE DIAS=? AND PLANTA_ID=?';
			$stmt = $this->conn2->prepare($sql);

			$stmt->bindParam(1, $obraId);
			$stmt->bindParam(2, $planta);

			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboDesc($row['NRO_CAJA']);
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboResistencia($cliente, $obra){
			$lista = "";
			$sql = 'SELECT RESISTENCIA FROM ordenes WHERE CLIENTE_ID=? AND OBRA_ID=? GROUP BY RESISTENCIA';
			$stmt = $this->conn2->prepare($sql);
			$stmt->bindParam(1, $cliente);
			$stmt->bindParam(2, $obra);
			$stmt->execute();
			while($row = $stmt->fetch()){
				$lista .= number_format($row['RESISTENCIA'], 1) . "/";
			}
			$this->conn2 = NULL;
			return $lista;
		}

		public function cargarComboEdad($cliente, $obra, $resistencia){
			$lista = "";
			$sql = "SELECT c.EDAD FROM ordenes o, testigos t, cajas c
				WHERE o.ORDEN_NRO=t.ORDEN_NRO
				AND t.CAJA_ID=c.CAJA_ID
				AND o.CLIENTE_ID=?
				AND o.OBRA_ID=?
				AND o.RESISTENCIA=?
				AND t.ESTADO='1'
				GROUP BY c.EDAD";
			$stmt = $this->conn2->prepare($sql);
			$stmt->bindParam(1, $cliente);
			$stmt->bindParam(2, $obra);
			$stmt->bindParam(3, $resistencia);
			$stmt->execute();
			while($row = $stmt->fetch()){
				$lista .= $row['EDAD'] . "/";
			}
			$this->conn2 = NULL;
			return $lista;
		}

		public function cargarComboCliente(){
			$sql = 'SELECT CLIENTE_ID, CLIENTE_RAZON FROM clientes ORDER BY CLIENTE_RAZON';
			$stmt = $this->conn2->prepare($sql);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['CLIENTE_ID']);
				$eCombo->setComboDesc(utf8_encode($row['CLIENTE_RAZON']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboEmpresa(){
			$sql = 'SELECT * FROM empresa_facturar ORDER BY FACTURAR_RAZON';
			$stmt = $this->conn2->prepare($sql);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['FACTURAR_ID']);
				$eCombo->setComboDesc(utf8_encode($row['FACTURAR_RAZON']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboObra2(){
			$sql = 'SELECT * FROM obras ORDER BY OBRA_DESC';
			$stmt = $this->conn2->prepare($sql);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['OBRA_ID']);
				$eCombo->setComboDesc(utf8_encode($row['OBRA_DESC']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboTipo(){
			$sql = 'SELECT * FROM tipousuario ORDER BY TIPO_DESC DESC';
			$stmt = $this->conn2->prepare($sql);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['TIPO_ID']);
				$eCombo->setComboDesc(utf8_encode($row['TIPO_DESC']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboObra3($empresaId){
			$sql = 'SELECT * FROM obras o, empresa_facturar ef WHERE o.FACTURAR_ID=ef.FACTURAR_ID AND o.FACTURAR_ID=? ORDER BY o.OBRA_DESC';
			$stmt = $this->conn2->prepare($sql);
			$stmt->bindParam(1, $empresaId);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['OBRA_ID']);
				$eCombo->setComboDesc(utf8_encode($row['OBRA_DESC']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboObra4(){
			$sql = "SELECT
					ob.OBRA_ID,
					(SELECT OBRA_DESC FROM obras ob1 WHERE ob1.OBRA_ID=ob.OBRA_ID) OBRA_DESC,
					(CASE WHEN (SELECT a1.ULTIMA_FECHA FROM acuerdos a1 WHERE a1.OBRA_ID=ob.OBRA_ID AND a1.ACUERDO_ESTADO='1') IS NULL THEN
						(SELECT MAX(DATE(ORDEN_FECHA)) FROM ordenes o1 WHERE o1.OBRA_ID=ob.OBRA_ID)
					ELSE
						a.ULTIMA_FECHA
					END) FECHA
					FROM obras ob, acuerdos a
					WHERE ob.OBRA_ID=a.OBRA_ID
					AND a.ACUERDO_ESTADO='1'
					ORDER BY ob.OBRA_DESC";
			$stmt = $this->conn2->prepare($sql);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$fechaActual = strtotime(date("Y-m-d"));
				$fecha = strtotime($row['FECHA']);
				if(round(($fechaActual - $fecha)/60/60/24, 0) >= 30 && $row['FECHA'] != ''){
					$eCombo = new EntidadCombo();
					$eCombo->setComboId($row['OBRA_ID']);
					$eCombo->setComboDesc(utf8_encode($row['OBRA_DESC']));
					$this->listaCombo[] = $eCombo;
				}
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboProbetero($idCliente){
			$sql = "SELECT PROB_ID, CONCAT(PROB_APELLIDOS,', ',PROB_NOMBRE) AS NOMBRE FROM probeteros WHERE CLIENTE_ID IN(?,1) ORDER BY CONCAT(PROB_APELLIDOS,', ',PROB_NOMBRE)";
			$stmt = $this->conn2->prepare($sql);
			$stmt->bindParam(1, $idCliente);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['PROB_ID']);
				$eCombo->setComboDesc(utf8_encode($row['NOMBRE']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboRubro(){
			$sql = "SELECT * FROM rubros";
			$stmt = $this->conn3->prepare($sql);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['RUBRO_ID']);
				$eCombo->setComboDesc(utf8_encode($row['RUBRO_DESC']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn3 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboCategoria(){
			$sql = "SELECT * FROM categorias";
			$stmt = $this->conn3->prepare($sql);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['CATEG_ID']);
				$eCombo->setComboDesc(utf8_encode($row['CATEG_DESC']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn3 = NULL;
			return $this->listaCombo;
		}

		public function cargarComboProveedor(){
			$sql = "SELECT * FROM cliente_proveedores";
			$stmt = $this->conn2->prepare($sql);
			$stmt->execute();
			
			while($row = $stmt->fetch()){
				$eCombo = new EntidadCombo();
				$eCombo->setComboId($row['PROV_ID']);
				$eCombo->setComboDesc(utf8_encode($row['PROV_DESC']));
				$this->listaCombo[] = $eCombo;
			}
			$this->conn2 = NULL;
			return $this->listaCombo;
		}*/
	}
?>
