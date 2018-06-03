<?php

class Conexion_BD_Natuins
{
    private  $db_host ="";
    private  $db_user ="";
    private  $db_password ="";
    private $conexion;
    private $db_name ="";
    public $query;
    public $rows =array();
    private static $instancia;

    public static function getSingleton() {
        if (  !self::$instancia instanceof self) {
            self::$instancia = new self;
        }
        return self::$instancia;
    }
    public function init($db_host,$db_name,$db_user,$db_password)
    {
        $this->db_host =$db_host;
        $this->db_user =$db_user;
        $this->db_password =$db_password;
        $this->db_name =$db_name;
    }

    public function open_connection(){
        $this->conexion = new mysqli( $this->db_host, $this->db_user, $this->db_password , $this->db_name);
    }
    function close_conection(){
        $this->conexion->close();
    }

    public function execute_single_query(){
        $this->open_connection();
        $this->conexion->query($this->query);
        $this->close_conection();
    }
    public function get_results_from_query(){
        $this->open_connection();
        $result =$this->conexion->query($this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->close_conection();
        array_pop($this->rows);
    }
}
?>