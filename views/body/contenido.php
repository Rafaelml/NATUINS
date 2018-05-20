<div id="contenido">
<?php
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)){
	    if(isset($_SESSION['usuario']) != null) {
	            echo '<h1>Bienvenido a Natuins ' . $_SESSION['usuario'] . '</h1>';
	    }
	?>

		<p>Escribe un tuin:</p>

		<div id="mensaje">
			<form action="../controllers/procesarTuin.php" method="post">
				<textarea rows="5" cols="68" name="tuin"></textarea>
				<p><input type="submit" name="login" value="Enviar"></p>
			</form>
		</div>

		<div id="tuins">
	<?php
	    	require_once ("../controllers/Controller.php");
	        echo Controller::viewTuins();
	?>
		</div>
<?php
	}else{
?>
		<div id="tuins">
<?php
            require_once ("../controllers/Controller.php");
            echo Controller::viewTuins();
    }
?>
        </div>
</div>