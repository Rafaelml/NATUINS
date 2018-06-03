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
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/inicio.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="../added/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../added/js/notificaciones.js"></script>
	<script src="../added/js/bootstrap.min.js"></script>


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
