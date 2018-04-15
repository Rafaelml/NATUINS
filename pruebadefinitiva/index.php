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
			<div id="logo">
				<h1>NATUINS</h1>
			</div>
			<div id="navegador">
				<ul>
					<li><a href="noimplem.html">Notificaciones</a></li>
					<li><a href="noimplem.html">Destacados</a></li>
					<li><a href="noimplem.html">Buscador</a></li>
					<li><a href="noimplem.html">Mensajes</a></li>
					<li><a id="salir" href="logout.php" name="salir">Salir</a></li>
				</ul>
			</div>
		</div>

		<div id="sidebar-left">
			<a href="noimplem.html">Tendencias</a>
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
					<textarea rows="5" cols="68" name="tuin"></textarea>
					<p><input type="submit" name="login" value="Enviar"></p>
				</form>
			</div>

			<div id="tuins">
			<?php
                $sql = "SELECT * FROM tuin";
                $rec = $mysqli->query($sql);
                $contador = $rec->num_rows;
                for($i = $contador; $i >= 1 ; $i--){
                    $sql = "SELECT * FROM tuin WHERE idTuin =".$i;
                    $rec = $mysqli->query($sql);
                    $row = $rec->fetch_array();
                    $id = $row["idUser"];
                    $sql2 = "SELECT * FROM userr WHERE idUser =" .$id;
                    $rec2 = $mysqli->query($sql2);
                    $row2 = $rec2->fetch_array();
                    echo '<div id="tuin">';
                    echo '<p>' . $row2["nick"] . '</p>';
                    echo $row["tuin"];
                    echo '</div>';
				}
			?>
			</div>
		</div>

		<div id="sidebar-right">
			<a href="noimplem.html">Personas a las que seguir</a>
		</div>

	</div>
</body>
</html>