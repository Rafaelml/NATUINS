<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/inicio.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="../added/js/jquery-3.3.1.min.js"></script>
    <script src="../added/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../added/js/validaciones.js"></script>
    <script type="text/javascript" src="../added/js/notificaciones.js"></script>a
</head>
<body>

<div id="contenedor">

    <?php include ('body/cabecera.php');?>
    <?php include ('body/navegador.php');?>
    <?php include ('body/sidebarIzq.php');?>


    <div id="contenido">
        <?php
        if(!isset($_SESSION)){
            session_start();
        }
        require_once ("../controllers/controller/Controller.php");
        echo Controller::viewNotificaciones($_SESSION["idUser"]);
        Controller::RevisarNotificaciones($_SESSION["idUser"]);
        ?>
    </div>

    <?php include('body/sidebarDer.php'); ?>

</div>
</body>
</html>