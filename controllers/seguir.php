<?php
    require_once ("controller/Controller.php");
	session_start();
        $user =Controller::getUser($_REQUEST['$idUser']);
        $b =Controller::getPrivacidad($user);
	    if(Controller::getPrivacidad($user) ==1){
            ob_end_clean();
            echo "Es privado";º
        }
        else{
            Controller::actFollowing($_SESSION['idUser'],$_REQUEST['$idUser']);
	    }

        header('Location: ../views/index2.php');
?>