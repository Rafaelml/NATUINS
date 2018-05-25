$(document).ready(function() {

	$("#correoOK").hide();
	$("#userOK").hide();
	$("#repassOK").hide();

	/*$("#campoEmail").change(function(){

		if (correoValido($("#campoEmail").val() ) ) {

			$("#correoMal").hide();
			$("#correoOK").show();

		} else {

			$("#correoMal").show();
			$("#correoOK").hide();

		}
	});*/
	
	$("#campoUser").change(function(){
		var url = "../controllers/comprobarNickUsuario.php?user=" + $("#campoUser").val();
		$.get(url,usuarioExiste);
    });

    $("#campoEmail").change(function(){
		var url = "../controllers/comprobarMailUsuario.php?email=" + $("#campoEmail").val();
		$.checkEmail(url,correoValido);
    });


	function correoValido(data,correo) {

		var arroba = correo.indexOf("@");
		correo = correo.substring(arroba,correo.length);
		var punto = correo.indexOf(".");
		correo = correo.substring(punto + 1,correo.length);

		if(data == "existe" && correo){
			$("#correoMal").show();
			$("#correoOK").hide();
			alert("El mail ya existe, escoge otro");
		}

		else if (data == "disponible"){
			$("#correoMal").hide();
			$("#correoOK").show();
		}

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