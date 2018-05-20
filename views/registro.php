<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/inicio.css">
		<title>Registro</title>
		<meta charset="utf-8">
	</head>
	<body>

		<div id="contenedor">

		<?php include ('body/cabecera.php');?>
		<?php include ('body/sidebarIzq.php');?>

		<div id="contenido">


		<form action="../controllers/controllerRegistro.php" method="post">
			<fieldset>
				<legend>Registro</legend>
				<div id="nick">
					Nick:
					<input type="text" name="nick">
				</div>
				<div id="contra">
					Contraseña:
					<input type="password" name="pass">
				</div>
				<div id="recontra">
					Repetir contraseña:
					<input type="password" name="repass">
				</div>
				<div id="email">
					Email:
					<input type="text" name="email">
				</div>
				<div id="tel">
					Teléfono:
					<input type="text" name="tel">
				</div>
				<input type="submit" name="registro" value="Registro" />
				<button type="reset">Borrar</button>
			</fieldset>
		</form>

		</div>

		<?php include ('body/sidebarDer.php');?>

	</div>
	</body>
</html>