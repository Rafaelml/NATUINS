<?php

require_once '../models/UserNoR.php';
require_once '../models/UserR.php';
require_once '../models/Admin.php';

class Controller{
    private $user;
    public $tuins;
    public function init($user_data)
    {
        if($user_data){
            $this->user =UserR::crea($user_data);
        }
        else{
            $this->user = new UserNoR();
        }
    }
    public static function getSingleton($user_data) {
        if (  !self::$instancia instanceof self) {
            self::$instancia = new self($user_data);
        }
        return self::$instancia;
    }
    public static function viewTuins(){
        $mostrar ="";
        $usuario =new UserNoR();
        $tuins = $usuario->viewTuins();
        if($tuins != null) {
            $cont = 4;
            if ($cont > count($tuins)){
                $cont =count($tuins);
            }
            for ($i = 0; $i < $cont; $i++) {
                $mostrar .='<div id="tuin">';
                $mostrar .= '<p>' . $tuins[$i]["tuin"] . '</p>';
                $mostrar .= '<p>' . $tuins[$i]["0"] . '</p>';
                $mostrar .='</div>';
            }
        }
        return $mostrar;
    }

    public static function actFollowing($idUser ,$idUser_a_Seguir){
        if(!UserR::existFollowing($idUser,$idUser_a_Seguir)){
            UserR::addFollowings($idUser,$idUser_a_Seguir);
        }
        else{
            UserR::delFollowing($idUser, $idUser_a_Seguir);
        }
    }
    public static function comprobarNick ($nick){
        $bool =false;
        if(UserNoR::checkNick($nick)){
         $bool =true;
        }
        return $bool;
    }

    public static function comprobarMail($email){
        $bool =false;

        if(UserNoR::checkEmail($email)){
         $bool =true;
        }

        return $bool;
    }

    /*public static function comprobarPass($password, $password2){
        $bool =false;

        if($password == $password2){
         $bool =true;
        }

        return $bool;
    }*/

public static function cargarWeb(){
        header("Location: views/inicio.php");
    }

    public static function registr($user_data = array(),$cont){
        $nick = $cont->user->checkNick($user_data['nick']);
        $email = $cont->user->checkEmail($user_data['email']);
        if ($nick != null) {
            echo 'El nick insertado ya está en uso. Por favor pruebe con otro';
            exit();

        } elseif (substr($user_data['nick'], 0, 5) =='admin'){
            echo 'La palabra admin al inicio del usuario está reservada para los administradores.';
            echo 'Por favor pruebe con otro nick';
            exit();

        }elseif ($email != null) {
            echo 'El email insertado ya está en uso. Por favor pruebe con otro';
            exit();
        } else {
            $cont->user = UserR::crea($user_data);
            if ($cont->user) {
                header('Location: ../views/index2.php');
            } else {
                echo 'Usuario incorrecto inténtelo de nuevo.';
                exit();
            }
        }
    }
    public static function delUser($userdel){
        $user_data =array('idUser'=>$userdel);
        $user =UserR::crea($user_data);
        UserR::del($user);
        header('Location: ../views/index2.php?$opcion=adminUser');
    }

    public static function obtUsers(){
        $ver =Admin::viewUsers();
        $cont =count($ver);
        $mostrar ="";
        $mostrar .= '<form action="../ControllerUser.php" method="POST">';
        $mostrar .= '<select name="usuarios">';
        for ($i = 0; $i < $cont; $i++) {
            $b =$ver[$i]["nick"];
            $mostrar .= "Nick: ";
            $mostrar .= '<option value="' . $b . '">' . $b . '</option>';
        }
        $mostrar.="</select>";
        $mostrar.="<button type='submit'>Eliminar</button>";
        $mostrar .= '</form>';
        $mostrar .='<div id="">';
        return $mostrar;
    }
    private static function cominit($nick){
        $bool =true;
        $a =substr($nick, 0, 5);
        if($a =="admin"){
            $bool =false;
        }
        return $bool;
    }
    public static function login($nick,$pass,$cont){
        if(Controller::cominit($nick)){
            $user =UserR::init_Session($nick,$pass);
        }
        else {
                $cont->user = Admin::init_Session($nick,$pass);
                $cont->user->init_Session($nick, $pass);
        }
        if($user){
            $cont->user =$user;
        }
        header('Location: ../views/index2.php');
    }
    public static function logout($cont){
        $user_data =array();
        UserR::closeSession();
        $cont->user = new UserNoR();
        header('location: ../views/inicio.php');
    }
    public static function processTuin($tuin,$idUser){
        UserR::createTuin($tuin,$idUser);
        header('Location: ../views/index2.php');
    }
    public static function viewPersonasDestacadas(){
        $a ="";
        $dest =UserNoR::viewDestacados();
        $count =count($dest);
        for($i =0;$i<$count;$i++){
            $a = $a . "<p>" . $dest[$i]['nick']. '</p>';
        }
        return $a;
    }
    public static function viewPersonasDestacadasRegistrado($idUser){
        $a ="";
        $dest =UserR::viewDestacadosR($idUser);
        $count =count($dest);
        for($i =0;$i<$count;$i++){
            $a = $a . "<p>" . $dest[$i]['nick']. '</p>';
            $a .='<div><form action="../controllers/seguir.php?$idUser='.$dest[$i]['idUser'].'" method="POST">
            <button type="submit">Seguir</button></form></div>';
        }
        return $a;
    }
    public static function viewYourTuins($idUser){
        $mostrar ="";
        $tuins = UserR::viewYourTuins($idUser);
        if($tuins != null) {
            $cont = 4;
            if ($cont > count($tuins)){
                $cont =count($tuins);
            }
            for ($i = 0; $i < $cont; $i++) {
                $mostrar .='<div id="tuin">';
                $mostrar .= '<p>' . $tuins[$i]["tuin"] . '</p>';
                $mostrar .='</div>';
            }
        }

        return $mostrar;
    }
}
?>