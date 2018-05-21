<?php

require_once('../models/UserNoR.php');

$nick = htmlspecialchars(trim(strip_tags($_REQUEST["caja"])));
if(UserNoR::buscar($nick))
	echo "$nick";

else
	echo "No se ha encontrado ningun usuario para esa busqueda.";

?>