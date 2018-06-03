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
                    obj = document.getElementById('notificaciones');
                    obj.style.backgroundColor = (obj.style.backgroundColor == 'rgb(204, 204, 204)') ? 'transparent' : '#CCCCCC';
                }
            }
        });
    }
    setInterval(realizaProceso, 1000);
});
