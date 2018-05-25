<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="css/inicio.css">
</head>
<body>

	<div id="contenedor">

		<div id="cabecera">

			<div id="logo">
				<h1>NATUINS</h1>
			</div>

			<div id="interUsuario">
					<ul>
						<li><a href="index2.php" name="index2">Inicio</a></li>
						<li><a href="../controllers/logout.php" name="salir">Salir</a></li>
					</ul>
			</div>

		</div>

		<?php
			require("body/navegador.php");
	        require("body/sidebarIzq.php");
	    ?>

	    <div id="contenido">

		    <div id="tuins">
		<?php
		    	require_once ("../controllers/Controller.php");
		        echo Controller::viewYourTuins();
		?>
			</div>

		</div>

		<?php

			require("body/sidebarDer.php");

		?>

	</div>


</body>
</html>