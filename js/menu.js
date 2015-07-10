function listarMenu1(tipo){
    
    $.ajax({
            type: "POST",
            data: {param_opcion:'listarMenu',tipo:tipo,post:'vista'},
            url: "../control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    //alert(datos+"Error");
                } else {
                    $('#listarMenu1').append(datos);
                }
            },
            error: function(datos) {
                alert(datos+" Error Fatal");
            }
        });
}
function listarMenu2(tipo){
    
    $.ajax({
            type: "POST",
            data: {param_opcion:'listarMenu',tipo:tipo,post:'vista'},
            url: "../control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    alert(datos+"Error");
                } else {
                    $('#listarMenu2').html(datos);
                }
            },
            error: function(datos) {
                alert(datos+" Error Fatal");
            }
        });
}