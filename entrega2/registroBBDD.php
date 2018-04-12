<?php
	include_once "conexion.php";

	$nick = htmlspecialchars(trim(strip_tags($_REQUEST['nick'])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST['pass'])));
	$repassword = htmlspecialchars(trim(strip_tags($_REQUEST['repass'])));
	$email = htmlspecialchars(trim(strip_tags($_REQUEST['email'])));
	$telefono = htmlspecialchars(trim(strip_tags($_REQUEST['tel'])));

	if(empty($nick) || empty($password) || empty($repassword) || empty($email)){
		echo 'Su usuario es incorrecto, intentelo de nuevo';
		exit();
	}

	$sql = "INSERT INTO userr (nick, pass, repass, email, telefono) VALUES ('$nick', '$password', '$repassword', '$email', '$telefono')";
	$mysqli->query($sql);
?>