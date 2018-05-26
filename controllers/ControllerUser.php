<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 25/5/18
 * Time: 23:46
 */
require_once ("Controller.php");
if(!isset($_SESSION)){
    session_start();
}
if(isset($_REQUEST['$userdel'])){
    $name = htmlspecialchars(trim(strip_tags($_REQUEST['$userdel'])));
    $controller->delUser($name);
}