<?php

require_once ("../controllers/controller/Controller.php");
class Miperfil
{
    private $user;
    public function _construct($user){
    $this->user =$user;

    }

    public function contenido($opcion,$user_data,$user,$idUser){
        echo '<div id="contenido">';

        if($idUser == $_SESSION['idUser']){

            if($opcion =='tuin'){
                echo Controller::viewYourTuins($user_data['idUser']);
            }
            elseif ($opcion=='megusta'){
                echo Controller::getMeGustaUserTuin($user_data['idUser']);
            }

            elseif ($opcion =='editarperfil'){
                        $name =Controller::getName($user);
                        $status =Controller::getStatus($user);
                        $telefono =Controller::getTelefono($user);
                        $img = Controller::getImg($user);

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

                        echo '<div id="tuin">
                               <p>Imagen: '.$img.' </p>
                               <form name="fichero" action="../controllers/controlerUpdatePerfil.php?controlador=editFoto" method="POST"
                               enctype="multipart/form-data">Imagen: <input id="imagen" type="file" name="archivo"/>
                               <input type="submit" value="Subir"></form></div>';
            }

            elseif($opcion == 'seguidores'){
                echo Controller::viewFollowers($user_data['idUser']);
            }

            elseif($opcion == 'seguidos'){
                echo Controller::viewFollowings($user_data['idUser']);
            }

        }
        else{
            if($opcion == "tuin") {
                echo Controller::viewYourTuins($user_data['idUser']);
            }

            else if($opcion == "seguidores"){
                echo Controller::viewFollowers($user_data['idUser']);
            }

            else if($opcion == "seguidos"){
                echo Controller::viewFollowings($user_data['idUser']);
            }
        }

        echo '</div>';
    }
    public function izq($user,$idUser){

        echo "<div id=\"sidebar-left\">";

        if($idUser == $_SESSION['idUser']){

            echo "<p>Imagen: ";
            echo Controller::getImg($user);
            echo "</p>";

            echo "<p>Nombre: ";
            echo Controller::getName($user);
            echo "</p>";

            echo "<p>Nick: ";
            echo Controller::getNick($user);
            echo "</p>";

            echo "<p>Status: ";
            echo Controller::getStatus($user);
            echo "</p>";

            echo "<p>Telefono: ";
            echo Controller::getTelefono($user);
            echo "</p>";

            echo '<div><form action="miperfil.php?opcion=editarperfil" method="POST">
                <button type="submit">Editar Perfil</button></form></div>';

       }

        else{
            echo "<p>Imagen: ";
            echo Controller::getImg($user);
            echo "</p>";

            echo "<p>Nombre: ";
            echo Controller::getName($user);
            echo "</p>";

            echo "<p>Nick: ";
            echo Controller::getNick($user);
            echo "</p>";

            echo "<p>Status: ";
            echo Controller::getStatus($user);
            echo "</p>";

            echo "<p>Telefono: ";
            echo Controller::getTelefono($user);
            echo "</p>";
        } 

        echo "</div>";
    }
    public function der($idUser, $user){

        echo"<div id='sidebar-right'>";
            $nick =Controller::getNick($user);
            echo '<ul>
                    <li><a href="miperfil.php?opcion=seguidores&caja='.$nick.'">Seguidores</a>';
            echo Controller:: getFollowers($user);
            echo"</li>";

            echo '<li><a href="miperfil.php?opcion=seguidos&caja='.$nick.'">Seguidos</a>';
            echo Controller:: getFollowings($user);
            echo"</li>";

            echo '</ul>';

            echo Controller::viewPersonasDestacadasRegistrado($idUser);

        echo"</div>";

    }
    public function navegador($user){
        $nick =Controller::getNick($user);
        echo'
        <div id="navegador">
            <ul>
                <li><a href="miperfil.php?opcion=tuin&caja='.$nick.'">Tuins</a></li>
                <li><a href="miperfil.php?opcion=megusta&caja='.$nick.'">Me Gusta</a></li>
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