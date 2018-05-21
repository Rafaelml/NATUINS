$(document).ready(function() {

	$("#passOK").hide();
	$("#repassOK").hide();

	$("#nick").change(function(){

		if (nick($("#nick").val() ) ) {

			$("#correoMal").hide();
			$("#correoOK").show();

		} else {

			$("#correoMal").show();
			$("#correoOK").hide();

		}
	});

	
	$("#campoUser").change(function(){
		var url = "comprobarUsuario.php?user=" + $("#campoUser").val();
		$.get(url,usuarioExiste);
    });


	function nick(nick) {
		var arroba = correo.indexOf("@");
		correo = correo.substring(arroba,correo.length);
		var punto = correo.indexOf(".");
		correo = correo.substring(punto + 1,correo.length);

		return ( arroba > 0 && punto > 1 && correo.length > 0);
	}

	function usuarioExiste(data,status) {

		if (data == "existe") {
			$("#userMal").show();
			$("#userOK").hide();
			$("#campoUser").focus(); //Devuelvo el foco
			alert("El usuario ya existe, escoge otro");
		}
		else if (data == "disponible") {
			$("#userOK").show();
			$("#userMal").hide();
		}

	}


})