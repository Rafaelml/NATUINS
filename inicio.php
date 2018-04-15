<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <div id="contenedor">
        <div id="cabecera">
            <div id="logo">
                <h1>NATUINS</h1>
            </div>
            <div id="navegador">
            <ul>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            </div>
        </div>

        <div id="sidebar-left">
            <a href="noimplem.html">Tendencias</a>
            <p>#MadridVSJuve</p>
            <p>#EsPenalti</p>
            <p>#CristianoTheBest</p>
        </div>

        <div id="contenido">
            <div id="tuins">
                <?php
                require_once ("UserNoR.php");
                $usuario = new UserNoR();
                $a =$usuario->viewTuins();
                $b =count($a);
                for ($i = 0; $i < $b; $i++) {
                    echo '<div id="tuin">';
                    echo '<p>' . $a[$i]["tuin"] . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <div id="sidebar-right">
            <a href="noimplem.html">Personas destacadas</a>
        </div>
    </div>
</body>
</html>