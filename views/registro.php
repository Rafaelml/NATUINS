<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/inicio.css">
		<title>Registro</title>
		<meta charset="utf-8">
        <script type="text/javascript" src="../added/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../added/js/ejercicio5.js"></script>
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
					<input type="text" name="nick" id="campoUser" />
					<img id="userOK" src="img/ok.png" />
					<img id="userMal" src="img/nook.png" />
				</div>

				<div id="contra">
					Contraseña:
					<input type="password" name="pass">
				</div>

				<div id="recontra">
					Repetir contraseña:
					<input type="password" name="repass" id="repass">
					<img id="repassOK" src="img/ok.png" />
					<img id="repassMal" src="img/nook.png" />
				</div>

				<div id="email">
					Email:
					<input type="text" name="email" id="campoEmail" />
					<img id="correoOK" src="img/ok.png" />
					<img id="correoMal" src="img/nook.png"/>
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

		<?php include ('body/sidebarDer.php'); ?>

	</div>
	</body>
</html>