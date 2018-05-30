<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/inicio.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

	<title>Buscador</title>


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
				<button id="submit" disabled>Buscar</button>

			</form>

		</div>

		<?php include('body/sidebarDer.html'); ?>

	</div>
</body>
</html>