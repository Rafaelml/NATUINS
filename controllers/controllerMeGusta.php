<?php
if(!isset($_SESSION)){
    session_start();
}

require_once ("controller/Controller.php");
require_once '../models/Tuins.php';
$idMGRecieve = htmlspecialchars(trim(strip_tags($_REQUEST["megusta"])));
$idTuin =$_REQUEST["idTuin"];
if($idMGRecieve ==-1){
    Controller::disminuerMG($idTuin);
}
else{
    $tuin =$_REQUEST["tuin"];
    $idUsert=$_REQUEST["idUser"];
    $contmg=$_REQUEST["contmg"];
    $idTuin =$_REQUEST["idTuin"];
    $tuin =Tuins::getTuin($idTuin,$tuin,$idUsert,$contmg);
    Controller::addMegusta($tuin,$idTuin,$_SESSION['idUser']);
}
//$idUser = $_SESSION['idUser'];
