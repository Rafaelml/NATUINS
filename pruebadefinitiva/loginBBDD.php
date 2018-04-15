<?php
    require_once ("UserR.php");
	$nick = htmlspecialchars(trim(strip_tags($_REQUEST["nick"])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["pass"])));
	$usuario = new UserR();
    $usuario->init_Session($nick,$password);
    header('Location: index.php');
?>