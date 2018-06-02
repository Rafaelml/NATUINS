<?php

require_once ("../base/Conexion_BD_Natuins.php");
require_once ("Tuins.php");

class UserR extends UserNoR
{
    private $idUser;
    private $name;
    private $nick;
    private $password;
    private $status;
    private $telefono;
    private $email;
    private $message;
    private $privacidad;
    private $contFollowers;
    private $contFollowings;
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
    public static function getUser($idUser){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT * FROM userr WHERE idUser='$idUser'";
        $bd->rows =null;
        $bd->get_results_from_query();
        $user_data =array();
        $user_data2 =array();
        foreach ($bd->rows[0] as $campo =>$valor){
           $user_data[$campo] =$valor;
        }
        $user =new UserR($user_data);
        return $user;
    }

    public static function getIdUser($user)
    {
        return $user->idUser;
    }

    public static function getName($user)
    {
        return $user->name;
    }

    public static function getNick2($user)
    {
        return $user->nick;
    }

    public static function getStatus($user)
    {
        return $user->status;
    }

    public static function getTelefono($user)
    {
        return $user->telefono;
    }

    public static function getMessage($user)
    {
        return $user->message;
    }

    public static function getFollowers($user)
    {
        return $user->contFollowers;
    }

    public static function getFollowings($user)
    {
        return $user->contFollowings;
    }
    public static function getPrivacidad($user)
    {
        return $user->privacidad;
    }
    public static function setImg($img,$user)
    {
        $user->img =$img;
        $user->setCampos($user);
    }
    public static function getImg($user)
    {
        return $user->img;
    }


    private static function set($user)
    {
        $bd = Conexion_BD_Natuins::getSingleton();
        if (count($bd->rows) == 1 or $user->nick[0-4] =="admin") {
            return false;
        }else {
            unset($bd->rows);
            $user->password =UserR::hashPassword($user->password);
            $bd->query ="INSERT INTO `userr` (`idUser`, `name`, `nick`, `password`, `status`, `img`, `telefono`, `email`,`privacidad`) VALUES (NULL, '$user->name', '$user->nick', '$user->password', '', '', '$user->telefono', '$user->email','$user->privacidad')";
            $bd->execute_single_query();
            $user->idUser =$user->get($user->nick);
            $user->createSession();
            return $user;
        }
    }
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    public function compruebaPassword($password,$hash)
    {
        return password_verify($password, $hash);
    }
    public static function viewDestacadosR($idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->rows =null;
        $bd->query ="SELECT * FROM `userr` WHERE `idUser` NOT IN (SELECT `idFollowing` FROM `userfollowing` WHERE `idUser` ='$idUser') AND `idUser` NOT IN ('$idUser') ORDER BY contFollowers DESC";
        $bd->get_results_from_query();
        return $bd->rows;
    }
    public static function viewTuinsDestacados(){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->rows =null;
        $bd->query ="SELECT * FROM `tuin` ORDER BY `contmg` DESC LIMIT 20";
        $bd->get_results_from_query();
        return $bd->rows;
    }

    private function setCampos($user){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "UPDATE `userr` SET `name` = '$user->name', `nick` = '$user->nick', `password` = '$user->password', `status` = '$user->status',`img` = '$user->img',`telefono` = '$user->telefono',`email` = '$user->email',`privacidad` = '$user->privacidad' WHERE `userr`.`idUser` = $user->idUser";
        $bd->execute_single_query();
    }
    public static function setName($name , $user)
    {
        $user->name =$name;
        $user->setCampos($user);
    }

    public static function settNick($nick,$user)
    {
        $user->nick =$nick;
        $user->setCampos($user);
    }

    public static function settTelefono($telefono,$user)
    {
        $user->telefono =$telefono;
        $user->setCampos($user);
    }

    public static function settStatus($status,$user)
    {
        $user->status =$status;
        $user->setCampos($user);
    }
    public static function viewFollowings($idUser)
    {
        $following =null;
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "SELECT idFollowing FROM userfollowing WHERE idUser='$idUser'";
        $bd->rows=null;
        $bd->get_results_from_query();
        $contador = count($bd->rows);
        $temp =0;
        for ($i = 0; $i < $contador; $i++) {
            $user = $bd->rows[$i];
            $nick = UserNoR::getNick($user["idFollowing"]);
            array_push($user, $nick);
            $following[$temp] =$user;
            $temp++;
        }
        return $following;
    }

    public static function viewFollowers($idUser)
    {
        $follower = null;
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "SELECT idFollower FROM userfollower WHERE idUser='$idUser'";
        $bd->rows=null;
        $bd->get_results_from_query();
        $contador = count($bd->rows);
        $temp = 0;
        for ($i = 0; $i < $contador; $i++) {
            $user  = $bd->rows[$i];
            $nick = UserNoR::getNick($user["idFollower"]);
            array_push($user, $nick);
            $follower[$temp] = $user;
            $temp++;
        }
        return $follower;
    }

    public static function del($idUser){
        $bd = Conexion_BD_Natuins::getSingleton();
        if ($idUser != '') {
            $bd->rows =null;
            $bd->query ="SELECT idFollowing FROM `userfollowing` WHERE idUser ='$idUser'";
            $bd->get_results_from_query();
            foreach ($bd->rows[0] as $campo =>$valor){
                UserR::actDelContadorFollowers($valor);
            }
            $bd->rows =null;
            $bd->query ="SELECT idFollower FROM `userfollower` WHERE idUser ='$idUser'";
            $bd->get_results_from_query();
            foreach ($bd->rows[0] as $campo =>$valor){
                UserR::actDelContadorFollowings($valor);
            }
            $bd->query="SELECT idTuin FROM `megustas` WHERE idUser ='$idUser'";
            $bd->rows =null;
            $bd->get_results_from_query();
            foreach ($bd->rows[0] as $campo =>$valor){
                Tuins::disminuirContMG($valor);
            }
            $bd->query = "DELETE FROM userr WHERE idUser='$idUser'";
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
        $bd->query = "SELECT password FROM userr WHERE nick = '$nick'";
        $bd->get_results_from_query();
        $a = array_pop($bd->rows);
        $b =UserR::compruebaPassword($password,$a['password']);
        if($b){
            $bd->query = "SELECT * FROM userr WHERE nick = '$nick'";
            $bd->get_results_from_query();
            if(count($bd->rows) == 1){
                foreach ($bd->rows[0] as $campo =>$valor){
                    $user_data[$campo] =$valor;
                }
                $user = new UserR($user_data);
                $user->createSession();
                return $user;
            }
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
    public static function estadoNotificaciones($idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT estado FROM notificaciones WHERE idUserReceiver ='$idUser'";
        $bd->rows =null;
        $bd->get_results_from_query();
        $a =array_pop($bd->rows);
        $b =$a['estado'];
        return $a['estado'];
    }
    public static function addFollowings($idUser , $idUserFollowing)
    {
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "INSERT INTO `userfollowing` (`idUser`, `idFollowing`) VALUES ('$idUser', '$idUserFollowing')";
        $bd->execute_single_query();
        UserR::actAddContadorFollowings($idUser);
        UserR::actuilizarFollowers($idUserFollowing,$idUser);
    }
    private static function actDelContadorFollowers($idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT `contFollowers` FROM `userr` WHERE `idUser`='$idUser'";
        $bd->get_results_from_query();
        $a =array_pop($bd->rows);
        $a =$a['contFollowers'] - 1;
        $bd->query ="UPDATE `userr` SET `contFollowers` = '$a' WHERE `userr`.`idUser` = '$idUser'";
        $bd->execute_single_query();

    }
    private static function actAddContadorFollowings($idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT `contFollowings` FROM `userr` WHERE `idUser`='$idUser'";
        $bd->get_results_from_query();
        $a = array_pop($bd->rows);
        $a =$a['contFollowings'] + 1;
        $bd->query ="UPDATE `userr` SET `contFollowings` = '$a' WHERE `userr`.`idUser` = '$idUser'";
        $bd->execute_single_query();
    }
    private static function actAddContadorFollowers($idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT `contFollowers` FROM `userr` WHERE `idUser`='$idUser'";
        $bd->get_results_from_query();
        $a = array_pop($bd->rows);
        $a =$a['contFollowers'] + 1;
        $bd->query ="UPDATE `userr` SET `contFollowers` = '$a' WHERE `userr`.`idUser` = '$idUser'";
        $bd->execute_single_query();
    }
    private static function actDelContadorFollowings($idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT `contFollowings` FROM `userr` WHERE `idUser`='$idUser'";
        $bd->get_results_from_query();
        $a =array_pop($bd->rows);
        $a =$a['contFollowings'] - 1;
        $bd->query ="UPDATE `userr` SET `contFollowings` = '$a' WHERE `userr`.`idUser` = '$idUser'";
        $bd->execute_single_query();
    }
    private function actuilizarFollowers($idUser , $idUserFollower){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query ="INSERT INTO `userfollower` (`idUser`, `idFollower`) VALUES ('$idUser', '$idUserFollower')";
        $bd->execute_single_query();
        UserR::actAddContadorFollowers($idUser);
    }

    public static function delFollowing($idUser , $idUserfollowings){
        UserR::actDelContadorFollowings($idUser);
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "DELETE FROM `userfollowing` WHERE `userfollowing`.`idUser` ='$idUser' AND `userfollowing`.`idFollowing` = '$idUserfollowings'";
        $bd->execute_single_query();
        UserR::actualizarDelFollowers($idUser,$idUserfollowings);
        return true;
    }
    private function actualizarDelFollowers($idUser , $idUserfollowers){
        UserR::actDelContadorFollowers($idUserfollowers);
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "DELETE FROM `userfollower` WHERE `userfollower`.`idUser` ='$idUserfollowers' AND `userfollower`.`idFollower` = '$idUser'";
        $bd->execute_single_query();
    }
    public static function existFollowing($idUser, $idUser_a_Seguir){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bool =false;
        $bd->query ="SELECT * FROM `userfollowing` WHERE idUser ='$idUser' AND idFollowing = '$idUser_a_Seguir'";
        $bd->rows =null;
        $bd->get_results_from_query();
        if($bd->rows){
            $bool=true;
        }
        return $bool;
    }
    public static function viewYourTuins($idUser)
    {
        $tuin =null;
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "SELECT tuin , idUser , contmg FROM tuin WHERE idUser ='$idUser'";
        $bd->rows =null;
        $bd->get_results_from_query();
        $contador = count($bd->rows);
        $temp =0;
        for ($i = $contador; $i >= 1; $i--) {
            $tuins = $bd->rows[$i-1];
            $nick = UserR::getNick($tuins["idUser"]);
            $contmg = $tuins["contmg"];
            array_push($tuins, $nick, $contmg);
            $tuin[$temp] =$tuins;
            $temp++;
        }
        return $tuin;
    }
}
?>