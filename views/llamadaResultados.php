<!DOCTYPE html>
<html>
<head>
	<title>Buscador</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/inicio.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="../added/js/jquery-3.3.1.min.js"></script>
	<script src="../added/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../added/js/notificaciones.js"></script>
</head>

<body>

	<div id="contenedor">

			<?php include ('body/cabecera.php'); ?>
			
			<?php include ('body/navegador.php'); ?>


			<?php include ('body/sidebarIzq.php'); ?>


			<div id="contenido">

				<?php require_once("../controllers/resultados.php"); ?>

			</div>

		<?php include('body/sidebarDer.php'); ?>

	</div>

</body>
</html>
