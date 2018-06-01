$(document).ready(function() {
    function realizaProceso(valorCaja1) {
        var parametros = {
            "valorCaja1": valorCaja1
        };
        $.ajax({
            data: parametros,
            url: '../controllers/notificaciones.php',
            type: 'post',
            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                if(response == 1) {
                    alert("Tiene Notificaciones");
                }
            }
        });
    }
    setInterval(realizaProceso, 1000);
});
