$(document).ready(function() {
	if(gup('id') != '')
		cargarDatos();
	$('#form1').submit(function() {
		var id = "";
		if($('#txtClienteId').val() != ''){
			id = $('#txtClienteId').val()
		}
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize() + '&var=grabar&clienteId=' + id,
			beforeSend: function(){
				$('.msginfo').fadeOut(10);
				$(".msginfo").removeClass('colormsgerror colormsgok');
				$('#grabar').attr("disabled", "disabled");
				$('.msginfo').html('');
			},
			success: function(data) {
				//alert(data);
				if(data != ''){
					$(".msginfo").addClass('colormsgerror');
					$('.msginfo').html(data);
					$('.msginfo').fadeIn(500);
				} else {
					$(".msginfo").addClass('colormsgok');
					$(".msginfo").html('Los datos del cliente fueron grabados');
					$('.msginfo').fadeIn(500);
					if($('#txtClienteId').val() == ''){
						$('#txtRuc').val('');
						$('#txtRazonSocial').val('');
						$('#txtDireccion').val('');
						$('#txtTelefono').val('');
						$('#txtCelular').val('');
						$('#txtContacto').val('');
						$('#txtEmail').val('');
						$('#txtAdmContacto').val('');
						$('#txtAdmTelf').val('');
						$('#txtAdmEmail').val('');
						$('#txtAdmCargo').val('');
					}
				}
				$('#grabar').removeAttr("disabled");
			}
		});
		return false;
	});

	$('#volver').live("click", function(){
		location.href='listaClientes.php';
	});
});

function cargarDatos(){
	$.ajax({
		type: 'POST',
		url: 'controlador/cCliente.php',
		data: 'var=cargar&id=' + Base64.decode(gup('id')),
		success: function(data) {
			//alert(data);
			resultados = data.split("|");
			$('#txtRuc').val(resultados[0]);
			$('#txtRazonSocial').val(resultados[1]);
			$('#txtDireccion').val(resultados[2]);
			$('#txtTelefono').val(resultados[3]);
			$('#txtCelular').val(resultados[4]);
			$('#txtContacto').val(resultados[5]);
			$('#txtEmail').val(resultados[6]);
			$('#txtAdmContacto').val(resultados[7]);
			$('#txtAdmTelf').val(resultados[8]);
			$('#txtAdmEmail').val(resultados[9]);
			$('#txtAdmCargo').val(resultados[10]);
			$('#txtClienteId').val(resultados[11]);
			$('#lblClienteId').html(resultados[11]);
			$('.titulo_detalle').html(resultados[1]);
		}
	});
}

function gup(nombre){
	var regexS = "[\?&]"+nombre+"=([^&#]*)";
	var regex = new RegExp( regexS );
	var tmpURL = window.location.href;
	var results = regex.exec( tmpURL );
	if( results == null )
		return "";
	else
		return results[1];
}
