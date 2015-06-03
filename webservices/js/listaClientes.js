$(document).ready(function() {		
	listarClientes();	
    $('.button1').live("click", function(){
     	location.href='form_clientes.php';
 	});

   $('.editar').live("click", function(){
                var id = $(this).attr("id");
                $.ajax({
                    type: 'POST',
                    url: 'controlador/cCliente.php',
                    data: 'var=cargarDatos&id=' + id,
                    success: function(data) {
                       alert(data);
                        var cli = JSON.parse(data);  
			for(var i = 0; i < cli.length; i++ )  
			{
			$('#txtRuc').val(cli[i].Ruc);
			$('#txtRazonSocial').val(cli[i].Razonsocial);
			$('#txtDireccion').val(cli[i].Direccion);
			$('#txtTelefono').val(cli[i].Telefono);
			}
                    }
                });
            });


 $('.borrar').live("click", function(){
 	            var id = $(this).attr("id");
                jConfirm("¿Desea anular el cliente con RUC =>" + id + "?", "Confirmación", function(r) {
                    if(r) {                       
                        $.ajax({
                            type: 'POST',
                            url: 'controlador/cCliente.php',
                            data: 'var=borrar&id=' + id,
                            success: function(data) {
                                jAlert(data, 'Eliminación');
                                listarClientes();
                            }
                        });
                    }
                });
            });
});

function listarClientes(){
	$.ajax({
		type: 'POST', /* ACA DEFINES SI ENVIAS LOS DATOS COMO GET O POST */
		url: 'controlador/cCliente.php', /* ACA DEFINES LA RUTA DEL ARCHIVO CONTROLADOR */
		data: 'var=listar', /* ACA ENVIAS LAS VARIABLES AL ARCHIVO CONTROLADOR */
		beforeSend: function(){
			$('#tabla_clientes').html('');
		},
		success: function(data) { /* LA VARIABLE "data" ES LO QUE VA A RETORNAR EL ARCHIVO CONTROLADOR */
			//alert(data); /* ESTE ALERT ESTA COMENTADO, PERO YO LO DESCOMENTO PARA SABER SI EL CONTROLADOR NO RETORNA ERRORES */
			var tabla = "";
			/* ARMADO DE LA TABLA HTML CON SUS FILAS Y COLUMNAS AGREGANDO A LA VARIABLE "tabla" */
			tabla += "<thead>";
			tabla += "<tr>";
			tabla += "<th>RUC</th>";
			tabla += "<th>Razón Social</th>";
			tabla += "<th>Dirección</th>";
			tabla += "<th>Telefono</th>";
			tabla += "<th>Editar</th>";
			tabla += "<th>Delete</th>";
			tabla += "</tr>";
			tabla += "</thead>";

		    var cli = JSON.parse(data);  
			for(var i = 0; i < cli.length; i++ )  
			{
                tabla += "<tr>";
				tabla += "<td>" + cli[i].Ruc + "</td>";
				tabla += "<td align='center'>" + cli[i].Razonsocial + "</td>";
				tabla += "<td align='center'>" + cli[i].Direccion + "</td>";
				tabla += "<td align='center'>" + cli[i].Telefono + "</td>";
				tabla += "<td align='center'><a class='cursor editar' href='form_clientes.php?id=" + cli[i].Ruc + "'><img src='images/edit.png' title='editar'></a></td>";
                tabla += "<td align='center'><a id='" + cli[i].Ruc + "' class='cursor borrar'><img src='images/anular.gif' title='borrar'></a></td>";

				tabla += "</tr>";				
			}


			$('#tabla_clientes').append(tabla);
		}
	});
}

