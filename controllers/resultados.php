<?php

require_once('models/UserR.php');
$nick = htmlspecialchars(trim(strip_tags($_REQUEST["caja"])));
if(UserR::buscar($nick))
	echo "$nick";

else
	echo "No se ha encontrado ningun usuario para esa busqueda.";

?>