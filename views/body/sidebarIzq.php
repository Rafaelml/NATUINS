 <?php
        echo "<div id=\"sidebar-left\">";
        if(!isset($_SESSION['tipo']) ){
            echo "<a href=\"noimplem.php\">Tendencias</a>
                  <p>#MadridVSJuve</p>
                  <p>#EsPenalti</p>
                  <p>#CristianoTheBest</p>";
        }
        elseif($_SESSION['tipo']=='usuario'){
            echo "<a href=\"noimplem.php\">Tendencias</a>
                  <p>#MadridVSJuve</p>
                  <p>#EsPenalti</p>
                  <p>#CristianoTheBest</p>";

        }
        else{
            echo '<li><a href="contenido.php?$opcion=adminusuarios">Administrar Usuarios</a></li>';
            echo '<li><a href="contenedo.php?$opcion=adminTuins">Administrar Tuins</a></li>';
        }
         echo"</div>";
?>