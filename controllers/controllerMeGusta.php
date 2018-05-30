<?php
session_start();
require_once '../models/Tuins.php';
$idMGRecieve = htmlspecialchars(trim(strip_tags($_REQUEST["megusta"])));
//$idUser = $_SESSION['idUser'];
$tuin =$_REQUEST["tuin"];
$idUsert=$_REQUEST["idUser"];
$contmg=$_REQUEST["contmg"];
$idTuin =$_REQUEST["idTuin"];

require_once ("controller/Controller.php");
$tuin =Tuins::getTuin($idTuin,$tuin,$idUsert,$contmg);
$a=4;
Controller::addMegusta($tuin);