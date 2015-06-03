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
			data: $(this).serialize() + '&var=grabar&txtclienteId=' + id,
			beforeSend: function(){
				$('.msginfo').fadeOut(10);
				$(".msginfo").removeClass('colormsgerror colormsgok');
				$('#grabar').attr("disabled", "disabled");
				$('.msginfo').html('');
			},
			success: function(data) {
				//alert(data);
				if(data == 'Cliente ya esta creado'){
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
		data: 'var=cargarDatos&id=' + gup('id'),
		success: function(data) {
			//alert(data);
            var clie = JSON.parse(data);  
            $('#txtClienteId').val(clie.Ruc);				
			$('#txtRuc').val(clie.Ruc);
			$('#txtRazonSocial').val(clie.Razonsocial);
			$('#txtDireccion').val(clie.Direccion);
			$('#txtTelefono').val(clie.Telefono);
			$('.titulo_detalle').html(clie.Razonsocial);
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
