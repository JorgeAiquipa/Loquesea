$(document).ready(function() {
	cargarClientes();

	if(gup('id') != '')
		cargarDatos();

	$('#form1').submit(function() {
		var id = "";
		if($('#txtObraId').val() != ''){
			id = $('#txtObraId').val()
		}

		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize() + '&var=grabar&txtObraId=' + id,
			beforeSend: function(){
				$('.msginfo').fadeOut(10);
				$(".msginfo").removeClass('colormsgerror colormsgok');
				$('#grabar').attr("disabled", "disabled");
				$('.msginfo').html('');
			},
			success: function(data) {
				//alert(data);
				var dataOK ="Error";
				if (data.substr(0,1) == "{"){
				     var resul = JSON.parse(data); 
				     //alert("lll "+toType(resul));                        
                     if(resul.Nombreobra != "")
                        dataOK = "Ok";
                     }
                  else
                  {
                    dataOk = data;
                  }

				if(dataOK != 'Ok'){
					$(".msginfo").addClass('colormsgerror');
					$('.msginfo').html(dataOk);
					$('.msginfo').fadeIn(500);
				} else {
					$(".msginfo").addClass('colormsgok');
					$(".msginfo").html('Los datos de la obra fueron grabados');
					$('.msginfo').fadeIn(500);
					if($('#txtObraId').val() == ''){
						$('#txtDescripcion').val('');
						$('#txtDireccion').val('');
						$('#slcCliente').val('');				
					}
				}
				$('#grabar').removeAttr("disabled");
			}
		});
		return false;
	});

	$('#volver').live("click", function(){
		location.href='listaObras.php';
	});
});

function cargarDatos(){
	$.ajax({
		type: 'POST',
		url: 'controlador/cObra.php',
		data: 'var=cargarDatos&id=' + gup('id'),
		success: function(data) {
			//alert(data);
			var obr = data.split(":{");
		    var obr1 = obr[1].split("}");
		    var datafinal= "[{"+obr1[0]+"}]";
            var obra = JSON.parse(datafinal);  
            //console.log(obra[0]);
            //alert(obra[0].Nombreobra);
            $('#txtObraId').val(obra[0].Id);				
			$('#txtDescripcion').val(obra[0].Nombreobra);
			$('#txtDireccion').val(obra[0].Direccionobra);
			$('#slcCliente').val(obra[0].Ruccliente);
			$('.titulo_detalle').html(obra[0].Nombreobra);
		}
	});
}

function cargarClientes(){
	$.ajax({
		type: 'POST',
		url: 'controlador/cCliente.php',
		data: 'var=listar',
		success: function(data) {
			//alert(data);
            var cli = JSON.parse(data);
            $('#slcCliente').append($("<option></option>").attr("value","").text("Seleccione el Cliente"));				  
			for(var i = 0; i < cli.length; i++ )  
			{
                $('#slcCliente').append($("<option></option>").attr("value",cli[i].Ruc).text(cli[i].Razonsocial));				
			}


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
