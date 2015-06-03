<?php 
	session_start();
	if (isset($_SESSION['permisos']) && $_SESSION['permisos'] != ''){
		header("Location: inicio.php");
	} else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Control Mix Express - Sistema Integral</title>
	<link href="css/estilosCME.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
</head>
<body>
<div id="login-page-container">
	<div id="login_frame">
		<div class="image_logocme"></div>
		<div class="image_bars"></div>
		<div class="login_form_container">
			<ul class="login_form">
				<form id="frmLogin" method="post" action="controlador/cUsuario.php" autocomplete="off">
					<li class="login_form_label">Ingrese su usuario y contraseña :</li>
					<li class="login_form_input"><input class="login_textfield" id="txtUsuario" name="txtUsuario" type="text" maxlength="50"/></li>
					<li class="login_form_input"><input class="login_textfield" id="txtPwd" name="txtPwd" type="password" maxlength="50"/></li>
					<li class="login_form_input"><input type="submit" class="login_button" id="btnEntrar" name="btnEntrar" value="Entrar" /></li>					
					<li class="login_form_error"></li>
				</form>
			</ul>
		</div>
	</div>
</div><!--page-container-->

</body>
</html>
<?php
	}
?>