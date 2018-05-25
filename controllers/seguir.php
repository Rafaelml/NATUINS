<?php
    require_once ("Controller.php");
	session_start();
	    Controller::actFollowing($_SESSION['idUser'],$_REQUEST['$idUser']);
	    if($_SESSION['pulsado'] ==false){
            $_SESSION['pulsado'] = true;
        }
        else{
            $_SESSION['pulsado'] = false;
        }
        header('Location: ../views/index2.php');
?>