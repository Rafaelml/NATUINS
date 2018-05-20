<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 20/5/18
 * Time: 12:45
 */
require_once ("Controller.php");
$a =Controller::comprobarNick($_REQUEST["user"]);
if (Controller::comprobarNick($_REQUEST["user"])) {
     ob_end_clean();
    echo "existe";
} else {
    ob_end_clean();
    echo "disponible";
}
?>