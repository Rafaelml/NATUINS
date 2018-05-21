<?php

require_once ("Controller.php");

	if(Controller::comprobarMail($_REQUEST["email"])){
		     ob_end_clean();
	    echo "existe";
	} 
	else {
	    ob_end_clean();
	    echo "disponible";
	}

?>