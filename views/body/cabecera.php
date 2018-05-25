<div id="cabecera">
	<div id="logo">
		<h1><a href="index2.php" name="natuins">NATUINS</a></h1>
	</div>

	<div id="interUsuario">
		<?php
        if(!isset($_SESSION)){
        session_start();}
        if(isset($_SESSION['usuario']) != null) {
		?>
			<ul>
				<li><a href="miperfil.php" name="miperfil">Mi perfil</a></li>
				<li><a href="../controllers/logout.php" name="salir">Salir</a></li>
			</ul>
		<?php
		} else {
		?>
			<ul>
	            <li><a href="registro.php">Registro</a></li>
	            <li><a href="login.php">Login</a></li>
	        </ul>
	    <?php
		}
		?>
	</div>
</div>