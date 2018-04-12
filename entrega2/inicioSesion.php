<?php
	echo '<form action="loginBBDD.php" method="post">';
	echo '<fieldset>';
	echo '<legend>Inicio de sesion</legend>';
	echo 'Nick: <input type="text" name="nick">';
	echo 'Contraseña: <input type="password" name="pass">';
	echo '<input type="submit" name="login" value="Aceptar"';
	echo '</fieldset>';
	echo '</form>';
?>