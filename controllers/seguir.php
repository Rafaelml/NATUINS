<?php
    require_once ("Controller.php");
	session_start();
	    //Controller::actFollowing($_SESSION['idUser'],$_REQUEST['$idUser']);
        Controller::actFollowing($_POST['valorCaja1'],$_POST['valorCaja2']);
	    if($_SESSION['pulsado'] ==false){
            $_SESSION['pulsado'] = true;
        }
        else{
            $_SESSION['pulsado'] = false;
        }
$resultado = $_POST['valorCaja1'] + $_POST['valorCaja2'];
echo $resultado;
?>