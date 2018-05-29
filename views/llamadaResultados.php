<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/inicio.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

	<title>Buscador</title>
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
