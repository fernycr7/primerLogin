function login(){
	if ($('#loginUsuario').val()===""|| $('#loginContrasena').val()==="") {
		$('#warning-div').css({
			'display': 'block'
		});	
		$('#warning-div').addClass('row bg-danger justify-content-center text-center');
		$('#warning-text').addClass('text-white');
		document.getElementById('warning-text').innerHTML='Hay Campos Vacios';	
	}else{

		var usuario= $('#loginUsuario').val();
		var password =$('#loginContrasena').val();	
		
			ajaxLogin(usuario,password)	;
		}
}

function ajaxLogin(usuario,password){
$.ajax({
	url: 'php/consultas.php',
	type: 'POST',
	/*En el data se define los datos que se mandaran y como, en este ejemplo se envian los datos como tipo JSON*/
	data: {Usuario: usuario, Password: password},
	/*El beforSend se ejecuta hasta que se reciba una respuesta del servidor, mientras tanto mostrara el mensaje "Cargando..."*/
	beforeSend: function(){
		$('#warning-div').css({
			'display': 'block'
		});	
		$('#warning-div').addClass('row bg-warning justify-content-center text-center');
		$('#warning-text').addClass('text-white');
		document.getElementById('warning-text').innerHTML='Cargando...';	
	}
})
/*Si la consulta se realizo con exito*/
.done(function(data) {
	console.log("success");
	if (data.Rol==="Usuario") {
		location.href='php/user/index.php';
	} else {
		location.href='php/admin/index.php';
	}
})
/*Si la consulta Fallo*/
.fail(function() {
	$('#warning-div').css({
			'display': 'block'
		});	
		$('#warning-div').addClass('row bg-danger justify-content-center text-center');
		$('#warning-text').addClass('text-white');
		document.getElementById('warning-text').innerHTML='No se pudo Iniciar la Sesión';	
})
}
 		



