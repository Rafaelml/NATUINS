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
            echo '<li><a href="index2.php">Administrar Usuarios</a></li>';
        }
         echo"</div>";
?>