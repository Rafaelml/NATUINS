<div id="sidebar-right">
	<?php
    require_once ("../controllers/Controller.php");
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) && isset($_SESSION["idUser"])) {
	    echo Controller::viewPersonasDestacadasRegistrado($_SESSION['idUser']);
	}
	else{
	    echo Controller::viewPersonasDestacadas();
	}
    ?>

    <a href="nosotros.php">Sobre nosotros</a>
</div>
