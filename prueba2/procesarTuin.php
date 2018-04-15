<?php
	include_once "conexion.php";
	session_start();

	$tuin = htmlspecialchars(trim(strip_tags($_REQUEST["tuin"])));
	$idUser = $_SESSION['idUser'];

	//$sql = "INSERT INTO userr (nick, pass, repass, email, telefono) VALUES ('$nick', '$password', '$repassword', '$email', '$telefono')";

	if(empty($tuin)){
		exit();
	}

	$sql = "INSERT INTO tuin (tuin, idUser) VALUES ('$tuin', '$idUser')";
	$mysqli->query($sql);

	header("Location: index.php");

?>