<div id="contenido">
<?php
    require_once ("../controllers/controller/Controller.php");
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) && isset($_SESSION['usuario']) != null){
	    if($_SESSION['tipo'] == 'usuario') {
	        echo '<h1>Bienvenido a Natuins ' . $_SESSION['usuario'] . '</h1>';
	        echo'<p>Escribe un tuin:</p><div id="mensaje">
			    <form action="../controllers/procesarTuin.php" method="post">
				<textarea rows="5" cols="68" name="tuin"></textarea>
				<p><input type="submit" name="login" value="Enviar"></p>
			    </form>
		        </div>';
	        echo'<div id="tuins">';
	        echo Controller::viewTuins($_SESSION['idUser']);
	        echo '</div>';
	    }
	    elseif($_SESSION['tipo'] == 'admin'){
            echo '<h1>Administrar Usuarios</h1>';
            echo Controller::obtUsers();
	    }
	}
	    else{
            /*echo'<div id="tuins">';
            echo Controller::viewTuins();
            </div>*/
            echo "<p> Queremos que nuestra aplicación web sea una red social con un estilo parecido al de “Twitter”, 
            donde los usuarios sean capaces de interactuar entre ellos, y contar lo que quieran (siempre que no ofendan a nadie).</p>";

            echo "<p> Se podrán seguir, comentar sus mensajes y poder darle a 'Me gusta' para acceder a ellos siempre que quieras
            desde tu perfil.
            Creemos que esta aplicación puede ser útil porque puede servir a la gente para desahogarse diciendo lo que piensa 
            y ver qué opina la gente al respecto, interactuando con el mensaje, por ejemplo.
            También podrán informarse de cosas que ocurren en el mundo y así poder estar al tanto de las cosas, 
            dado que habrá gente que informe sobre ello. </p>";

            echo "<p> A la hora de escribir un tuin, si nuestro sistema detectara palabras fuera de lugar, no se permitiría enviar
            el mensaje. Hacemos esto porque nos gustaría crear una comunidad en la que se pueda expresar libremente la opinion de cada uno
            sin la necesidad de faltar el respeto.</p>";

            echo "<p> Se podrá acceder al perfil de cada usuario mediante un buscador, para facilitar su busqueda 
            y asi poder ver sus tuins, ver sus seguidores y las personas que a las que sigue. Se podrá seguir y dejar de seguir 
            al usuario desde el perfil, al igual que se podrá ver su informacion tal como su nombre, su nick y su numero de telefono.</p>";

            echo "<p> Te animamos a que te unas a nuestra comunidad registrandote y puedas ver con tus propios ojos lo que hemos creado.
            </p>";
        }
	?>
</div>