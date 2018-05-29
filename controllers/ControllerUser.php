<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 25/5/18
 * Time: 23:46
 */
require_once ("controller/Controller.php");

$userdel = $_REQUEST['usuarios'];
if(!isset($_SESSION)){
    session_start();
}
if(isset($userdel)){
    $name = htmlspecialchars(trim(strip_tags($userdel)));
    Controller::delUser($userdel);
    header('Location: ../views/index2.php');
}