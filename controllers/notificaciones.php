<?php
/**
 * Created by PhpStorm.
 * User: migue
 * Date: 01/06/2018
 * Time: 3:24
 */
require_once ("controller/Controller.php");
if(!isset($_SESSION)){
    session_start();
}
$resultado= Controller::estadoNotificaciones($_SESSION['idUser']);
$df =4;
ob_end_clean();
echo $resultado;