<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/inicio.css">
		<title>Inicio de sesión</title>
		<meta charset="utf-8">
	</head>
	<body>


		<div id="contenedor">

		<?php include ('body/cabecera.php');?>
		<?php include ('body/sidebarIzq.php');?>

		<div id="contenido">

		<form action="../controllers/controllerLogin.php" method="post">
			<fieldset>
			<legend>Inicio de sesión</legend>
			Nick:
			<input type="text" name="nick" />
			</br>
			Contraseña:
			<input type="password" name="pass" />
			</br>
			<input type="submit" name="login" value="Entrar">
			</fieldset>
		</form>

		</div>

		<?php include('body/sidebarDer.html');?>

	</div>
	</body>
</html>