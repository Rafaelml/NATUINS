 <?php
        if(!isset($_SESSION['tipo']) ){
            echo "<div id=\"sidebar-left\">
                  <a href=\"noimplem.php\">Tendencias</a>
                  <p>#MadridVSJuve</p>
                  <p>#EsPenalti</p>
                  <p>#CristianoTheBest</p>
                  </div>";
        }
        elseif($_SESSION['tipo']=='usuario'){
            echo "<div id=\"sidebar-left\">
                  <a href=\"noimplem.php\">Tendencias</a>
                  <p>#MadridVSJuve</p>
                  <p>#EsPenalti</p>
                  <p>#CristianoTheBest</p>
                  </div>";
        }
        else{
            echo '<li><a href="contenido.php?$opcion=adminusuarios">Administrar Usuarios</a></li>';
            echo '<li><a href="contenedo.php?$opcion=adminTuins">Administrar Tuins</a></li>';
        }
?>