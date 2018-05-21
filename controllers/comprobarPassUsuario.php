<?php

require_once ("Controller.php");


if (Controller::comprobarPass($_REQUEST["repass"])) {
	     ob_end_clean();
	    echo "igual";
	} 
	else {
	    ob_end_clean();
	    echo "no igual";
	};


?>