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
    public static function getTuinFromIdTuin($idTuin){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT tuin FROM tuin WHERE idTuin ='$idTuin'";
        $bd->rows =null;
        $bd->get_results_from_query();
        return $bd->rows;
    }

    private static function comprobarPalabra($palabra){
        $mostrar="";
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "SELECT palabra FROM diccionario WHERE palabra='$palabra'";
        $bd->rows = null;
        $bd->get_results_from_query();
        $cont = count($bd->rows);

        if($bd->rows){
            $a =strlen($palabra);
            for($i=0; $i < $a; $i++){
                $mostrar .= '*';
            }
        }
        else
            $mostrar = $palabra;

        return $mostrar;
    }

    public static function createTuin($tuin,$idUser){
        $a =explode(" ",$tuin);
        $count = count($a);
        $mostrar ="";
        for ($i =0;$i<$count;$i++){
            $mostrar.= Tuins::comprobarPalabra($a[$i]);
            $mostrar.=" ";
        }
        $bd = Conexion_BD_Natuins::getSingleton();
        $bd->query = "INSERT INTO tuin (tuin, idUser) VALUES ('$mostrar', '$idUser')";
        $bd->execute_single_query();
    }

    public static function addMegusta($tuin,$idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT `contmg` FROM `tuin` WHERE `idTuin`='$tuin->idTuin'";
        $bd->get_results_from_query();
        $a = array_pop($bd->rows);
        $a =$a['contmg'] + 1;
        $bd->query ="UPDATE `tuin` SET `contmg` = '$a' WHERE `tuin`.`idTuin` = '$tuin->idTuin'";
        $bd->execute_single_query();
        $bd->query ="INSERT INTO `megustas` (`idMG`, `idUser`, `idTuin`) VALUES (NULL, '.$idUser.', '$tuin->idTuin');";
        $bd->execute_single_query();
    }
    public static function existeMeGusta($idTuin,$idUser){
        $existe =false;
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT * FROM `megustas` WHERE `idTuin` = '$idTuin' AND `idUser`='$idUser'";
        $bd->rows =null;
        $bd->get_results_from_query();
        if($bd->rows){
            $existe =true;
        }
        return $existe;
    }
    public static function disminuirContMG($idTuin,$idUser){
        $bd =Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT `contmg` FROM `tuin` WHERE `idTuin`='$idTuin'";
        $bd->get_results_from_query();
        $a = array_pop($bd->rows);
        $a =$a['contmg'] - 1;
        $bd->query ="UPDATE `tuin` SET `contmg` = '$a' WHERE `tuin`.`idTuin` = '$idTuin'";
        $bd->execute_single_query();
        $bd->query ="DELETE FROM `megustas` WHERE `idTuin` = '$idTuin' AND `idUser` ='$idUser'";
        $bd->execute_single_query();
    }

    public static function getMeGustas(){
        $bd=Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT * FROM `megustas`";
        $bd->rows =null;
        return $bd->get_results_from_query();
    }
    public static function getMeGustasUser($idUser){
        $bd=Conexion_BD_Natuins::getSingleton();
        $bd->query ="SELECT idTuin FROM `megustas` WHERE idUser ='$idUser'";
        $bd->rows =null;
        $bd->get_results_from_query();
        return $bd->rows;
    }
    public static function getTuins($tuin){
        $a =$tuin->tuins;
        return $a;
    }
    public static function getIdUser($tuin){
        $a =$tuin->idUser;
        return $a;
    }


}
?>