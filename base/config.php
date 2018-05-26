<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/5/18
 * Time: 23:35
 */

require_once "Conexion_BD_Natuins.php";
require_once "../controllers/controller/Controller.php";

/**
* Configuración del soporte de UTF-8, localización (idioma y país) y zona horaria
*/

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');
$db_host ="localhost";
$db_user ="root";
$db_password ="";
$db_name ="natuins_bd";
$bd = Conexion_BD_Natuins::getSingleton();
$bd->init($db_host,$db_name,$db_user,$db_password);
$cont =new Controller();
$user_data ="";
$cont->init($user_data);
