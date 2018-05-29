<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 20/5/18
 * Time: 12:45
 */

require_once ("controller/Controller.php");

	if (Controller::comprobarNick($_REQUEST["user"]) && Controller::comprobarMail($_REQUEST["email"])) {
	     ob_end_clean();
	    echo "existe";
	} 
	else {
	    ob_end_clean();
	    echo "disponible";
	}

	ob_get_contents();

	/*if(Controller::comprobarMail($_REQUEST["email"])){
		     ob_end_clean();
	    echo "existe";
	} 
	else {
	    ob_end_clean();
	    echo "disponible";
	}*/

?>