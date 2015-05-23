<?php
	/*session_start();
	$page_id = "MantAcuerdos";
	if ($_SESSION['permisos'] == 'all' || in_array($page_id, $_SESSION['permisos'])){*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
	<title>Control Mix Express - Acuerdos</title>
	<link href="css/estilosCME.css?v=2.0" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,100' rel='stylesheet' type='text/css'>
	<link href="js/jqueryUi/css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jqueryUi/js/jquery-ui-1.8.11.custom.min.js"></script>
	<script type="text/javascript" src="js/listaAcuerdos.js"></script>
</head>
<body>
	<?php //echo $_SESSION['menu']; ?>
	<div id="main-body">
		<div class="titulo roboto100">Acuerdos</div>
		<ul class="barra_botones">
			<li class="boton_izq"><a class="button1">Nuevo</a></li>
		</ul>
		<div class="listado">
			<div class="busqueda">
				<ul class="tabla_labels_list roboto300">
					<li>Obra &nbsp;&nbsp;&nbsp;<input type="text" id="txtObra" name="txtObra" class="txtfield1 txtfield_size300 roboto300"></li>
					<input type="button" id="btnBuscar" value="Buscar" />
				</ul>
			</div>
			<table class="bordered" id="bordered">
				<thead>
					<tr>
						<th>Nro</th>
						<th>Obra</th>
						<th>Cliente</th>
						<th>Precio</th>
						<th></th>
					</tr>
				</thead>
				<tr>
					<td>15121</td>
					<td>Lima Central Tower</td>
					<td>Constructora Arquitectos S.A.C.</td>
					<td>93.00</td>
					<td><a href="form_acuerdos.php?id=15121"><img src='images/edit.png' title='editar'></a></td>
				</tr>
			</table>
			<div class="paginacion"></div>
		</div>
	</div>
</body>
<?php
	/*} else {
		header("Location: inicio.php");
	}*/
?>
