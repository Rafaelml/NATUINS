<?php

require_once '../models/UserNoR.php';
require_once '../models/UserR.php';
require_once '../models/Admin.php';
require_once '../models/Tuins.php';

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
    public static function viewFollowers($idUser){
        $mostrar ="";
        $user = UserR::viewFollowers($idUser);
        if($user != null) {
            $cont =count($user);
            for ($i = 0; $i < $cont; $i++) {
                $mostrar .='<div id="tuin">';
                $mostrar .= '<p>' . $user[$i][0] . '</p>';
                $mostrar .='</div>';
            }
        }

        return $mostrar;
    }

    public static function viewFollowings($idUser){
        $mostrar ="";
        $user = UserR::viewFollowings($idUser);
        if($user != null) {
            $cont =count($user);
            for ($i = 0; $i < $cont; $i++) {
                $mostrar .='<div id="tuin">';
                $mostrar .= '<p>' . $user[$i][0] . '</p>';
                $mostrar .='</div>';
            }
        }

        return $mostrar;
    }
    public static function viewTuins($idUser){
        $a=-1;
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
                $mostrar .= '<p>' . $tuins[$i]["contmg"] . '</p>';
                if(Tuins::existeMeGusta($tuins[$i]["idTuin"],$idUser)){
                    $mostrar .= '<form action="../controllers/controllerMeGusta.php?megusta='.$a.'&idTuin='.$tuins[$i]["idTuin"].'" method="POST">';
                    $mostrar.="<button type='submit'>QuitarMeGusta</button>";
                    $mostrar .= '</form>';
                    $mostrar .='</div>';
                }
                else{
                    $mostrar .= '<form action="../controllers/controllerMeGusta.php?megusta='.$tuins[$i]["0"].'&tuin='.$tuins[$i]["tuin"].'&idUser='.$tuins[$i]["idUser"].'&contmg='.$tuins[$i]["contmg"].'&idTuin='.$tuins[$i]["idTuin"].'" method="POST">';
                    $mostrar.="<button type='submit'>Me Gusta</button>";
                    $mostrar .= '</form>';
                    $mostrar .='</div>';
                }

            }
        }
        return $mostrar;
    }
    public static function addMegusta($tuin,$idTuin,$idUserDa){
        if(!Tuins::existeMeGusta($idTuin,$idUserDa)){
            Tuins::addMegusta($tuin,$idUserDa);
        }
    }
    public static function disminuerMG($idTuin,$idUser){
        Tuins::disminuirContMG($idTuin,$idUser);
    }
    public static function viewTuinsDestacados($idUser){
        $a=-1;
        $tuins= UserR::viewTuinsDestacados();
        $mostrar ="";
        $nick ="";
        if($tuins != null) {
            $cont = count($tuins);
            for ($i = 0; $i < $cont; $i++) {
                $mostrar .= '<div id="tuin">';
                $mostrar .= '<p>' . $tuins[$i]["tuin"] . '</p>';
                $nick =UserNoR::getNick($tuins[$i]["idUser"]);
                $mostrar .= '<p>' . $nick . '</p>';
                $mostrar .= '<p>' . $tuins[$i]["contmg"] . '</p>';
                if (Tuins::existeMeGusta($tuins[$i]["idTuin"], $idUser)) {
                    $mostrar .= '<form action="../controllers/controllerMeGusta.php?megusta=' . $a . '&idTuin=' . $tuins[$i]["idTuin"] . '" method="POST">';
                    $mostrar .= "<button type='submit'>QuitarMeGusta</button>";
                    $mostrar .= '</form>';
                    $mostrar .= '</div>';
                } else {
                    $mostrar .= '<form action="../controllers/controllerMeGusta.php?megusta=' . $tuins[$i]["idUser"] . '&tuin=' . $tuins[$i]["tuin"] . '&idUser=' . $tuins[$i]["idUser"] . '&contmg=' . $tuins[$i]["contmg"] . '&idTuin=' . $tuins[$i]["idTuin"] . '" method="POST">';
                    $mostrar .= "<button type='submit'>Me Gusta</button>";
                    $mostrar .= '</form>';
                    $mostrar .= '</div>';
                }
            }
        }
        return $mostrar;
    }

    public static function updateName($name,$user){
        UserR::setName($name,$user);
    }

    public static function updateStatus($status,$user){
        UserR::settStatus($status,$user);
    }

    public static function updatePass($pass,$user){
        UserR::setPass($pass,$user);
    }

    public static function updateTelefono($telefono,$user){
        UserR::settTelefono($telefono,$user);
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
    public static function updateImg($img,$user){
        UserR::setImg($img,$user);
    }



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
        $idUser =UserNoR::get($userdel);
        UserR::del($idUser);
    }

    public static function obtUsers(){
        $ver =Admin::viewUsers();
        $cont =count($ver);
        $mostrar ="";
        $mostrar .= '<form action="../controllers/ControllerUser.php" method="POST">';
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
        $mostrar .= '</div>';
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
        Tuins::createTuin($tuin,$idUser);
        header('Location: ../views/index2.php');
    }
    public static function estadoNotificaciones($idUser){
       return UserR::estadoNotificaciones($idUser);
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
        $dest =UserR::viewDestacadosR($idUser);
        $count =count($dest);
        $mostrar ="";
        for($i =0;$i<$count;$i++){
            $mostrar = $mostrar . "<p>" . $dest[$i]['nick']. '</p>';
            $idUserF =$dest[$i]['idUser'];
            if (UserR::esPrivado($idUser,$idUserF)==1) {
                $mostrar .= '<form action="../controllers/seguir.php?idUserF='.$idUserF.'"  method="POST">';
                $mostrar .= "<button type='submit'>Pendiente</button>";
                $mostrar .= '</form>';
            } else {
                $mostrar .= '<form action="../controllers/seguir.php?idUserF='.$idUserF.'"  method="POST">';
                $mostrar .= "<button type='submit'>Seguir</button>";
                $mostrar .= '</form>';
            }
            }
        return $mostrar;
    }
    public static function viewYourTuins($idUser){
        $mostrar ="";
        $tuins = UserR::viewYourTuins($idUser);
        if($tuins != null) {
            $cont =count($tuins) - 1;
            for ($i = 0; $i < $cont; $i++) {
                $mostrar .='<div id="tuin">';
                $mostrar .= '<p>' . $tuins[$i]["tuin"] . '</p>';
                $mostrar .='</div>';
            }
        }

        return $mostrar;
    }
    public static function getMeGustaUserTuin($idUser){
        $tuins =Tuins::getMeGustasUser($idUser);
        $mostrar="";
        if($tuins != null) {
            $cont =count($tuins)    ;
            for ($i = 0; $i < $cont; $i++) {
                $tuin =Tuins::getTuinFromIdTuin($tuins[$i]['idTuin']);
                $mostrar .='<div id="tuin">';
                $mostrar .= '<p>' . $tuin[0]['tuin']. '</p>';
                $mostrar .='</div>';
            }
        }
        return $mostrar;
    }
    public static function getUser($idUser){
        return UserR::getUser($idUser);
    }

    public static function getName($user){
        return UserR::getName($user);
    }

    public static function getNick($user){
        return UserR::getNick2($user);
    }

    public static function getStatus($user){
        return UserR::getStatus($user);
    }

    public static function getTelefono($user){
        return UserR::getTelefono($user);
    }

    public static function getImg($user){
        $dir= UserR::getImg($user);
        return '<img src="img/'.$dir.'" width="75" height="75">';
    }

    public static function getFollowers($user){
        return UserR::getFollowers($user);
    }

    public static function getFollowings($user){
        return UserR::getFollowings($user);
    }
    public static function getPrivacidad($user){
        return UserR::getPrivacidad($user);
    }
}
?>