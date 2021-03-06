<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 11/4/18
 * Time: 17:30
 */
require_once "../base/config.php";
require_once "../base/Conexion_BD_Natuins.php";
class UserNoR
{

    public static function viewTuins()
    {
        $tuin =null;
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "SELECT * FROM tuin WHERE `idUser` NOT IN (SELECT `idUser` FROM `userr` WHERE `privacidad` ='1')";
        $bd->get_results_from_query();
        $contador = count($bd->rows);
        $temp =0;
        for ($i = $contador; $i >= 1; $i--) {
           $tuins = $bd->rows[$i-1];
           $nick = UserNoR::getNick($tuins["idUser"]);
           $contmg = $tuins["contmg"];
           array_push($tuins, $nick, $contmg);
           $tuin[$temp] =$tuins;
           $temp++;
        }
        return $tuin;
    }
    public  static function getNick($idUser = "")
    {
        $nick="";
        if ($idUser != "") {
            $bd = Conexion_BD_Natuins::getSingleton();
            $bd->query = "SELECT nick FROM userr WHERE idUser ='$idUser'";
            $bd->get_results_from_query();
            $nick = array_pop($bd->rows);
        }
        if(isset($nick['nick'])){
            return $nick['nick'];
        }
    }

    public static function closeSession(){
        session_start();
        $_SESSION = array();
        session_destroy();
    }
    public static function get($nick)
    {
        $bd = Conexion_BD_Natuins::getSingleton();
        if ($nick != "") {

            $bd->query = "SELECT idUser FROM userr WHERE nick ='$nick'";
            $bd->get_results_from_query();
        }
        $idUser =array_pop($bd->rows);
        return $idUser['idUser'];
    }

    public static function checkEmail($email){
        $bd = Conexion_BD_Natuins::getSingleton();
        if ($email != "") {
            $bd->query = "SELECT email FROM userr WHERE email ='$email'";
            $bd->get_results_from_query();
           $email =array_pop($bd->rows)["email"];
        }
        return $email;
    }

    public static function checkNick($nick){
        $bd = Conexion_BD_Natuins::getSingleton();
        if ($nick != "") {
            $bd->query = "SELECT nick FROM userr WHERE nick ='$nick'";
            $bd->get_results_from_query();
            $nick =array_pop($bd->rows)["nick"];
        }
        return $nick;
    }

    public static function buscar($nombre =''){
        $bd = Conexion_BD_Natuins::getSingleton();
        if(empty($nombre)){
            return false;
        }

        $bd->query = "SELECT nick FROM userr WHERE nick = '$nombre'";
        $bd->get_results_from_query();
        $nombre =array_pop($bd->rows)["nick"];

        return $nombre;
    }
    public static function viewDestacados(){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->rows =null;
        $bd->query ="SELECT * FROM `userr` ORDER BY contFollowers DESC";
        $bd->get_results_from_query();
        return $bd->rows;
    }
}
?>
