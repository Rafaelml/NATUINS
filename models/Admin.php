<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 11/4/18
 * Time: 17:37
 */
require_once ("../base/Conexion_BD_Natuins.php");
class Admin extends UserNoR
{
    private $idAdmin;
    private $nick;
    private function __construct($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $this->$campo = $valor;
        }
    }
    public static function init_Session($nick ='' ,$password=''){
        if(empty($nick) || empty($password)){
            return false;
        }
        $bd = Conexion_BD_Natuins::getSingleton();
        if(empty($nick) || empty($password)){
            return false;
        }
        $bd->query = "SELECT * FROM admin WHERE nick = '$nick'  AND password='$password'";
        $bd->get_results_from_query();
        if(count($bd->rows) == 1){
            foreach ($bd->rows[0] as $campo =>$valor){
                $user_data[$campo] =$valor;
            }
            $user = new Admin($user_data);
            $user->createSession();
            return $user;
        }
        else{
            return false;
        }
    }
    private function createSession(){
        $tipo = "admin";
        session_start();
        $_SESSION['usuario'] = $this->nick;
        $_SESSION['login'] = true;
        $_SESSION['tipo'] = $tipo;
        $_SESSION['idUser'] = $this->idAdmin;
        $_SESSION['pulsado'] =false;
    }
    public static function editTuins(){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "SELECT * FROM `cantantes`";
        $bd->get_results_from_query();
        return $bd->rows;
    }
    public static function viewConciertos(){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "SELECT * FROM `conciertos`";
        $bd->get_results_from_query();
        return $bd->rows;
    }
    public static function viewUsers(){
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "SELECT * FROM `userr`";
        $bd->get_results_from_query();
        return $bd->rows;
    }
}
?>