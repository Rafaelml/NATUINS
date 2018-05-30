<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 11/4/18
 * Time: 17:31
 */

class Tuins
{
    private $idTuin;
    private $tuins;
    private $idUser;
    private $contmg;

    private function __construct($idTuin,$tuins,$idUser,$contmg)
    {
        $this->idTuin =$idTuin;
        $this->idUser=$idUser;
        $this->contmg =$contmg;
        $this->tuins =$tuins;
    }

    public static function getTuin($idTuin,$tuins,$idUser,$contmg){
        $tuin =new Tuins($idTuin,$tuins,$idUser,$contmg);
        return $tuin;
    }
    public static function addMegusta($tuin){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT `contmg` FROM `tuin` WHERE `idTuin`='$tuin->idTuin'";
        $bd->get_results_from_query();
        $a = array_pop($bd->rows);
        $a =$a['contmg'] + 1;
        $bd->query ="UPDATE `tuin` SET `contmg` = '$a' WHERE `tuin`.`idTuin` = '$tuin->idTuin'";
        $bd->execute_single_query();

    }

}
?>