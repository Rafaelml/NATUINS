<div id="sidebar-right">
	<?php
    require_once ("../controllers/controller/Controller.php");
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) && isset($_SESSION["idUser"])) {
	    echo Controller::viewPersonasDestacadasRegistrado($_SESSION['idUser']);
	}
	else{
	    echo Controller::viewPersonasDestacadas();
	}
    ?>
    <a href="nosotros.php">Sobre nosotros</a>
    <script>
        function realizaProceso(idUser){
            var parametros = {
                "idUser" : idUser
            };
            $.ajax({
                data:  parametros,
                url:   '../controllers/seguir.php',
                type:  'post',
                beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                    $("#idUser").html(response);
                }
            });
        }
    </script>

</div>
