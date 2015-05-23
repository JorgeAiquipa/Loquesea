<?php
	/*session_start();
	$page_id = "MantProbeteros";
	if ($_SESSION['permisos'] == 'all' || in_array($page_id, $_SESSION['permisos'])){*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
	<title>Sistema Control Mix Express - Obras</title>
	<link href="css/estilosCME.css?v=2.0" rel="stylesheet" type="text/css">
	<link href="js/jqueryUi/css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,100' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jqueryUi/js/jquery-ui-1.8.11.custom.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#txtFecha").datepicker({ dateFormat: 'dd/mm/yy', changeMonth:true, changeYear: true, yearRange: '2011:new Date().getFullYear().toString()' });
		});
	</script>
</head>
<body>
	<?php //echo $_SESSION['menu']; ?>
	<div id="main-body">
		<div class="titulo roboto100">Probeteros &raquo; <a class="titulo_detalle roboto300"></a></div>
		<form id="form1" name="form1" method="post" action="controlador/cProbetero.php">
		<input type="hidden" id="txtProbeteroId2" name="txtProbeteroId2" />
		<ul class="barra_botones">
			<li class="boton_izq"><input type="submit" class="buttonsub1" id="grabar" value="Grabar" /></li>
			<li class="boton_der"><a class="button1" id="volver" onclick="window.history.back();">Volver</a></li>
		</ul>
		<div class="msginfo"></div>
		<div class="tabla-container">
			<ul id="labels" class="tabla_labels_list roboto300">
				<li>Código</li>
				<li>Nombre</li>
				<li>Apellidos</li>
				<li>DNI</li>
				<li>Fecha de emisión</li>
				<li>Cliente</li>
			</ul>
			<ul id="inputs" class="tabla_labels_list roboto300">
				<li><input type="text" id="txtCodigo" name="txtCodigo" class="txtfield1 txtfield_size300 roboto300" value="<?php if(isset($_GET['id'])){ echo "CME-302"; } else { echo ""; }?>"></li>
				<li><input type="text" id="txtNombre" name="txtNombre" class="txtfield1 txtfield_size300 roboto300" value="<?php if(isset($_GET['id'])){ echo "Humberto"; } else { echo ""; }?>"></li>
				<li><input type="text" id="txtApellidos" name="txtApellidos" class="txtfield1 txtfield_size300 roboto300" value="<?php if(isset($_GET['id'])){ echo "Huamán Torres"; } else { echo ""; }?>"></li>
				<li><input type="text" id="txtDni" name="txtDni" class="txtfield1 txtfield_size300 roboto300" value="<?php if(isset($_GET['id'])){ echo "33862975"; } else { echo ""; }?>"></li>
				<li><input type="text" id="txtFecha" name="txtFecha" readonly="true" class="txtfield1 txtfield_size300 roboto300" value="<?php if(isset($_GET['id'])){ echo "01/05/2015"; } else { echo ""; }?>"></li>
				<li>
					<select id="slcCliente" name="slcCliente" class="roboto300">
						<option value="<?php if(isset($_GET['id'])){ echo "1"; } else { echo ""; }?>"><?php if(isset($_GET['id'])){ echo "Constructora Arquitectos S.A.C."; } else { echo ""; }?></option>
					</select>
				</li>
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
