<?php
	require_once("../entidades/eOrden.php");
	require_once("../entidades/eTestigo.php");
	require_once("../modelos/mOrden.php");
	$orden = new Orden();
	session_start();
	
	if(isset($_POST['txtIdOculto']) && $_POST['txtIdOculto'] == md5('guia')){
		$fechaRecojo = substr($_POST['txtFecha2'], 6, 4) . "-" . substr($_POST['txtFecha2'], 3, 2) . "-" . substr($_POST['txtFecha2'], 0, 2) . " " . $_POST['txtHora2'];
		$fMoldeo = substr($_POST['txtFecha'], 6, 4) . "-" . substr($_POST['txtFecha'], 3, 2) . "-" . substr($_POST['txtFecha'], 0, 2) . " " . $_POST['txtHora'];
		$eOrden = new EntidadOrden();
		$eOrden->setOrdenNro(trim($_POST['txtOrdenServicio']));
		$eOrden->setOrdenFecha(date("Y-m-d H:i"));
		$eOrden->setClienteId($_POST['txtCodigoCliente']);
		$eOrden->setObraId($_POST['slcObra']);
		$eOrden->setGuiaCamion(utf8_decode(trim($_POST['txtGuiaCamion'])));
		$eOrden->setEstructura(utf8_decode(trim($_POST['txtEstructura'])));
		$eOrden->setComentarios(utf8_decode(trim($_POST['txtComentarios'])));
		$eOrden->setResistencia($_POST['txtResistencia']);
		$eOrden->setUsuario($_SESSION['usr_login']);
		$eOrden->setFechaRecojo($fechaRecojo);
		
		
		//$eOrden->setOrdenFecha(date("Y-m-d H:i"));
		//$eOrden->setFechaRecojo($fechaRecojo);
		//se genera un arreglo con todas las filas de testigos agregados
		$testigos = explode('|', $_POST['detalle']);
		
		$errores = $orden->validaciones($eOrden, $testigos, $fMoldeo);
		if($errores != 'ok'){
			echo $errores;
		} else {
			$caja = "";
			$cont = 1;
			$cont2 = 0;

			$url = "http://localhost:4325/OrdenesREST.svc/Ordenes";
      $fields = array(
                      'orden_nro' => $eOrden->getOrdenNro(),
                      'orden_fecha' => null, //$eOrden->getOrdenFecha(),
                      'cliente_id' => $eOrden->getClienteId(),
                      'obra_id' => $eOrden->getObraId(),
                      'guia_camion' => $eOrden->getGuiaCamion(),
                      'estructura' => $eOrden->getEstructura(),
                      'comentarios' => $eOrden->getComentarios(),
                      'resistencia' => $eOrden->getResistencia(),
                      'fecha_recojo' => null //$eOrden->getFechaRecojo()
                      );
      $data_json = json_encode($fields);
      
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));             
      curl_setopt($ch,CURLOPT_POSTFIELDS, $data_json);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result;
			
			//con este for se obtiene la cantidad de cajas
			for($i=0; $i<count($testigos)-1; $i++){
				//se genera un arreglo de cada columna de la fila
				$arrColumnas = explode('@', $testigos[$i]);

				if($i == 0)
					$caja = trim($arrColumnas[7]);
				
				if($i == 0 || $caja != trim($arrColumnas[7]))
					$cont2++;
				
				if($i > 0)
					$caja = trim($arrColumnas[7]);
			}

			//este for recorre cada fila de los testigos
			for($i=0; $i<count($testigos)-1; $i++){
				//se genera un arreglo de cada columna de la fila
				$arrColumnas = explode('@', $testigos[$i]);
				
				if($i == 0)
					$caja = trim($arrColumnas[7]);
				//se convierte la fecha de formato dd/mm/yyyy a formato yyyy-mm-dd
				$fechaMoldeo = substr($arrColumnas[1], 6, 4) . "-" . substr($arrColumnas[1], 3, 2) . "-" . substr($arrColumnas[1], 0, 2) . " " . substr($arrColumnas[1], 11, 5);
				if($i == 0 || $caja != trim($arrColumnas[7])){
					$eCaja = new EntidadCaja();
					$eCaja->setCajaId('C' . $eOrden->getOrdenNro() . '-' . $cont);
					$eCaja->setCajaNro(trim($arrColumnas[7]));
					$eCaja->setNroTestigos((count($testigos)-1)/$cont2);
					$eCaja->setPosicion(trim($arrColumnas[6]));
					$eCaja->setEdad(trim($arrColumnas[2]));
					$eCaja->setFechaMoldeo(trim($fechaMoldeo));
					$eCaja->setOrdenNro($eOrden->getOrdenNro());
					
          $url = "http://localhost:4325/OrdenesREST.svc/Ordenes/Cajas";
          $fields = array(
                          'caja_id' => $eCaja->getCajaId(),
                          'caja_nro' => $eCaja->getCajaNro(),
                          'nro_testigos' => $eCaja->getNroTestigos(),
                          'posicion' => $eCaja->getPosicion(),
                          'edad' => $eCaja->getEdad(),
                          'orden_nro' => $eCaja->getOrdenNro()
                          );
          $data_json = json_encode($fields);
          $ch = curl_init();
          curl_setopt($ch,CURLOPT_URL, $url);
          curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));             
          curl_setopt($ch,CURLOPT_POSTFIELDS, $data_json);
          curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
          $result = curl_exec($ch);
          curl_close($ch);
          echo $result;
					
					//actualizar la posición
					$orden->actualizarPosicion(trim($arrColumnas[6]), $eCaja->getCajaId(), 1);
					$cont++;
				}
				if($i > 0)
					$caja = trim($arrColumnas[7]);
				
				$eTestigo = new EntidadTestigo();
				$eTestigo->setTestBarras(trim($arrColumnas[5]));
				$eTestigo->setOrdenNro($eCaja->getOrdenNro());
				$eTestigo->setTestCod(trim($arrColumnas[0]));
				$eTestigo->setTestDiametro(trim($arrColumnas[4]));
				$eTestigo->setCajaId($eCaja->getCajaId());
				$eTestigo->setEstado("0");
				
        $url = "http://localhost:4325/OrdenesREST.svc/Ordenes/Testigos";
        $fields = array(
                        'test_barras' => $eTestigo->getTestBarras(),
                        'orden_nro' => $eTestigo->getOrdenNro(),
                        'test_cod' => $eTestigo->getTestCod(),
                        'test_diametro' => 1,
                        'caja_id' => $eTestigo->getCajaId(),
                        'estado' => $eTestigo->getEstado()
                        );
        $data_json = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));             
        curl_setopt($ch,CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        echo $result;
			}
		}			
	}
	
	if(isset($_POST['var']) && $_POST['var'] == 'anaqueles'){
		$cadena = $orden->listaAnaqueles(1);
		echo $cadena;
	}
	
	if(isset($_POST['anaquel']) && $_POST['anaquel'] != ''){
		$cadena = $orden->listaPosiciones($_POST['anaquel'], 1);
		echo $cadena;
	}
?>
