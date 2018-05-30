<?php
    require_once ("controller/Controller.php");
	session_start();
        $user =Controller::getUser($_REQUEST['valorCaja1']);
	    if(Controller::getPrivacidad($user) ==1){
	        $s =$_REQUEST['$idUser'];
        }
        else{
            Controller::actFollowing($_SESSION['idUser'],$_REQUEST['valorCaja1']);
            $s =$_REQUEST['$idUser'];
	    }

        //header('Location: ../views/index2.php');
        $resultado = $_REQUEST['valorCaja1'];
        echo $resultado;
?>