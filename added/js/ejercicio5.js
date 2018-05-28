$(document).ready(function() {
    var pass1 = $('[name=pass]');
    var pass2 = $('[name=repass]');
    pass2.change(function(){
        if(coincidePassword()){
            $("#passOK").show();
            $("#passMal").hide();
		}
		else{
            $("#passMal").show();
            $("#passOK").hide();
            $("#campoUser").focus(); //Devuelvo el foco
            alert("Las contraseñas no son iguales");
		}
    });
    function coincidePassword(){
        var valor1 = pass1.val();
        var valor2 = pass2.val();
        if(valor1.length!=0 && valor1==valor2){
            return true;
        }
        else {
            return false;
        }
    }

	$("#correoOK").hide();
	$("#userOK").hide();
	$("#passOK").hide();

	$("#campoEmail").change(function(){

		if (correoValido($("#campoEmail").val() ) ) {
            var url = "../controllers/comprobarMailUsuario.php?email=" + $("#campoEmail").val();
			var a =$.get(url,correoExiste)
		} else {

			$("#correoMal").show();
			$("#correoOK").hide();

		}
	});
	
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
	function correoExiste(data,status) {
        if(data == "existe"){
            $("#correoMal").show();
            $("#correoOK").hide();
            $("#campoEmail").focus(); //Devuelvo el foco//
            alert("El mail ya existe, escoge otro");
        }

        else{
            $("#correoOK").show();
            $("#correoMal").hide();
        }
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