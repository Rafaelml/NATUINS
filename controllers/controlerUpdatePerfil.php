<?php
require_once ("controller/Controller.php");
//$privacidad = htmlspecialchars(trim(strip_tags($_REQUEST['privacidad'])));
if(isset($_REQUEST)){
    if(!isset($_SESSION)){
        session_start();
    }
    $user = Controller::getUser($_SESSION['idUser']);
    if($_REQUEST['controlador'] =="editName"){
        $name = htmlspecialchars(trim(strip_tags($_REQUEST['name'])));
        Controller::updateName($name,$user);
    }
    elseif ($_REQUEST['controlador']=="editStatus"){
        $status = htmlspecialchars(trim(strip_tags($_REQUEST['status'])));
        Controller::updateStatus($status,$user);
    }
    elseif ($_REQUEST['controlador']=="editTelefono"){
        $telefono = htmlspecialchars(trim(strip_tags($_REQUEST['telefono'])));
        Controller::updateTelefono($telefono,$user);
    }
    elseif ($_REQUEST['controlador']=="editPass"){
        $password = htmlspecialchars(trim(strip_tags($_REQUEST['pass'])));
        Controller::updatePass($password,$user);
    }
    else{

    }

    header("Location: ../views/miperfil.php?opcion=editarperfil");
}