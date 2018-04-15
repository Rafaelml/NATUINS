<?php
	global $mysqli;
	define('DB_SERVER','localhost');
	define('DB_NAME','miproyecto');
	define('DB_USER','root');
	define('DB_PASS','');
	$mysqli = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if(mysqli_connect_errno()){
        echo "Error de conexión a la BD: " .mysqli_connect_error();
        exit();
    }
?>