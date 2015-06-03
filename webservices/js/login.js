$(document).ready(function() {
	$('#txtUsuario').focus();
	$('#frmLogin').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize() + '&var=login',
			beforeSend: function(){
				$('#btnEntrar').attr("disabled", "disabled");
			},
			success: function(data) {
				//alert(data);
				if(data.replace(/^\s+|\s+$/g, '') == 'error1'){
					$('.login_form_error').html('Usuario o contraseña incorrecto(s)');
				} else {
					window.location.href='inicio.php';
				}
				$('#btnEntrar').removeAttr("disabled");
			}
		});
		return false;
	});
});
