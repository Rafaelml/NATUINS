<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 11/4/18
 * Time: 17:37
 */
require_once ("../base/Conexion_BD_Natuins.php");
class UserR extends UserNoR
{
    private $idUser;
    private $name;
    private $nick;
    private $password;
    private $status;
    private $email;
    private $message;
    //protected $followers;
    //protected $followings;
    //protected Tuins $numtuins;
    public static function crea($user_data = array())
    {
        $user = new UserR($user_data);
        return UserR::set($user);
    }
    private function __construct($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $this->$campo = $valor;
        }
    }
    public function getIdUser($user)
    {
        return $user->idUser;
    }

    public function getName($user)
    {
        return $user->name;
    }

    public function getStatus($user)
    {
        return $user->status;
    }

    public function getMessage($user)
    {
        return $user->message;
    }

    private static function set($user)
    {
        $bd = Conexion_BD_Natuins::getSingleton();
        if (count($bd->rows) == 1) {
            return false;
        } else {
            unset($bd->rows);
            $bd->query ="INSERT INTO `userr` (`idUser`, `name`, `nick`, `password`, `status`, `img`, `telefono`, `email`) VALUES (NULL, '', '$user->nick', '$user->password', '', '', '$user->telefono', '$user->email')";
            $bd->execute_single_query();
            $user->idUser =$user->get($user->nick);
            $user->createSession();
            return $user;
        }
    }

    private function setCampos($user){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "UPDATE `userr` SET `nick` = '$user->nick', `pass` = '$user->password', `email` = '$user->email', `telefono` = '$user->email' WHERE `userr`.`idUser` = $user->idUser;";
        $bd->execute_single_query();
    }
    public function setName($name , $user)
    {
        $user->name =$name;
        $this->setCampos($user);
    }

    public function settNick($nick,$user)
    {
        $user->name =$nick;
        $this->setCampos($user);
    }

    public function settStatus($status,$user)
    {
        $user->name =$status;
        $this->setCampos($user);
    }

    public static function del($user){
        $bd = Conexion_BD_Natuins::getSingleton();
        if ($user->idUser != '') {
            $bd->query = "DELETE FROM userr WHERE idUser='$user->idUser'";
            $bd->execute_single_query();
            $user =null;
            return true;
        }
        else{
           return false;
        }
    }
    public static function init_Session($nick ='' ,$password=''){
        $bd = Conexion_BD_Natuins::getSingleton();
        if(empty($nick) || empty($password)){
            return false;
        }
        $bd->query = "SELECT * FROM userr WHERE nick = '$nick'  AND password='$password'";
        $bd->get_results_from_query();
        if(count($bd->rows) == 1){
            foreach ($bd->rows[0] as $campo =>$valor){
                $user_data[$campo] =$valor;
            }
            $user = new UserR($user_data);
            $user->createSession();
            return $user;
        }
        else{
           return false;
        }
    }
    private function createSession(){
        $tipo = "usuario";
        session_start();
        $_SESSION['usuario'] = $this->nick;
        $_SESSION['login'] = true;
        $_SESSION['tipo'] = $tipo;
        $_SESSION['idUser'] = $this->idUser;
        $_SESSION['pulsado'] =false;
    }
    public static function createTuin($tuin,$idUser){//Está función debería estar en Tuins
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "INSERT INTO tuin (tuin, idUser) VALUES ('$tuin', '$idUser')";
        $bd->execute_single_query();
    }

    public static function addFollowings($idUser , $idUserFollowing){
        $bd = Conexion_BD_Natuins::getSingleton();
        if(UserR::comprobarSiyaSigueAalguien($idUserFollowing)){
            $bd->query ="INSERT INTO `followings` (`idFollowing`) VALUES ('$idUserFollowing')";
            $bd->execute_single_query();
        }
        $bd->query ="INSERT INTO `userfollowing` (`idUser`, `idFollowing`) VALUES ('$idUser', '$idUserFollowing')";
        $bd->execute_single_query();
        UserR::actuilizarFollowers($idUserFollowing , $idUser);//Ya que cuando alguien decide seguir a alguien esa persona obtiene un seguidor
     }
    private function comprobarSiyaSigueAalguien($idFollowing){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bol =false;
        $bd->query = "SELECT idFollowing FROM followings WHERE idFollowing ='$idFollowing'";
        $bd->get_results_from_query();
        if(empty($bd->rows)){
            $bol = true;
        }
        return $bol;
    }
    private function comprobarSiyaleSigueAlguien($idUserFollower){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bol =false;
        $bd->query = "SELECT idFollower FROM followers WHERE idFollower ='$idUserFollower'";
        $bd->get_results_from_query();
        if(empty($bd->rows)){
            $bol = true;
        }
        return $bol;
    }
    private function actuilizarFollowers($idUser , $idUserFollower){
        $bd = Conexion_BD_Natuins::getSingleton();
        if(!UserR::comprobarSiyaleSigueAlguien($idUserFollower)){
            $bd->query ="INSERT INTO `followers` (`idFollower`) VALUES ('$idUserFollower')";
            $bd->execute_single_query();
        }
        $bd->query ="INSERT INTO `userfollower` (`idUser`, `idFollower`) VALUES ('$idUser', '$idUserFollower')";
        $bd->execute_single_query();
    }

    public static function delFollowing($idUser , $idUserfollowings){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "DELETE FROM `userfollowing` WHERE `userfollowing`.`idUser` ='$idUser' AND `userfollowing`.`idFollowing` = '$idUserfollowings'";
        $bd->execute_single_query();
        UserR::actualizarDelFollowers($idUser,$idUserfollowings);
        return true;
    }
    private function actualizarDelFollowers($idUser , $idUserfollowers){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "DELETE FROM `userfollower` WHERE `userfollower`.`idUser` ='$idUserfollowers' AND `userfollower`.`idFollower` = '$idUser'";
        $bd->execute_single_query();
    }
    public static function existFollowing($idUser, $idUser_a_Seguir){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bool =false;
        $bd->query ="SELECT * FROM `userfollowing` WHERE idUser ='$idUser' AND idFollowing = '$idUser_a_Seguir'";
        $bd->get_results_from_query();
        if($bd->rows){
            $bool=true;
        }
        return $bool;
    }
}
?>