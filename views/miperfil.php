<?php
    require_once "clases/Miperfil.php";
    echo "<!DOCTYPE html>
            <html>
            <head>
            <meta charset='utf-8'>
	        <title>Perfil</title>
	        <link rel='stylesheet' type='text/css' href='css/inicio.css'>
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