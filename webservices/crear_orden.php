<?php
	session_start();
	$page_id = "CrearOrden";
	if ($_SESSION['permisos'] == 'all' || in_array($page_id, $_SESSION['permisos'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<title>Control Mix Express - Crear orden</title>
	<link href="css/estilosCME.css?v=2.0" rel="stylesheet" type="text/css">
    	<link href="css/jquery.alerts.css" rel="stylesheet" type="text/css">
    	<link href="css/calendar.css" rel="stylesheet" type="text/css">
    	<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css">
	<link rel="stylesheet" type="text/css" href="js/flexigrid/css/flexigrid/flexigrid.css">
	<link href="js/jqueryUi/css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css">
        <link href="css/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,100' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/flexigrid/flexigrid.js"></script>
	<script type="text/javascript" src="js/crear_orden.js"></script>
	<script type="text/javascript" src="js/jquery.alerts.js"></script>
	<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
	<script type="text/javascript" src="js/jqueryUi/js/jquery-ui-1.8.11.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.bpopup.js"></script>
  	<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
<?php echo $_SESSION['menu']; ?>
<form id="form1" name="form1" method="post" action="controlador/cOrden.php" autocomplete="off">
<input type="hidden" name="txtIdOculto" id="txtIdOculto" value="<?php echo md5('guia');?>" />
<input type="hidden" id="txtValor1" />
<input type="hidden" id="txtValor2" />
<div id="page-container">
	<div class="titulo roboto100">Ingreso de órdenes</div>
	<input type="hidden" name="txtDiametroGeneral" id="txtDiametroGeneral" />
	<div class="cabecera_guia guia_container"><!--cabecera_guia-->
		<ul class="guia_lista1 cabecera_lista_izq">
        	<li><a class="etiqueta_guia1">Nombre empresa :</a><input class="textfields txtfCliente" id="txtNombreEmpresa" name="txtNombreEmpresa" type="text" maxlength="30" tabindex="1"/></li>
			<li><a class="etiqueta_guia1">Código cliente :</a><input class="textfields txtfcabecera" id="txtCodigoCliente" name="txtCodigoCliente" type="text" maxlength="30" tabindex="3" readonly="true"/></li>
		</ul>
		<ul class="guia_lista1 cabecera_lista_der">
			<li><a class="etiqueta_guia1">N&deg; orden de servicio :</a><input class="textfields txtfcabecera" id="txtOrdenServicio" name="txtOrdenServicio" type="text" maxlength="15" tabindex="2"/></li>
            <li><a class="etiqueta_guia1">Obra :</a>
                <select class="selectguia slcguiasize1" id="slcObra" name="slcObra">
                	<option value=""></option>
                </select>
            </li>
            <li><a class="etiqueta_guia1">N&deg; guía de camión :</a><input class="textfields txtfcabecera" id="txtGuiaCamion" name="txtGuiaCamion" type="text" maxlength="17" tabindex="6" /><a id="btnGuiaCamion" title="Auto-generar Nro de guía de camión" class="slcguia_boton"></a></li>
		</ul>
	</div><!--cabecera_guia-->
	<div class="body_guia guia_container"><!--body_guia-->
		<ul class="guia_lista1 cabecera_lista_izq">
			<li><a class="etiqueta_guia1">Estructura (descripción):</a></li>
			<li><textarea class="textfields txtarea_body" name="txtEstructura" id="txtEstructura" name="txtEstructura" tabindex="7" maxlength="160"></textarea></li>	
			<li><a class="etiqueta_guia1">Comentarios :</a></li>
			<li><textarea class="textfields txtarea_body" name="txtComentarios" id="txtComentarios" name="txtComentarios" tabindex="12" maxlength="100"></textarea></li>
		</ul><!--cabecera_lista_izq-->
		<ul class="guia_lista1 cabecera_lista_der">
			<li><a class="etiqueta_guia1">Resistencia (kg/cm²) :</a><input class="textfields txtfcabecera" id="txtResistencia" name="txtResistencia" type="text" maxlength="30" tabindex="8" onkeypress="return soloNumeros(event);" /></li>
			<li><a class="etiqueta_guia1">Fecha de moldeo :</a><input class="textfields txtfFecha" id="txtFecha" name="txtFecha" type="text" maxlength="10" tabindex="9" readonly="true" />
            			<input class="textfields txtfHora" id="txtHora" name="txtHora" type="text" maxlength="10" tabindex="9" readonly="true" />
           		</li>
			<li><a class="etiqueta_guia1">Fecha de recojo :</a><input class="textfields txtfFecha" id="txtFecha2" name="txtFecha2" type="text" maxlength="10" tabindex="9" readonly="true" />
            			<input class="textfields txtfHora" id="txtHora2" name="txtHora2" type="text" maxlength="10"  readonly="true" />
           		</li>
			<li><a class="etiqueta_guia1">Edad de ensayo :</a>
				<select tabindex="10" id="slcEdad" name="slcEdad" class="selectguia">
					<option value="NN">-</option>
				        <option value="1">1 día</option>
				        <option value="3">3 días</option>
					<option value="7">7 días</option>
					<option value="28">28 días</option>
                    			<option value="90">90 días</option>
					<option value="manual">manual</option>
				</select>
				<input class="textfields txtfmanual" id="txtEdad" type="text" maxlength="2"/>
			</li>
			<li><a class="etiqueta_guia1">Número de testigos :</a>
				<select tabindex="11" id="slcTestigos" name="slcTestigos" class="selectguia">
					<option value="NN">-</option>
					<option value="3" selected="selected">3</option>
                    			<option value="2">2</option>
					<!--<option value="manual">manual</option>-->
				</select>
				<input class="textfields txtfmanual" id="txtTestigos" name="txtTestigos" type="text" maxlength="2"/>
			</li>
			<li><a class="etiqueta_guia1">N&deg; de caja :</a>
				<input class="textfields txtfHora" id="txt_NroCaja" name="txt_NroCaja" type="text" maxlength="4" />
				<input class="textfields txtfmanual" id="txtTestigos" name="txtTestigos" type="text" maxlength="2"/>
			</li>
			<li>
				<a class="etiqueta_guia1">Cuarto curación :</a><a id="loader2" class="loader2"></a><input type="button" id="btnAlmacen" name="btnAlmacen" value="Buscar" /><a id="almacen_sel" class="almacen_sel">Seleccione la posición</a>
			</li>
		</ul><!--cabecera_lista_der-->
		<div class="botones_guia_container">
        	<input type="button" class="boton_guia" tabindex="14" id="btnBorrar" name="btnBorrar" value="Borrar todo"/>
			<input type="button" class="boton_guia" tabindex="13" id="btnCrear" name="btnCrear" value="Agregar testigos"/>
		</div><!--botones_guia_container-->
	</div><!--body_guia-->
	<div class="guia_container tabla_container">
		<table id="tabla_testigos" class="tabla_testigos"></table>
	</div>
	<div class="guia_container footer_container">
		<input type="submit" class="boton_guia" tabindex="15" id="btnGrabar" name="btnGrabar" value="Grabar orden"/>
        	<a id="loader" class="loader"></a>
		<a id="msginfo" class="msginfo"></a>
	</div>
	<div style="display:none" id="popup_codigo_barras" class="popup">
		<input type="hidden" id="txtId" />
        <br />
    	<input type="text" id="txtCodigoBarras" style="width: 150px;" onchange="asignarCodigo();" onkeypress="return soloNumeros(event);" maxlength="12" />
    </div>
	<div id="anaqueles" class="popup" style="display: none;">
		<ul class="anaqueles1">
			<li><a id="1" class="anaquel anaquel-color-vacio">1</a></li>
			<li><a id="2" class="anaquel anaquel-color-vacio">2</a></li>
			<li><a id="3" class="anaquel anaquel-color-vacio">3</a></li>
			<li><a id="4" class="anaquel anaquel-color-vacio">4</a></li>
			<li><a id="5" class="anaquel anaquel-color-vacio">5</a></li>
			<li><a id="6" class="anaquel anaquel-color-vacio">6</a></li>
			<li><a id="7" class="anaquel anaquel-color-vacio">7</a></li>
			<li><a id="8" class="anaquel anaquel-color-vacio">8</a></li>
			<li><a id="9" class="anaquel anaquel-color-vacio">9</a></li>
			<li><a id="10" class="anaquel anaquel-color-vacio">10</a></li>
			<li><a id="11" class="anaquel anaquel-color-vacio">11</a></li>
			<li><a id="12" class="anaquel anaquel-color-vacio">12</a></li>
		</ul>
		<ul class="anaqueles2">
			<li><a id="13" class="anaquel anaquel-color-vacio">13</a></li>
			<li><a id="14" class="anaquel anaquel-color-vacio">14</a></li>
			<li><a id="15" class="anaquel anaquel-color-vacio">15</a></li>
			<li><a id="16" class="anaquel anaquel-color-vacio">16</a></li>
			<li><a id="17" class="anaquel anaquel-color-vacio">17</a></li>
			<li><a id="18" class="anaquel anaquel-color-vacio">18</a></li>
			<li><a id="19" class="anaquel anaquel-color-vacio">19</a></li>
			<li><a id="20" class="anaquel anaquel-color-vacio">20</a></li>
			<li><a id="21" class="anaquel anaquel-color-vacio">21</a></li>
			<li><a id="22" class="anaquel anaquel-color-vacio">22</a></li>
			<li><a id="23" class="anaquel anaquel-color-vacio">23</a></li>
			<li><a id="24" class="anaquel anaquel-color-vacio">24</a></li>
		</ul>
		<ul class="anaqueles3">
			<li><a id="25" class="anaquel anaquel-color-vacio">25</a></li>
			<li><a id="26" class="anaquel anaquel-color-vacio">26</a></li>
			<li><a id="27" class="anaquel anaquel-color-vacio">27</a></li>
			<li><a id="28" class="anaquel anaquel-color-vacio">28</a></li>
			<li><a id="29" class="anaquel anaquel-color-vacio">29</a></li>
			<li><a id="30" class="anaquel anaquel-color-vacio">30</a></li>
			<li><a id="31" class="anaquel anaquel-color-vacio">31</a></li>
			<li><a id="32" class="anaquel anaquel-color-vacio">32</a></li>
			<li><a id="33" class="anaquel anaquel-color-vacio">33</a></li>
			<li><a id="34" class="anaquel anaquel-color-vacio">34</a></li>
			<li><a id="35" class="anaquel anaquel-color-vacio">35</a></li>
			<li><a id="36" class="anaquel anaquel-color-vacio">36</a></li>
		</ul>
		<ul class="anaqueles4">
			<li><a id="37" class="anaquel anaquel-color-vacio">37</a></li>
			<li><a id="38" class="anaquel anaquel-color-vacio">38</a></li>
			<li><a id="39" class="anaquel anaquel-color-vacio">39</a></li>
			<li><a id="40" class="anaquel anaquel-color-vacio">40</a></li>
			<li><a id="41" class="anaquel anaquel-color-vacio">41</a></li>
			<li><a id="42" class="anaquel anaquel-color-vacio">42</a></li>
			<li><a id="43" class="anaquel anaquel-color-vacio">43</a></li>
			<li><a id="44" class="anaquel anaquel-color-vacio">44</a></li>
			<li><a id="45" class="anaquel anaquel-color-vacio">45</a></li>
			<li><a id="46" class="anaquel anaquel-color-vacio">46</a></li>
			<li><a id="47" class="anaquel anaquel-color-vacio">47</a></li>
			<li><a id="48" class="anaquel anaquel-color-vacio">48</a></li>
		</ul>
		<ul class="anaqueles5">
			<li><a id="49" class="anaquel anaquel-color-vacio">49</a></li>
			<li><a id="50" class="anaquel anaquel-color-vacio">50</a></li>
			<li><a id="51" class="anaquel anaquel-color-vacio">51</a></li>
			<li><a id="52" class="anaquel anaquel-color-vacio">52</a></li>
			<li><a id="53" class="anaquel anaquel-color-vacio">53</a></li>
			<li><a id="54" class="anaquel anaquel-color-vacio">54</a></li>
			<li><a id="55" class="anaquel anaquel-color-vacio">55</a></li>
			<li><a id="56" class="anaquel anaquel-color-vacio">56</a></li>
			<li><a id="57" class="anaquel anaquel-color-vacio">57</a></li>
			<li><a id="58" class="anaquel anaquel-color-vacio">58</a></li>
			<li><a id="59" class="anaquel anaquel-color-vacio">59</a></li>
			<li><a id="60" class="anaquel anaquel-color-vacio">60</a></li>
		</ul>
		<ul class="anaqueles6">
			<li><a id="61" class="anaquel anaquel-color-vacio">61</a></li>
			<li><a id="62" class="anaquel anaquel-color-vacio">62</a></li>
			<li><a id="63" class="anaquel anaquel-color-vacio">63</a></li>
			<li><a id="64" class="anaquel anaquel-color-vacio">64</a></li>
			<li><a id="65" class="anaquel anaquel-color-vacio">65</a></li>
			<li><a id="66" class="anaquel anaquel-color-vacio">66</a></li>
			<li><a id="67" class="anaquel anaquel-color-vacio">67</a></li>
			<li><a id="68" class="anaquel anaquel-color-vacio">68</a></li>
			<li><a id="69" class="anaquel anaquel-color-vacio">69</a></li>
			<li><a id="70" class="anaquel anaquel-color-vacio">70</a></li>
			<li><a id="71" class="anaquel anaquel-color-vacio">71</a></li>
			<li><a id="72" class="anaquel anaquel-color-vacio">72</a></li>
		</ul>
		<ul class="anaqueles7">
			<li><a id="73" class="anaquel anaquel-color-vacio">73</a></li>
			<li><a id="74" class="anaquel anaquel-color-vacio">74</a></li>
			<li><a id="75" class="anaquel anaquel-color-vacio">75</a></li>
			<li><a id="76" class="anaquel anaquel-color-vacio">76</a></li>
			<li><a id="77" class="anaquel anaquel-color-vacio">77</a></li>
			<li><a id="78" class="anaquel anaquel-color-vacio">78</a></li>
			<li><a id="79" class="anaquel anaquel-color-vacio">79</a></li>
			<li><a id="80" class="anaquel anaquel-color-vacio">80</a></li>
			<li><a id="81" class="anaquel anaquel-color-vacio">81</a></li>
			<li><a id="82" class="anaquel anaquel-color-vacio">82</a></li>
			<li><a id="83" class="anaquel anaquel-color-vacio">83</a></li>
			<li><a id="84" class="anaquel anaquel-color-vacio">84</a></li>
		</ul>
	</div>
	<div id="profundidades" class="popup" style="display: none;">
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">I</a></li>
				<li><a href="#tabs-2">II</a></li>
				<li><a href="#tabs-3">III</a></li>
				<li><a href="#tabs-4">IV</a></li>
				<li><a href="#tabs-5">V</a></li>
			</ul>
			<div id="tabs-1">
				<ul class="filas">
					<li class="fila fila-vacia" id="AI"></li>
					<li class="fila fila-vacia" id="BI"></li>
					<li class="fila fila-vacia" id="CI"></li>
					<li class="fila fila-vacia" id="DI"></li>
					<li class="fila fila-vacia" id="EI"></li>
					<li class="fila fila-vacia" id="FI"></li>
					<li class="fila fila-vacia" id="GI"></li>
				</ul>
			</div>
			<div id="tabs-2">
				<ul class="filas">
					<li class="fila fila-vacia" id="AII"></li>
					<li class="fila fila-vacia" id="BII"></li>
					<li class="fila fila-vacia" id="CII"></li>
					<li class="fila fila-vacia" id="DII"></li>
					<li class="fila fila-vacia" id="EII"></li>
					<li class="fila fila-vacia" id="FII"></li>
					<li class="fila fila-vacia" id="GII"></li>
				</ul>
			</div>
			<div id="tabs-3">
				<ul class="filas">
					<li class="fila fila-vacia" id="AIII"></li>
					<li class="fila fila-vacia" id="BIII"></li>
					<li class="fila fila-vacia" id="CIII"></li>
					<li class="fila fila-vacia" id="DIII"></li>
					<li class="fila fila-vacia" id="EIII"></li>
					<li class="fila fila-vacia" id="FIII"></li>
					<li class="fila fila-vacia" id="GIII"></li>
				</ul>
			</div>
			<div id="tabs-4">
				<ul class="filas">
					<li class="fila fila-vacia" id="AIV"></li>
					<li class="fila fila-vacia" id="BIV"></li>
					<li class="fila fila-vacia" id="CIV"></li>
					<li class="fila fila-vacia" id="DIV"></li>
					<li class="fila fila-vacia" id="EIV"></li>
					<li class="fila fila-vacia" id="FIV"></li>
					<li class="fila fila-vacia" id="GIV"></li>
				</ul>
			</div>
			<div id="tabs-5">
				<ul class="filas">
					<li class="fila fila-vacia" id="AV"></li>
					<li class="fila fila-vacia" id="BV"></li>
					<li class="fila fila-vacia" id="CV"></li>
					<li class="fila fila-vacia" id="DV"></li>
					<li class="fila fila-vacia" id="EV"></li>
					<li class="fila fila-vacia" id="FV"></li>
					<li class="fila fila-vacia" id="GV"></li>
				</ul>
			</div>
		</div>
	</div>
</div><!--page-container-->
</form>

</body>
</html>
<?php
	} else {
		header("Location: inicio.php");
	}
?>
