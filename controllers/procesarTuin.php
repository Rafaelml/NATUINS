<?php
	session_start();
	$tuin = htmlspecialchars(trim(strip_tags($_REQUEST["tuin"])));
	$idUser = $_SESSION['idUser'];

	if(empty($tuin)){
		exit();
	}
    require_once ("controller/Controller.php");
    Controller::processTuin($tuin,$idUser,$cont);
    Controller::viewTuins();
?>