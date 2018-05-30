<!DOCTYPE html>
<html>
	<head>
		<title>Inicio de sesión</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/inicio.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="../added/js/jquery-3.3.1.min.js"></script>
		<script src="../added/js/bootstrap.min.js"></script>
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

		<?php include('body/sidebarDer.php');?>

	</div>
	</body>
</html>