<?php
require_once ("controller/Controller.php");
//$privacidad = htmlspecialchars(trim(strip_tags($_REQUEST['privacidad'])));
if(isset($_REQUEST)){
    if(!isset($_SESSION)){
        session_start();
    }
    $user = Controller::getUser($_SESSION['idUser']);

    if($_REQUEST['controlador'] =="editName"){
        $name = htmlspecialchars(trim(strip_tags($_REQUEST['name'])));
        Controller::updateName($name,$user);
    }
    elseif ($_REQUEST['controlador']=="editStatus"){
        $status = htmlspecialchars(trim(strip_tags($_REQUEST['status'])));
        Controller::updateStatus($status,$user);
    }
    elseif ($_REQUEST['controlador']=="editTelefono"){
        $telefono = htmlspecialchars(trim(strip_tags($_REQUEST['telefono'])));
        Controller::updateTelefono($telefono,$user);
    }
    elseif ($_REQUEST['controlador']=="editPass"){
        $password = htmlspecialchars(trim(strip_tags($_REQUEST['pass'])));
        Controller::updatePass($password,$user);
    }
    else{
        $nombre_img = $_FILES['archivo']['name'];
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        //Controller::updateImg($nombre_img,$user);
        //Si existe imagen y tiene un tamaño correcto
        if (($nombre_img == !NULL) && ($_FILES['archivo']['size'] <= 200000))
        {
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["archivo"]["type"] == "image/gif")
                || ($_FILES["archivo"]["type"] == "image/jpeg")
                || ($_FILES["archivo"]["type"] == "image/jpg")
                || ($_FILES["archivo"]["type"] == "image/png"))
            {
                // Ruta donde se guardarán las imágenes que subamos
                $directorio = $_SERVER['DOCUMENT_ROOT'].'/natuins/views/img/';
                // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                move_uploaded_file($_FILES['archivo']['tmp_name'],$directorio.$nombre_img);
            }
            else
            {
                //si no cumple con el formato
                echo "No se puede subir una imagen con ese formato ";
            }
        }
        else
        {
            //si existe la variable pero se pasa del tamaño permitido
            if($nombre_img == !NULL) echo "La imagen es demasiado grande ";
        }
            }

            Controller::updateImg($nombre_img,$user);
    header("Location: ../views/miperfil.php?opcion=editarperfil");
}

?>