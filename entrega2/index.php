<?php 
include_once "conexion.php";
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div id="contenedor">

		<div id="cabecera">
			<h1>NATUINS</h1>
			<a href="logout.php">Salir</a>
		</div>

		<div id="sidebar-left">
			<p>Tendencias:</p>
			<p>#MadridVSJuve</p>
			<p>#EsPenalti</p>
			<p>#CristianoTheBest</p>
		</div>

		<div id="contenido">
		<?php
				if($_SESSION['tipo'] == "usuario"){
				echo '<h1>Bienvenido a Natuins ' . $_SESSION['usuario'] . '</h1>';
				}
		?>

			<p>Escribe un tuin:</p>

			<div id="mensaje">
				<form action="procesarTuin.php" method="post">
					<textarea rows="10" cols="50" name="tuin"></textarea>
					<p><input type="submit" name="login" value="Enviar"></p>
				</form>
			</div>

			<div id="tuins">

			<?php

				$sql = "SELECT * FROM tuin";
				$rec = $mysqli->query($sql);
				$contador = $rec->num_rows;
				$row = $rec->fetch_array();


				//echo $row["tuin"];

				for($i = 0; $i < $contador; $i++){
					echo $row["tuin"];
					echo '<br>';
					$row = $rec->fetch_array();
				}
			?>
			</div>
		</div>

		<div id="sidebar-right">
			<p>Personas a las que seguir</p>
		</div>

	</div>
</body>
</html>