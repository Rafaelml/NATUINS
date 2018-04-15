<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 12/4/18
 * Time: 19:47
 */
require_once ("UserR.php");
$usuario = new UserR();
$usuario->get(1);
print $usuario->menssage;
print "</br>";
print $usuario->getIdUser();
print "</br>";
print $usuario->getNick();
$usuario2 =new UserR();
$usuario_data = array('idUser'=>'','nick'=>'cuatro', 'pass'=>'ll', 'repass'=>'', 'email'=>'jkj', 'telefono'=>'4');
$usuario2->set($usuario_data);

print $usuario2->message;
$usuario3 =new UserR();
$usuario_data = array('idUser'=>'2','nick'=>'cuatro', 'pass'=>'ll', 'repass'=>'', 'email'=>'jkj', 'telefono'=>'4');
$usuario3->setCampos($usuario_data);
print $usuario3->message;
$usuario4 =new UserR();
$usuario4->del(38);
print $usuario4->message;
$usuario5 = new UserR();
$usuario5->init_Session('juan','juan');
print $usuario5->message;
$usuario6 = new UserR();
$a =$usuario6->viewTuins();
$b =count($a);
for ($i = 0; $i < $b; $i++) {
    echo $a[$i]["tuin"];
    echo '<br>';
}