<?php
    session_start();
        if(isset($_SESSION['usuario']) == null) {
            header('location: inicio.php');
        }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/inicio.css">
</head>
<body>
	<div id="contenedor">

		<?php
			require("body/cabecera.php");
			require("body/navegador.php");
			require("body/sidebarIzq.php");
			require("body/contenido.php");
			require("body/sidebarDer.php");
		?>

	</div>
</body>
</html>