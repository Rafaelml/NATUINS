<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 11/4/18
 * Time: 17:30
 */
require_once "Conexion_BD_Natuins.php";
class UserNoR extends Conexion_BD_Natuins
{
    protected function get()
    {

    }

    protected function set()
    {

    }

    protected function update()
    {

    }

    protected function del()
    {

    }

    public function viewTuins()
    {
        $this->query = "SELECT tuin FROM tuin";
        $this->get_results_from_query();
        $contador = count($this->rows);
        $temp =0;
        for ($i = $contador; $i >= 1; $i--) {
           $a = $this->rows[$i-1];
           $tuin[$temp] =$a;
           $temp++;
        }
        return $tuin;
    }
}