<?php
    require_once ("controller/Controller.php");
    if(!isset($_SESSION)){
        session_start();
    }
	    if(false/*Controller::getPrivacidad($user)*/){
	        $resultado ="alerta";
            $id =$_REQUEST['valorCaja1'];
	        echo $resultado;
        }
        else{
            Controller::actFollowing($_SESSION['idUser'],$_REQUEST['idUserF']);
            header('Location: ../views/index2.php');
	    }

?>