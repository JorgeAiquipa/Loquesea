<?php
	require_once("../modelos/mCliente.php");
	require_once("../entidades/eCliente.php");
	$clientes = new Clientes();

    if(isset($_POST['var']) && $_POST['var'] == 'listar'){
		    $url = "http://localhost:4325/ClienteREST.svc/Clientes";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result  = curl_exec($ch);
        curl_close($ch);
        echo $result;
    }

	if(isset($_POST['var']) && $_POST['var'] == 'grabar'){
		$eCliente = new EntidadCliente();
		$eCliente->setClienteId($_POST['txtClienteId']);
		$eCliente->setRazon(utf8_decode(trim($_POST['txtRazonSocial'])));
		$eCliente->setRuc(trim($_POST['txtRuc']));
		$eCliente->setDireccion(utf8_decode(trim($_POST['txtDireccion'])));
		$eCliente->setTelf(trim($_POST['txtTelefono']));
		$validar = $clientes->validaciones($eCliente);
		if($validar != 'ok'){
			echo $validar;
    }	else {
			if(isset($_POST['txtclienteId']) && $_POST['txtclienteId'] == ''){
				$url = "http://localhost:4325/ClienteREST.svc/Clientes";
	            $fields = array(
	                            'Razonsocial' => $eCliente->getRazon(),
	                            'Ruc' => $eCliente->getRuc(),
	                            'Direccion' => $eCliente->getDireccion(),
	                            'Telefono' => $eCliente->getTelf()
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
			} elseif(isset($_POST['txtclienteId']) && $_POST['txtclienteId'] != ''){
          $url = "http://localhost:4325/ClienteREST.svc/Clientes";
          $fields = array(
                          'Razonsocial' => $eCliente->getRazon(),
                          'Ruc' => $eCliente->getRuc(),
                          'Direccion' => $eCliente->getDireccion(),
                          'Telefono' => $eCliente->getTelf()
                          );
          $data_json = json_encode($fields);
          $ch = curl_init();
          curl_setopt($ch,CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
          curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          $result = curl_exec($ch);
          curl_close($ch);
          echo $result;
			}
    }
	}

    if(isset($_POST['var']) && $_POST['var'] == 'cargarDatos'){
        $url = "http://localhost:4325/ClienteREST.svc/Clientes/".$_POST['id'];
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result  = curl_exec($ch);
        curl_close($ch);
        echo $result;
    }

    if(isset($_POST['var']) && $_POST['var'] == 'borrar'){
        $url = "http://localhost:4325/ClienteREST.svc/Clientes/".$_POST['id'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result  = curl_exec($ch);
        curl_close($ch);
        echo $result;
    }


?>
