<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript">
		
		function usaCookie() {
			var usuario=getCookie("nick");
			if (usuario!=null && usuario!="") {
			 alert("Bienvenido de nuevo, " + usuario);
			}
			else {
			 usuario=prompt("Por favor, introduzca su nombre:","");
			 if (usuario!=null && usuario!="") {
			 setCookie("nick", usuario,365);
			 }
			}
		}

			function getCookie(nick) {
			 var cookies = document.cookie.split(";");
			 nick = nick + "=";
			 for (var i in cookies) {
			var c = cookies[i].trim(); // quita espacios al ppio y final
			if (c.indexOf(nick) == 0)
			return c.substring(nick.length, c.length); // el valor
			 }
			 return ""; // No había cookie con el nombre
		}

			function setCookie (nick, valor, dias) {
			var fechaExpiracion=new Date();
			fechaExpiracion.setDate(fechaExpiracion.getDate() + dias);
			document.cookie= nombre + "=" + valor + ((dias==null) ? "" : "; expires=" + fechaExpiracion.toUTCString());
		}
		
	</script>
</head>

<body onload="usaCookie()">

	<?php

    require_once ("controller/Controller.php");
    $nick = htmlspecialchars(trim(strip_tags($_REQUEST["nick"])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["pass"])));
    Controller::login($nick,$password,$cont);
    
	?>

</body>
</html>

