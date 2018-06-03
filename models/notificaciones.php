<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 3/6/18
 * Time: 13:13
 */

class notificaciones
{
    private $idUserReceiver;
    private $notificacion;
    public static function crea($idUserReceiver,$notificacion){
        $notificaciones = new notificaciones($idUserReceiver,$notificacion);
        self::actualizarNotificaciones($notificaciones);
        return $notificaciones;
    }
    private function __construct($idUserReceiver,$notificacion)
    {
        $this->idUserReceiver =$idUserReceiver;
        $this->notificacion =$notificacion;
    }
    private static function actualizarNotificaciones($notificaciones){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT notificaciones FROM notificaciones WHERE idUserReceiver ='$notificaciones->idUserReceiver'";
        $bd->get_results_from_query();
        $megus =array_pop($bd->rows);
        $notifica = " ".  $megus['notificaciones'] . $notificaciones->notificacion;
        $bd->query ="INSERT INTO `notificaciones` (`idNotificacion`, `idUserReceiver`,`notificaciones`) VALUES (NULL, '$notificaciones->idUserReceiver', '$notifica')";
        $bd->execute_single_query();
    }
    public static function estadoNotificaciones($idUser){
        $bool =false;
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT idNotificacion FROM notificaciones WHERE idUserReceiver ='$idUser'";
        $bd->rows =null;
        $bd->get_results_from_query();
        if($bd->rows){
            $bool =true;
        }
        return $bool;
    }
    public static function getNumNotificaciones($idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT idNotificacion FROM notificaciones WHERE idUserReceiver ='$idUser'";
        $bd->rows =null;
        $bd->get_results_from_query();
        $a =count($bd->rows);
        $bd->rows =null;
        return $a;
    }
    public static function getNotificaciones($idUser){
        $bool =false;
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT notificaciones FROM notificaciones WHERE idUserReceiver ='$idUser'";
        $bd->rows =null;
        $bd->get_results_from_query();
        $notificaciones =$bd->rows;
        $bd->rows =null;
        return $notificaciones;
    }
    public static function RevisarNotificaciones($idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="DELETE FROM `notificaciones` WHERE `notificaciones`.`idUserReceiver` ='$idUser'";
        $bd->execute_single_query();
    }
}