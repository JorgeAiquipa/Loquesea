<?php
	require_once("../modelos/mUsuario.php");
	$usuarios = new Usuarios();

	if(isset($_POST['var']) && $_POST['var'] == 'login'){
		$permisos = array();
		$respuesta = $usuarios->login($_POST['txtUsuario'], md5($_POST['txtPwd']));
		if($respuesta != 'ok'){
			echo "error1";
		} else {
			require_once("../includes/ParseMenu.php");
			$permisos = $usuarios->cargarPermisos($_POST['txtUsuario']);
			$menucme = new MenuCME();
			$menu = $menucme->run("../menu.php", $permisos);
			$_SESSION['menu'] = $menu;
		}
	}

	if(isset($_POST['var']) && $_POST['var'] == 'cambiarPwd'){
		$respuesta = $usuarios->validarPwd(trim($_POST['txtActual']), trim($_POST['txtNueva']), trim($_POST['txtRepetir']));
		if($respuesta != 'ok')
			echo $respuesta;
		else
			$usuarios->grabarPwd($_SESSION['usr_login'], md5(trim($_POST['txtNueva'])));
	}

	if(isset($_POST['var']) && $_POST['var'] == 'salir'){
		session_start();
		unset($_SESSION['menu'], $_SESSION['usr_login'], $_SESSION['permisos']);
	}
?>
