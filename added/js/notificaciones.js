function realizaProceso(valorCaja1){
    var parametros = {
        "valorCaja1" : valorCaja1
    };
    $.ajax({
        data:  parametros,
        url:   '../controllers/seguir.php',
        type:  'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
            if(response == "alerta"){
                document.getElementById(valorCaja1).value="Esperando...";
            }
        }
    });
}