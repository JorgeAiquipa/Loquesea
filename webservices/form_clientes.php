<?php
	/*session_start();
	$page_id = "MantClientes";
	if ($_SESSION['permisos'] == 'all' || in_array($page_id, $_SESSION['permisos'])){*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
	<title>Control Mix Express - Clientes</title>
	<link href="js/jqueryUi/css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css">
	<link href="css/estilosCME.css?v=2.0" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,100' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jqueryUi/js/jquery-ui-1.8.11.custom.min.js"></script>
	<script type="text/javascript" src="js/form_clientes.js"></script>
	<script type="text/javascript" src="js/base_64.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
	<?php //echo $_SESSION['menu']; ?>
	<div id="main-body">
		<div class="titulo roboto100">Clientes &raquo; <a class="titulo_detalle roboto300"></a></div>
		<form id="form1" name="form1" method="post" action="controlador/cCliente.php">
		<ul class="barra_botones">
			<li class="boton_izq"><input type="submit" class="buttonsub1" id="grabar" value="Grabar" /></li>
			<li class="boton_der"><a class="button1" id="volver">Volver</a></li>
		</ul>
		<div class="msginfo"></div>
		<div class="tabla-container">
			<input type="hidden" id="txtClienteId" name="txtClienteId" />
			<ul class="tabla_labels_list roboto300">
				<li>Código</li>
				<li>RUC</li>
				<li>Razón social</li>
				<li>Dirección</li>
				<li>Teléfono</li>
			</ul>
			<ul class="tabla_labels_list roboto300">
				<li><a id="lblClienteId"></a></li>
				<li><input type="text" id="txtRuc" name="txtRuc" class="txtfield1 txtfield_size300 roboto300"></li>
				<li><input type="text" id="txtRazonSocial" name="txtRazonSocial" class="txtfield1 txtfield_size300 roboto300"></li>
				<li><input type="text" id="txtDireccion" name="txtDireccion" class="txtfield1 txtfield_size300 roboto300"></li>
				<li><input type="text" id="txtTelefono" name="txtTelefono" class="txtfield1 txtfield_size300 roboto300"></li>
			</ul>
		</div>
		</form>
	</div>
</body>
<?php
	/*} else {
		header("Location: inicio.php");
	}*/
?>
