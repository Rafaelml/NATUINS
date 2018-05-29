<?php

	require_once('../models/UserNoR.php');

	$nick = htmlspecialchars(trim(strip_tags($_REQUEST["caja"])));
	if(UserNoR::buscar($nick)){
		$user = UserNoR::checkNick($nick);
		echo "<a href='../views/miperfil.php?caja=$user'>" .$nick. "</a>";
	}
	else
		echo "No se ha encontrado ningun usuario para esa busqueda.";
?>