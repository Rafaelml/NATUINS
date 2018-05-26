<div id="contenido">
<?php
    require_once ("../controllers/controller/Controller.php");
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) && isset($_SESSION['usuario']) != null){
	    if($_SESSION['tipo'] == 'usuario') {
	        echo '<h1>Bienvenido a Natuins ' . $_SESSION['usuario'] . '</h1>';
	        echo'<p>Escribe un tuin:</p><div id="mensaje">
			    <form action="../controllers/procesarTuin.php" method="post">
				<textarea rows="5" cols="68" name="tuin"></textarea>
				<p><input type="submit" name="login" value="Enviar"></p>
			    </form>
		        </div>';
	        echo'<div id="tuins">';
	        echo Controller::viewTuins();
	    }
	    elseif($_SESSION['tipo'] == 'admin'){
            echo '<h1>Administrar Usuarios</h1>';
            echo Controller::obtUsers();
	    }
	}
	    else{
            echo'<div id="tuins">';
            echo Controller::viewTuins();
        }
	?>
</div>
</div>