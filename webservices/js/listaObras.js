	$(document).ready(function() {	
		listarObras();

		$('.button1').live("click", function(){
			location.href='form_obras.php';
		});

        $('.borrar').live("click", function(){
 	        var id = $(this).attr("id");
            jConfirm("¿Desea anular el obra " + id + "?", "Confirmación", function(r) {
                if(r) {                       
                    $.ajax({
                        type: 'POST',
                        url: 'controlador/cObra.php',
                        data: 'var=borrar&id=' + id,
                        success: function(data) {
                            jAlert(data, 'Eliminación');
                            listarObras();
                        }
                    });
                }
            });
        });
	});


function listarObras(){
	$.ajax({
		type: 'POST', /* ACA DEFINES SI ENVIAS LOS DATOS COMO GET O POST */
		url: 'controlador/cObra.php', /* ACA DEFINES LA RUTA DEL ARCHIVO CONTROLADOR */
		data: 'var=listar', /* ACA ENVIAS LAS VARIABLES AL ARCHIVO CONTROLADOR */
		beforeSend: function(){
			$('#tabla_obras').html('');
		},
		success: function(data) { /* LA VARIABLE "data" ES LO QUE VA A RETORNAR EL ARCHIVO CONTROLADOR */
			//alert(data); /* ESTE ALERT ESTA COMENTADO, PERO YO LO DESCOMENTO PARA SABER SI EL CONTROLADOR NO RETORNA ERRORES */
			var tabla = "";
			/* ARMADO DE LA TABLA HTML CON SUS FILAS Y COLUMNAS AGREGANDO A LA VARIABLE "tabla" */
			tabla += "<thead>";
			tabla += "<tr>";
			tabla += "<th>Codigo</th>";
			tabla += "<th>Nombre Obra</th>";
			tabla += "<th>Direccion </th>";
			tabla += "<th>Cliente</th>";
			tabla += "<th>Editar</th>";
			tabla += "<th>Eliminar</th>";
			tabla += "</tr>";
			tabla += "</thead>";

		    //var obr = JSON.parse(data);  
		    var obr = data.split("[");
		    var obr1 = obr[1].split("]");
		    //console.log(obr1[0]);
		    var datafinal= "["+obr1[0]+"]";
            var obra = JSON.parse(datafinal);  
            //console.log(obra);		    
			for(var i = 0; i < obra.length; i++ ){
                tabla += "<tr>";
               	tabla += "<td>" + obra[i].idobra + "</td>";
				tabla += "<td align='center'>" + obra[i].nombreobra + "</td>";
				tabla += "<td align='center'>" + obra[i].direccionobra + "</td>";
				tabla += "<td align='center'>" + obra[i].nombrecliente + "</td>";
				tabla += "<td align='center'><a class='cursor editar' href='form_obras.php?id=" + obra[i].idobra + "'><img src='images/edit.png' title='editar'></a></td>";
                tabla += "<td align='center'><a id='" + obra[i].idobra + "' class='cursor borrar'><img src='images/anular.gif' title='borrar'></a></td>";
				tabla += "</tr>";				
			}

			$('#tabla_obras').append(tabla);
		}
	});
}
