<?php
<<<<<<< HEAD
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 28/5/18
 * Time: 17:44
 */
=======

>>>>>>> master
require_once ("../controllers/controller/Controller.php");
class Miperfil
{
    private $user;
    public function _construct($user){
    $this->user =$user;

    }
    public function contenido($opcion,$user_data,$user){
        echo '<div id="contenido">';
        if($opcion =='tuin'){
            echo Controller::viewYourTuins($user_data['idUser']);
        }
        elseif ($opcion =='editarperfil'){
                    $name =Controller::getName($user);
                    $status =Controller::getStatus($user);
                    $telefono =Controller::getTelefono($user);

                    echo '<div id="tuin">
                           <p>Nombre: '.$name.' </p>
                           <form action="../controllers/controlerUpdatePerfil.php?controlador=editName" method="POST">
                     <textarea rows="1" cols="35" name="name"></textarea><p></p>
                    <button type="submit">Guardar</button></form></div>';

                    echo '<div id="tuin">
                           <p>Status: '.$status.' </p>
                           <form action="../controllers/controlerUpdatePerfil.php?controlador=editStatus" method="POST">
                           <textarea rows="1" cols="35" name="status"></textarea><p></p>
                           <button type="submit">Guardar</button></form></div>';

                    echo '<div id="tuin">
                           <p>Télefono: '.$telefono.' </p>
                           <form action="../controllers/controlerUpdatePerfil.php?controlador=editTelefono" method="POST">
                           <textarea rows="1" cols="35" name="telefono"></textarea><p></p>
                           <button type="submit">Guardar</button></form></div>';
        }

        echo '</div>';
    }
    public function izq($user){
        echo "<div id=\"sidebar-left\">";

        echo "<p>Nombre: ";
        echo Controller::getName($user);
        echo "</p>";

        echo "<p>Nick: ";
        echo Controller::getNick($user);
        echo "</p>";

        echo "<p>Status: ";
        echo Controller::getStatus($user);
        echo "</p>";

<<<<<<< HEAD
=======
        echo "<p>Telefono: ";
        echo Controller::getTelefono($user);
        echo "</p>";

>>>>>>> master
        echo '<div><form action="miperfil.php?opcion=editarperfil" method="POST">
            <button type="submit">Editar Perfil</button></form></div>';
        echo "</div>";
    }
<<<<<<< HEAD
    public function der($idUser){
        echo"<div id='sidebar-right'>";
        echo"Seguidores";
        echo "seguidos";
	        echo Controller::viewPersonasDestacadasRegistrado($idUser);
=======
    public function der($idUser, $user){
        echo"<div id='sidebar-right'>";
        echo '<ul>
                <li>Seguidores:';
        echo Controller:: getFollowers($user);
        echo"</li>";
        echo '<li>Seguidos:';
        echo Controller:: getFollowings($user);
        echo"</li>";
        echo '</ul>';
	    echo Controller::viewPersonasDestacadasRegistrado($idUser);
        echo"</div>";
>>>>>>> master
    }
    public function navegador(){
        echo'
        <div id="navegador">
            <ul>
                <li><a href="miperfil.php?opcion=tuin">Tuins</a></li>
                <li><a href="miperfil.php">Me Gusta</a></li>
                <li><a href="buscador.php">Buscador</a></li>
                <li><a href="noimplem.php">Mensajes</a></li>
            </ul>
        </div>';
    }
    public function cabecera(){
        echo'<div id="cabecera">
        <div id="logo">
            <h1><a href="index2.php" name="natuins">NATUINS</a></h1>
        </div>
    
        <div id="interUsuario">
            <ul>
				<li><a href="../controllers/logout.php" name="salir">Salir</a></li>
			</ul>
                </div>
            </div>';
    }

}