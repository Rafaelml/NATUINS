<!DOCTYPE html>
<html>
	<head>
		<title>Registro</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/inicio.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="../added/js/jquery-3.3.1.min.js"></script>
		<script src="../added/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../added/js/validaciones.js"></script>
	</head>
	<body>

		<div id="contenedor">

		<?php include ('body/cabecera.php');?>
		<?php include ('body/sidebarIzq.php');?>

		<div id="contenido">


		<form action="../controllers/controllerRegistro.php" method="post">
			<fieldset>
				<legend>Registro</legend>
                <div id="name">
                    Nombre:
                    <input type="text" name="name"  />
                </div>
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
                    <img id="passOK" src="img/ok.png" />
                    <img id="passMal" src="img/nook.png" />
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
                <div id="privacidad">
                    Privada:
                    <input type="radio" name="privacidad" id="privacidad" value="privada">
                    Pública:
                    <input type="radio" name="privacidad" id="publica" value="publica">
                </div>

				<input type="submit" name="registro" value="Registro" />
				<button type="reset">Borrar</button>
			</fieldset>
		</form>

		</div>

		<?php include('body/sidebarDer.php'); ?>

	</div>
	</body>
</html>