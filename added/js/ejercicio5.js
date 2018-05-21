$(document).ready(function() {

	$("#correoOK").hide();
	$("#userOK").hide();
	$("#repassOK").hide();

	$("#campoEmail").change(function(){

		if (correoValido($("#campoEmail").val() ) ) {

			$("#correoMal").hide();
			$("#correoOK").show();

		} else {

			$("#correoMal").show();
			$("#correoOK").hide();

		}
	});

	/*$("#repass").change(function(){

		if (repassIgual($("#repass").val() ) ) {

			$("#repassMal").hide();
			$("#repassOK").show();

		} else {

			$("#repassMal").show();
			$("#repassOK").hide();

		}
	});*/
	
	$("#campoUser").change(function(){
		var url = "../controllers/comprobarNickUsuario.php?user=" + $("#campoUser").val();
		$.get(url,usuarioExiste);
    });


	function correoValido(correo) {
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

	function repassIgual(password){

		
	}
})