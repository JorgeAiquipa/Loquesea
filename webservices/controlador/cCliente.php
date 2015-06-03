<?php
	require_once("../modelos/mCliente.php");
	require_once("../entidades/eCliente.php");
	$clientes = new Clientes();

    if(isset($_POST['var']) && $_POST['var'] == 'listar'){
		echo $clientes->listarClientes();
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
			if(isset($_POST['txtclienteId']) && $_POST['txtclienteId'] == '')
				echo $clientes->grabar($eCliente);
			elseif(isset($_POST['txtclienteId']) && $_POST['txtclienteId'] != '')
				echo $clientes->actualizar($eCliente);
	}

    if(isset($_POST['var']) && $_POST['var'] == 'cargarDatos'){
        echo $clientes->cargarDatos($_POST['id']);
    }

    if(isset($_POST['var']) && $_POST['var'] == 'borrar'){
        echo $clientes->borrarDatos($_POST['id']);
    }


?>
