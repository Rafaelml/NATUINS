<?php
    require_once ("controller/Controller.php");
	session_start();
        $user =Controller::getUser($_REQUEST['valorCaja1']);
	    if(Controller::getPrivacidad($user)){
	        $resultado ="alerta";
            $id =$_REQUEST['valorCaja1'];
	        echo $resultado;
        }
        else{
            Controller::actFollowing($_SESSION['idUser'],$_REQUEST['valorCaja1']);
	    }
?>