<div id="sidebar-right">
	<?php
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
	?>
	<a href="noimplem.php">Personas a las que seguir</a>
	<form action="../controllers/seguir.php" method="post">
		<p>Cristiano Ronaldo</p>
		<?php
		if($_SESSION['pulsado'] == false){
		?>
			<input type="submit" name="follow" value="Seguir">
		<?php
		}
		else{
		?>
			<input type="submit" name="follow" value="Dejar de seguir">
	<?php
		}
	}else{
	?>
        	<a href="noimplem.php">Personas destacadas</a>
    <?php
	}
    ?>
	</form>
</div>