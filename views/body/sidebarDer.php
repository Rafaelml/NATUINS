<div id="sidebar-right">
	<?php
    require_once ("../controllers/Controller.php");
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
	    echo Controller::viewPersonasDestacadasRegistrado($_SESSION['idUser']);
	}
	else{
	    echo Controller::viewPersonasDestacadas();
	}
    ?>

</div>
