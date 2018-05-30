function realizaProceso(valorCaja1){
    var parametros = {
        "valorCaja1" : valorCaja1,
        "valorCaja2" : valorCaja2
    };
    $.ajax({
        data:  parametros,
        url:   '../controllers/seguir.php',
        type:  'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
            $("#resultado").html(response);
        }
    });
}