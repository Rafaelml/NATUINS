<?php

require_once ("controller/Controller.php");


if (Controller::comprobarNick($_REQUEST["user"])) {
	     ob_end_clean();
	    echo "existe";
	} 
	else {
	    ob_end_clean();
	    echo "disponible";
	};


?>