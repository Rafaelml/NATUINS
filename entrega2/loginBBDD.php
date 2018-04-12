<?php
	
	include_once "conexion.php";

	$nick = htmlspecialchars(trim(strip_tags($_REQUEST["nick"])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["pass"])));

	if(empty($nick) || empty($password)){
		echo 'Ha dejado algun recuadro en blanco. Intentelo de nuevo.';
		exit();
	}
	
	$sql = "SELECT * FROM userr WHERE nick = '" . $nick . "'";
	$rec = $mysqli->query($sql);
	$row = $rec->fetch_array();
	$tipo = "usuario";
	
	if($row['nick'] != $nick){
		$sql2 = "SELECT * FROM admin WHERE nick ='" . $nick . "'";
		$rec = $mysqli->query($sql2);
		$row = $rec->fetch_array();
		$tipo = "admin";
		if($row['nick'] != $nick){
			$password = "0";
		}
	}

	$idUser = $row['idUser'];
	//echo $row['pass'];
	//echo $tipo;
	
	if($row['pass'] == $password){
		session_start();
		$_SESSION['usuario'] = $nick;
		$_SESSION['login'] = true;
		$_SESSION['tipo'] = $tipo;
		$_SESSION['idUser'] = $idUser;
		header('Location: index.php');
	}
	else{
		$tipo = "ninguno"; //No se si esto es necesario
		echo 'Error al iniciar sesion. Intentelo de nuevo.';
		exit();
	}

?>