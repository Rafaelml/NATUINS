<div id="sidebar-right">
	<?php
    require_once ("../controllers/Controller.php");
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
	    echo Controller::viewPersonasDestacadasRegistrado();
	}
	else{
	    echo Controller::viewPersonasDestacadas();
	}
    ?>
</div>