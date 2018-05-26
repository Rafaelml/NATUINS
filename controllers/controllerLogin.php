<?php
    require_once ("controller/Controller.php");
    $nick = htmlspecialchars(trim(strip_tags($_REQUEST["nick"])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["pass"])));
    Controller::login($nick,$password,$cont);
?>