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

	<script type="text/javascript">

		function activar_boton() {
			var campo = $('#texto_a_rellenar').val();
			if((campo!=null) && (campo!=''))

				$('#submit').attr('disabled', false);
			else

                $('#submit').attr('disabled', true);
		}

	</script>

</head>
<body>

	<div id="contenedor">

			<?php include ('body/cabecera.php'); ?>
			
			<?php include ('body/navegador.php'); ?>


		<?php include ('body/sidebarIzq.php'); ?>


		<div id="contenido">

			<form action="llamadaResultados.php" method="GET">

				<h3>Buscar </h3>
				<input onkeyup="activar_boton()" id="texto_a_rellenar" type="text" name="caja">
				<button id="submit" class="btn btn-primary" disabled>Buscar</button>

			</form>

		</div>

		<?php include('body/sidebarDer.php'); ?>

	</div>
</body>
</html>