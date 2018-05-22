<?php

require_once("../models/UserNoR.php");

?>

<script type="text/javascript">

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
		UserNoR::checkNick()
    });

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

</script>