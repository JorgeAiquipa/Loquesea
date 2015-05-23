<?php
	require_once("../modelos/mCliente.php");
	require_once("../entidades/eCliente.php");
	$clientes = new Clientes();

	if(isset($_POST['var']) && $_POST['var'] == 'listar'){
		if(isset($_POST['page']))
			$page = $_POST['page'];
		else
			$page = 1;
		echo $clientes->listaClientes($page, '');
	}

	if(isset($_POST['cliente'])){
		if(isset($_POST['page']))
			$page = $_POST['page'];
		else
			$page = 1;
		echo $clientes->listaClientes($page, $_POST['cliente']);
	}

	if(isset($_POST['var']) && $_POST['var'] == 'cargar'){
		echo $clientes->cargarDatos($_POST['id']);
	}

	if(isset($_POST['var']) && $_POST['var'] == 'grabar'){
		$eCliente = new EntidadCliente();
		$eCliente->setClienteId($_POST['txtClienteId']);
		$eCliente->setRazon(utf8_decode(trim($_POST['txtRazonSocial'])));
		$eCliente->setRuc(trim($_POST['txtRuc']));
		$eCliente->setDireccion(utf8_decode(trim($_POST['txtDireccion'])));
		$eCliente->setTelf(trim($_POST['txtTelefono']));
		$validar = $clientes->validaciones($eCliente);
		if($validar != 'ok')
			echo $validar;
		else
			if(isset($_POST['clienteId']) && $_POST['clienteId'] == '')
				echo $clientes->grabar($eCliente);
			elseif(isset($_POST['clienteId']) && $_POST['clienteId'] != '')
				$clientes->actualizar($eCliente);
	}
?>
