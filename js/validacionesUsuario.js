function cargar() {

    name=$('#name').val();
    user=$('#user').val();
    password=$('#password').val();
     
        $.ajax({
            type: "POST",
            data: {name,user,password,param_opcion:'grabar'},
            url: "../control/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    alert(datos+"Error");
                } else {
                    alert(datos+" Correcto");
                }
            },
            error: function(datos) {
                alert( datos+" Error Fatal");
            }
        });
}

function listarMenu1(tipo){
    
    $.ajax({
            type: "POST",
            data: {param_opcion:'listarMenu',tipo:tipo,post:'index'},
            url: "control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    $('#listarMenu1').html(datos);
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
            data: {param_opcion:'listarMenu',tipo:tipo,post:'index'},
            url: "control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    $('#listarMenu2').html(datos);
                }
            },
            error: function(datos) {
                alert(datos+" Error Fatal");
            }
        });
}



