<?php
	require_once("../entidades/eCombo.php");
	require_once("../modelos/mCombo.php");
	$combo = new Combo();
	session_start();
	
	if(isset($_GET['term']) && strlen($_GET['term']) >= 3 && isset($_GET['var']) && $_GET['var'] == 'ordenes'){
		$arreglo = array();
		$listaCombo = $combo->autocompletar($_GET['term']);
		foreach($listaCombo as $datos){
			$arreglo[] = array("value" => $datos->getComboDesc(),
					   "id" => $datos->getComboId(),
					   "ruc" => $datos->getComboDato1(),
					   "dir" => $datos->getComboDato2());
		}
		echo json_encode($arreglo);
	}

	/*if(isset($_GET['term']) && strlen($_GET['term']) >= 3 && isset($_GET['var']) && $_GET['var'] == 'facturas'){
		$arreglo = array();
		$listaCombo = $combo->autocompletar2($_GET['term']);
		foreach($listaCombo as $datos){
			$arreglo[] = array("value" => $datos->getComboDesc(),
					   "id" => $datos->getComboId(),
					   "ruc" => $datos->getComboDato1(),
					   "dir" => $datos->getComboDato2());
		}
		echo json_encode($arreglo);
	}

	if(isset($_GET['term']) && strlen($_GET['term']) >= 3 && isset($_GET['var']) && $_GET['var'] == 'obras'){
		$arreglo = array();
		$listaCombo = $combo->autocompletar3($_GET['term']);
		foreach($listaCombo as $datos){
			$arreglo[] = array("value" => $datos->getComboDesc(),
					   "id" => $datos->getComboId());
		}
		echo json_encode($arreglo);
	}*/
	
	if(isset($_POST['clienteId']) && $_POST['clienteId'] != ''){
		$listaObras = $combo->cargarComboObra($_POST['clienteId']);
		foreach($listaObras as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}

	/*if(isset($_POST['empresaId']) && $_POST['empresaId'] != ''){
		$listaObras = $combo->cargarComboObra3($_POST['empresaId']);
		foreach($listaObras as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}
	
	if(isset($_POST['obraId']) && $_POST['obraId'] != ''){
		$listaAcuerdos = $combo->cargarComboAcuerdo($_POST['obraId']);
		foreach($listaAcuerdos as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}
	
	if(isset($_POST['rango']) && $_POST['rango'] != ''){
		$listaRangos = $combo->cargarComboRangoCajas($_POST['rango'], $_SESSION['ses_planta']);
		foreach($listaRangos as $datos){
			echo $datos->getComboDesc() . "|";
		}
	}
	
	if(isset($_POST['obraId2']) && $_POST['obraId2'] != ''){
		echo $combo->cargarComboResistencia($_POST['clienteCod'], $_POST['obraId2']);
	}

	if(isset($_POST['resistencia']) && $_POST['resistencia'] != ''){
		echo $combo->cargarComboEdad($_POST['clienteCod'], $_POST['obraId3'], $_POST['resistencia']);
	}

	if(isset($_POST['var']) && $_POST['var'] == 'clientes'){
		$listaClientes = $combo->cargarComboCliente();
		foreach($listaClientes as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}

	if(isset($_POST['var']) && $_POST['var'] == 'empresas'){
		$listaEmpresas = $combo->cargarComboEmpresa();
		foreach($listaEmpresas as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}

	if(isset($_POST['var']) && $_POST['var'] == 'obras'){
		$listaObras = $combo->cargarComboObra2();
		foreach($listaObras as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}

	if(isset($_POST['var']) && $_POST['var'] == 'obras2'){
		$listaObras = $combo->cargarComboObra4();
		foreach($listaObras as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}

	if(isset($_POST['var']) && $_POST['var'] == 'tipos'){
		$listaTipos = $combo->cargarComboTipo();
		foreach($listaTipos as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}

	if(isset($_POST['var']) && $_POST['var'] == 'probeteros'){
		$listaProbeteros = $combo->cargarComboProbetero($_POST['idCliente']);
		foreach($listaProbeteros as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}

	if(isset($_POST['var']) && $_POST['var'] == 'cargarRubros'){
		$listaRubros = $combo->cargarComboRubro();
		foreach($listaRubros as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}

	if(isset($_POST['var']) && $_POST['var'] == 'cargarCategorias'){
		$listaCategorias = $combo->cargarComboCategoria();
		foreach($listaCategorias as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}

	if(isset($_POST['var']) && $_POST['var'] == 'cargarProveedor'){
		$listaProveedores = $combo->cargarComboProveedor();
		foreach($listaProveedores as $datos){
			echo $datos->getComboId() . "/" . $datos->getComboDesc() . "|";
		}
	}*/
?>
