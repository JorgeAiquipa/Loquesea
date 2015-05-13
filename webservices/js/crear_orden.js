$(document).ready(function() {
		$("#form1").keypress(function(e) {
			if (e.which == 13) {
				return false;
			}
		});
		$("#chkPrioridad").live("click", function(){
			if($('#chkPrioridad').is(':checked')){
				$('#txtPrioridad').css("display","block");
				$(".body_guia").css("height","350");
			} else {
				$('#txtPrioridad').css("display","none");
				$(".body_guia").css("height","310");
			}
		});
		//cargarDiametro();
		$('#txtNombreEmpresa').focus();
		$('#tabla_testigos').flexigrid({
			url: '',
			dataType: 'xml',
			colModel : [
				{display: '# Item', name : 'numitem', width : 30, sortable : false, align: 'center'},
				{display: 'C&oacute;digo', name : 'TESTIGO_ID', width : 140, sortable : false, align: 'center'},
				{display: 'Fecha moldeo', name : 'TESTIGO_FECHA_MOLDEO', width : 90, sortable : false, align: 'center'},
				{display: 'Edad ensayo', name : 'TESTIGO_EDAD', width : 70, sortable : false, align: 'center'},
				{display: 'Peso (kg)', name : 'PESO', width : 80, sortable : false, align: 'center'},
				{display: 'Diámetro (cm)', name : 'DIAMETRO', width : 80, sortable : false, align: 'center'},
				{display: '', name : '', width : 50, sortable : false, align: 'center'},
				{display: 'Código Barras', name : '', width : 100, sortable : false, align: 'center'},
				{display: 'Posición', name : '', width : 70, sortable : false, align: 'center'},
				{display: 'Nro Caja', name : '', width : 70, sortable : false, align: 'center'},
				{display: '', name : 'BORRAR', width : 30, sortable : false, align: 'center', hide: true}
				],
			sortname: "TESTIGO_ID",
			sortorder: "desc",
//			usepager: true,
			title: 'Listado de testigos',
			useRp: true,
			rp: 15,
//			showTableToggleBtn: true,
			width: 1000,
			height: 190,
			p_adicionales : [
				{nombre:'guia_camion', campo: '#txtGuiaCamion'},
				{nombre:'estructura', campo: '#txtEstructura'},
				{nombre:'resistencia', campo: '#txtResistencia'},
				{nombre:'fecha', campo: '#txtFecha'},
				{nombre:'edad', campo: '#slcEdad'},
				{nombre:'edadmanual', campo: '#txtEdad'},
				{nombre:'testigos', campo: '#slcTestigos'},
				{nombre:'testigosmanual', campo: '#txtTestigos'}
				]
		});

			function isNumber(n) {
				return !isNaN(parseFloat(n)) && isFinite(n);
			}
			function imprime_error(campo,mensaje){
				$('#'+campo).addClass("errormsgbg");
				$('#'+campo).focus();
				$("#msginfo").addClass('colormsgerror');
				$("#msginfo").fadeIn(300);
				$("#msginfo").html('ERROR : '+mensaje);
			}

			function imprime_adv(campo,mensaje){
				$('#'+campo).addClass("errormsgbg");
				$('#'+campo).focus();
				$("#msginfo").addClass('colormsgadv');
				$("#msginfo").fadeIn(300);
				$("#msginfo").html('ADVERTENCIA : '+mensaje);
			}

			function restart_notifications(){
				$(".errormsgbg").removeClass("errormsgbg");
				$("#msginfo").fadeOut(200);
				$("#msginfo").removeClass('colormsgerror colormsgok colormsgadv');
			}
			$('#btnCrear').live('click',function(){
				var edad, cadena, total=0, cont=1, error="", error2="";
				restart_notifications();
				if(document.getElementById('tabla_testigos').rows.length > 0)
					cont = document.getElementById('tabla_testigos').rows.length+1;

				for(var i=0; i<document.getElementById('tabla_testigos').rows.length; i++){
					var caja = "#txtNroCaja" + (parseFloat(i)+1);
					var caja2 = "#txtAlmacen" + (parseFloat(i)+1);
					if($('#slcNroCaja').val() == $(caja).val())
						error = "txtNroCaja" + (parseFloat(i)+1);
					else if($('#txtValor1').val() + $('#txtValor2').val() == $(caja2).val())
						error2 = "txtAlmacen" + (parseFloat(i)+1);
				}
					
				if($("#txtGuiaCamion").val() == ''){
					imprime_error('txtGuiaCamion','Por favor ingrese la guía de camión');
				} else if($("#txtResistencia").val() == ''){
					imprime_error('txtResistencia','Por favor ingrese la resistencia');
				} else if($('#txtFecha').val() == ''){
					imprime_error('txtFecha','Por favor ingrese la fecha de moldeo');
				} else if($('#txtHora').val() == ''){
					imprime_error('txtHora','Por favor ingrese la hora de moldeo');
				} else if($('#txtFecha2').val() == ''){
					imprime_error('txtFecha2','Por favor ingrese la fecha de recojo');
				} else if($('#txtHora2').val() == ''){
					imprime_error('txtHora2','Por favor ingrese la hora de recojo');
				} else if(($("#slcEdad").val()=='NN')||(($("#slcEdad").val()=='manual')&&($("#txtEdad").val()==''))){
					imprime_error('slcEdad','Por favor seleccione la edad de ensayo');
				} else if(($("#slcTestigos").val()=='NN')||(($("#slcTestigos").val()=='manual')&&($("#txtTestigos").val()==''))){
					imprime_error('slcTestigos','Por favor seleccione el número de testigos');
				} else if($("#slcNroCaja").val()==''){
					imprime_error('slcNroCaja','Por favor seleccione el número de caja');
				} else if(error != ''){
					imprime_error(error,'No se puede repetir la caja seleccionada');
				} else if(error2 != ''){
					imprime_error(error2,'No se puede repetir la posición seleccionada');
				} else if($('#txtValor1').val() == '' && $('#txtValor2').val() == ''){
					imprime_error('btnAlmacen','Por favor seleccione la posición del cuarto de curación');
				} else {
					if($('#slcTestigos').val() == 'manual'){
						total = $('#txtTestigos').val();
					} else {
						total = $('#slcTestigos').val();
					}
					if($('#slcEdad').val() == 'manual'){
						edad = $('#txtEdad').val();
					} else {
						edad = $('#slcEdad').val();
					}
					for(var i=1; i<=total; i++){
						cadena = '<tr id="TEST-' + i + '">';
						cadena = cadena + '<td width="40"><div align="center">' + cont + '</div></td>';
						cadena = cadena + '<td width="150"><div align="center"><input type="text" id="txtCodigo'+ cont + '" class="textfields_tabla textfields_tabla_size2" value="' + $('#txtGuiaCamion').val() + '-' + cont + '" /></div></td>';
						cadena = cadena + '<td width="100"><div align="center">' + $('#txtFecha').val() + ' ' + $('#txtHora').val() + '</div></td>';						
						cadena = cadena + '<td width="80"><div align="center"><input type="text" id="txtEdad'+ cont + '" class="textfields_tabla textfields_tabla_size1" maxlength="2" value="' + edad + '" onkeypress="return soloNumeros(event);" readonly="true" /></div></td>';
						cadena = cadena + '<td width="90"><div align="center"><input type="text" id="txtPeso'+ cont + '" class="textfields_tabla textfields_tabla_size1" onkeypress="return soloNumeros(event);" readonly="true" /></div></td>';
						cadena = cadena + '<td width="90"><div align="center"><input type="text" id="txtDiametro'+ cont + '" class="textfields_tabla textfields_tabla_size1" onkeypress="return soloNumeros(event);" value="' + $('#txtDiametroGeneral').val() + '" readonly="true" /></div></td>';
						cadena = cadena + '<td width="60"><div align="center"><img id="F' + (cont-1) + '" src="images/transparentdot.gif" class="boton_codigo_barras spritefull bcb_false" title="Asignar código" /></div></td>';
						cadena = cadena + '<td width="110"><div align="center"></div></td>';
						cadena = cadena + '<td width="80"><div align="center"><input type="text" id="txtAlmacen'+ cont + '" class="textfields_tabla textfields_tabla_size1" readonly="true" value="' + $('#txtValor1').val() + $('#txtValor2').val() + '" /></div></td>';
						cadena = cadena + '<td width="80"><div align="center"><input type="text" id="txtNroCaja'+ cont + '" class="textfields_tabla textfields_tabla_size1" readonly="true" value="' + $('#slcNroCaja').val() + '" /></div></td>';
						/*cadena = cadena + '<td width="40"><div align="center"><img src="images/transparentdot.gif" class="borrar_fila spritefull borrar_fila_bg" title="Borrar" /></div></td>';*/
						cadena = cadena + '</tr>';
						$("#tabla_testigos").append(cadena);
						cont++;
					}
					$('#txtValor1').val('');
					$('#txtValor2').val('');
					$('#almacen_sel').html('Seleccione la posición');
				}
			});//btnCrear
			$('#btnBorrar').live('click',function(){
				if(document.getElementById('tabla_testigos').rows.length > 0){
					jConfirm("¿Desea borrar todos los registros?", "Confirmación", function(r) {
						if(r) {
							borrarTabla();
						}
					});
				}
			});//btnBorrar
			$('.borrar_fila').live('click',function(){
				id = $(this).parents("tr").find("td").find("div").eq(0).html();
				$(this).closest("tr").fadeOut("fast", function(){
					$(this).closest("tr").remove();
				});
				for(var i=id; i<document.getElementById('tabla_testigos').rows.length; i++){
					var edad = "#txtEdad" + (parseFloat(i)+1);
					var peso = "#txtPeso" + (parseFloat(i)+1);
					var diametro = "#txtDiametro" + (parseFloat(i)+1);
					var posicion = "#txtAlmacen" + (parseFloat(i)+1);
					var caja = "#txtNroCaja" + (parseFloat(i)+1);
					document.getElementById('tabla_testigos').rows[i].cells[0].innerHTML = '<div align="center">' + i + '</div>';
					document.getElementById('tabla_testigos').rows[i].cells[1].innerHTML = '<div align="center"><input type="text" id="txtCodigo'+ i + '" class="textfields_tabla textfields_tabla_size2" value="' + $('#txtGuiaCamion').val() + '-' + i + '" /></div></td>';
					document.getElementById('tabla_testigos').rows[i].cells[3].innerHTML = '<div align="center"><input type="text" id="txtEdad'+ i + '" class="textfields_tabla textfields_tabla_size1" maxlength="2" onkeypress="return soloNumeros(event);" value="' + $(edad).val() + '" /></div></td>';
					document.getElementById('tabla_testigos').rows[i].cells[4].innerHTML = '<div align="center"><input type="text" id="txtPeso'+ i + '" class="textfields_tabla textfields_tabla_size1" onkeypress="return soloNumeros(event);" value="' + $(peso).val() + '" /></div>';
					document.getElementById('tabla_testigos').rows[i].cells[5].innerHTML = '<div align="center"><input type="text" id="txtDiametro'+ i + '" class="textfields_tabla textfields_tabla_size1" onkeypress="return soloNumeros(event);" value="' + $(diametro).val() + '" /></div>';
					document.getElementById('tabla_testigos').rows[i].cells[8].innerHTML = '<div align="center"><input type="text" id="txtAlmacen'+ i + '" class="textfields_tabla textfields_tabla_size1" value="' + $(posicion).val() + '" /></div>';
					document.getElementById('tabla_testigos').rows[i].cells[9].innerHTML = '<div align="center"><input type="text" id="txtNroCaja'+ i + '" class="textfields_tabla textfields_tabla_size1" readonly="true" /></div>';
					if($.trim(document.getElementById('tabla_testigos').rows[i].cells[7].innerHTML.replace(/(<([^>]+)>)/g,'')) == ''){
						document.getElementById('tabla_testigos').rows[i].cells[6].innerHTML = '<div align="center"><img id="F' + (i-1) + '" src="images/transparentdot.gif" class="boton_codigo_barras spritefull bcb_false" /></div>';//corrobora si es que no tiene código de barras
					} else {//si ya tiene código de barras pone la imagen correspondiente
						document.getElementById('tabla_testigos').rows[i].cells[6].innerHTML = '<div align="center"><img id="F' + (i-1) + '" src="images/transparentdot.gif" class="boton_codigo_barras spritefull bcb_true" title="Editar código" /></div>';					
					}
				}
			});//Borrar una fila
			$('.boton_codigo_barras').live('click',function(){
				var id = $(this).attr('id');
				id = id.substring(1);
				$('#txtId').val(id);
				$('#popup_codigo_barras').bPopup({
					fadeSpeed: 'fast', //can be a string ('slow'/'fast') or int
					followSpeed: 1500, //can be a string ('slow'/'fast') or int
					modalColor: '#333'
				});
				$('#txtCodigoBarras').focus();
			});//popup código de barras
			
			$("#slcTestigos").change(function() {
				testigos = $("#slcTestigos").val();
				if(testigos=='manual'){
					$("#txtTestigos").show(200);
					$("#txtTestigos").focus();
				} else {
					$("#txtTestigos").hide(200);
					$("#txtTestigos").val('');
				}
			});//funcion selectbox
			
			function validar(campos,p){
				size = campos.length;
				for(i=0;i<=size-1;i++){
					if(p=='nulos'){//valida nulos
						if($("#"+campos[i]).val()==''||$("#"+campos[i]).val()=='NN'){
							mensaje = campos[i];
							break;
						}else{
							mensaje = "ok";
						}
					} else if(p=='numericos'){//valida numericos
						if(isNumber($("#"+campos[i]).val())==false){
							mensaje = campos[i];
							break;
						}else{
							mensaje = "ok";
						}
					}
				}//for
				return mensaje;
			}//funcion validar
			
			function validarTestigos(){
				if(document.getElementById('tabla_testigos').rows.length == 0){
					return "";
				} else {
					return "ok";
				}
			}
			$('#form1').submit(function() {
				restart_notifications();
				if($("#txtNombreEmpresa").val() == ''){
					imprime_error('txtNombreEmpresa','Por favor ingrese la empresa');
				} else if($("#txtOrdenServicio").val() == ''){
					imprime_error('txtOrdenServicio','Por favor ingrese la orden de servicio');
				} else if($("#slcObra").val() == ''){
					imprime_error('slcObra','Por favor seleccione la obra');
				} else if($("#slcAcuerdo").val() == ''){
					imprime_error('slcAcuerdo','Por favor seleccione el acuerdo comercial');
				} else if($("#txtGuiaCamion").val() == ''){
					imprime_error('txtGuiaCamion','Por favor ingrese la guía de camión');
				} else if($("#txtResistencia").val() == ''){
					imprime_error('txtResistencia','Por favor ingrese la resistencia');
				} else if($('#txtFecha').val() == ''){
					imprime_error('txtFecha','Por favor ingrese la fecha de moldeo');
				} else if($('#txtHora').val() == ''){
					imprime_error('txtHora','Por favor ingrese la hora de moldeo');
				} else if($('#txtFecha2').val() == ''){
					imprime_error('txtFecha2','Por favor ingrese la fecha de recojo');
				} else if($('#txtHora2').val() == ''){
					imprime_error('txtHora2','Por favor ingrese la hora de recojo');
				} else if(($("#slcEdad").val()=='NN')||(($("#slcEdad").val()=='manual')&&($("#txtEdad").val()==''))){
					imprime_error('slcEdad','Por favor seleccione la edad de ensayo');
				} else if(($("#slcTestigos").val()=='NN')||(($("#slcTestigos").val()=='manual')&&($("#txtTestigos").val()==''))){
					imprime_error('slcTestigos','Por favor seleccione el número de testigos');
				} else if($("#slcNroCaja").val()==''){
					imprime_error('slcNroCaja','Por favor seleccione el número de caja');
				} else if(error != ''){
					imprime_error(error,'No se puede repetir la caja seleccionada');
				} else if(error2 != ''){
					imprime_error(error2,'No se puede repetir la posición seleccionada');
				} else if($('#txtValor1').val() == '' && $('#txtValor2').val() == ''){
					imprime_error('btnAlmacen','Por favor seleccione la posición del cuarto de curación');
				} else {
					if($('#slcTestigos').val() == 'manual'){
						total = $('#txtTestigos').val();
					} else {
						total = $('#slcTestigos').val();
					}
					if($('#slcEdad').val() == 'manual'){
						edad = $('#txtEdad').val();
					} else {
						edad = $('#slcEdad').val();
					}
					for(var i=1; i<=total; i++){
						cadena = '<tr id="TEST-' + i + '">';
						cadena = cadena + '<td width="40"><div align="center">' + cont + '</div></td>';
						cadena = cadena + '<td width="150"><div align="center"><input type="text" id="txtCodigo'+ cont + '" class="textfields_tabla textfields_tabla_size2" value="' + $('#txtGuiaCamion').val() + '-' + cont + '" /></div></td>';
						cadena = cadena + '<td width="100"><div align="center">' + $('#txtFecha').val() + ' ' + $('#txtHora').val() + '</div></td>';						
						cadena = cadena + '<td width="80"><div align="center"><input type="text" id="txtEdad'+ cont + '" class="textfields_tabla textfields_tabla_size1" maxlength="2" value="' + edad + '" onkeypress="return soloNumeros(event);" readonly="true" /></div></td>';
						cadena = cadena + '<td width="90"><div align="center"><input type="text" id="txtPeso'+ cont + '" class="textfields_tabla textfields_tabla_size1" onkeypress="return soloNumeros(event);" readonly="true" /></div></td>';
						cadena = cadena + '<td width="90"><div align="center"><input type="text" id="txtDiametro'+ cont + '" class="textfields_tabla textfields_tabla_size1" onkeypress="return soloNumeros(event);" value="' + $('#txtDiametroGeneral').val() + '" readonly="true" /></div></td>';
						cadena = cadena + '<td width="60"><div align="center"><img id="F' + (cont-1) + '" src="images/transparentdot.gif" class="boton_codigo_barras spritefull bcb_false" title="Asignar código" /></div></td>';
						cadena = cadena + '<td width="110"><div align="center"></div></td>';
						cadena = cadena + '<td width="80"><div align="center"><input type="text" id="txtAlmacen'+ cont + '" class="textfields_tabla textfields_tabla_size1" readonly="true" value="' + $('#txtValor1').val() + $('#txtValor2').val() + '" /></div></td>';
						cadena = cadena + '<td width="80"><div align="center"><input type="text" id="txtNroCaja'+ cont + '" class="textfields_tabla textfields_tabla_size1" readonly="true" value="' + $('#slcNroCaja').val() + '" /></div></td>';
						/*cadena = cadena + '<td width="40"><div align="center"><img src="images/transparentdot.gif" class="borrar_fila spritefull borrar_fila_bg" title="Borrar" /></div></td>';*/
						cadena = cadena + '</tr>';
						$("#tabla_testigos").append(cadena);
						cont++;
					}
					$('#txtValor1').val('');
					$('#txtValor2').val('');
					$('#almacen_sel').html('Seleccione la posición');
				}
				return false;
			});
			
			$( "#tabs" ).tabs({ fx: { opacity: 'toggle', duration: 'fast' }, selected: 0 });

			$('#btnGuiaCamion').live('click', function(){
				restart_notifications();
				if($('#txtOrdenServicio').val() != ''){
					var guiaCamion = 'FP-' + $('#txtOrdenServicio').val();
					$('#txtGuiaCamion').val(guiaCamion);
				} else {
					imprime_error('','Debe ingresar la orden de servicio');
				}
			});
});

//datepicker
$(function() {
	$("#txtFecha").datepicker({ dateFormat: 'dd/mm/yy', changeMonth:true, changeYear: true, yearRange: '2011:new Date().getFullYear().toString()' });
	$("#txtFecha2").datepicker({ dateFormat: 'dd/mm/yy', changeMonth:true, changeYear: true, yearRange: '2011:new Date().getFullYear().toString()' });
	$('#txtHora').timepicker({
		currentText: 'Actual',
   		closeText: 'Listo',
		timeOnlyTitle: 'Escoja la hora',
		timeText: 'Tiempo',
		hourText: 'Hora',
		minuteText: 'Minuto'
	});
	$('#txtHora2').timepicker({
		currentText: 'Actual',
   		closeText: 'Listo',
		timeOnlyTitle: 'Escoja la hora',
		timeText: 'Tiempo',
		hourText: 'Hora',
		minuteText: 'Minuto'
	});
	$('#txtHora3').timepicker({
		currentText: 'Actual',
   		closeText: 'Listo',
		timeOnlyTitle: 'Escoja la hora',
		timeText: 'Tiempo',
		hourText: 'Hora',
		minuteText: 'Minuto'
	});
});

//permite teclear solo numeros
function soloNumeros(e){
	var tecla;		
	if(document.all){
		tecla = e.keyCode;
	} else {
		tecla = e.which;
	}
	if(tecla < 10){
		return true;
	}
	if(tecla == 13){
		return true;
	}
	if(tecla != 46 && (tecla < 48 || tecla > 59)){
		return false;
	} else {
		return true;
	}
}

function convertirEntero(){
	var textfield = $('#txtTextfield').val();
	var numero = parseFloat($('#txtCodigoBarras2').val());
	$(textfield).val(numero);
	$('#popup_codigo_barras2').bPopup().close();
	$('#txtCodigoBarras2').val('');
}

function asignarCodigo(){
	document.getElementById('tabla_testigos').rows[$('#txtId').val()].cells[7].innerHTML = '<div align="center">' + $('#txtCodigoBarras').val() + '</div>';
	document.getElementById('tabla_testigos').rows[$('#txtId').val()].cells[6].innerHTML = '<div align="center"><img id="F' + $('#txtId').val() + '" src="images/transparentdot.gif" class="boton_codigo_barras spritefull bcb_true" title="Editar código" /></div>';
	$('#popup_codigo_barras').bPopup().close();
	$('#txtCodigoBarras').val('');
}

function cargarDiametro(){
	$.ajax({
		type: 'POST',
		url: 'controlador/cOrden.php',
		data: 'var=diametro',
		success: function(data) {
			//alert(data);
			$('#txtDiametroGeneral').val(data);
		}
	});
}

//borra la tabla de testigos
function borrarTabla(){
	try{
		var table = document.getElementById('tabla_testigos');
		var rowCount = table.rows.length;		
		for(var i=0; i<rowCount; i++){
			table.deleteRow(i);
			rowCount--;
			i--;
		}
	} catch(e) {
		alert(e);
	}
}
