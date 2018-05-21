<?php

require_once  '../models/UserNoR.php';
require_once  '../models/UserR.php';

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
        } elseif ($email != null) {
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

    public static function login($nick,$pass,$cont){
        $user =UserR::init_Session($nick,$pass);
        if($user){
            $cont->user =$user;
        }
        header('Location: ../views/index2.php');
    }
    public static function logout($cont){
        UserR::closeSession();
        $cont->user = new UserNoR();
        header('location: ../views/inicio.php');
    }
    public static function processTuin($tuin,$idUser){
        UserR::createTuin($tuin,$idUser);
        header('Location: ../views/index2.php');
    }
}
?>