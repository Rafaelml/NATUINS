<?php
    require_once "clases/Miperfil.php";
    echo "<!DOCTYPE html>
            <html>
            <head>
            <title>Perfil</title>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
            <link rel='stylesheet' type='text/css' href='css/inicio.css'>
            <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
            <script src='../added/js/jquery-3.3.1.min.js'></script>
            <script src='../added/js/bootstrap.min.js'></script>
            </head>";
    if(!isset($_SESSION)){
        session_start();
    }

     echo '<div id="contenedor">';


    if(isset($_REQUEST['caja']) != ''){
        $idUser = UserNoR::get($_REQUEST['caja']);
    }

    else
        $idUser =$_SESSION['idUser'];

    $opcion ='tuin';
    if(isset($_REQUEST['opcion'])){
        if($opcion !=$_REQUEST['opcion']){
            $opcion =$_REQUEST['opcion'];
        }
    }
    $user =Controller::getUser($idUser);
    $user_data =array('idUser'=>$idUser);
    $perfil = new Miperfil($idUser);
    $perfil->cabecera();
    $perfil->navegador();
    $perfil->izq($user,$idUser);
    $perfil->contenido($opcion,$user_data,$user,$idUser);
    $perfil->der($_SESSION['idUser'], $user);
    echo '</div>';