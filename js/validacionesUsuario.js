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
                alert( datos+" Error Fatal1");
            }
        });
}

function listarMenu11(tipo){
    
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
                alert(datos+" Error Fatal2");
            }
        });
}
function listarMenu22(tipo){
    
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
                alert(datos+" Error Fatal3");
            }
        });
}

function agregarTrabajador(){
    var bol=true;

    dni=$('#dni').val();
    apellidos=$('#apellidos').val();
    nombres=$('#nombres').val();
    correo=$('#correo').val();
    usuario=$('#usuario').val();
    password=$('#password').val();
    rol=$('#rol option:selected').val();
    if (dni=='') {bol=false;alert('Llenar DNI');};
    if ($('#dni').val().length!=8 && bol==true) { bol=false;alert('Tamaño 8 digitos en DNI');};
    if (apellidos=='' &&  bol==true) {bol=false;alert('Llenar Apellidos');};
    if (nombres=='' &&  bol==true) {bol=false;alert('Llenar nombres');};
    if (correo=='' &&  bol==true) {bol=false;alert('Llenar Correo');};
    if (usuario=='' &&  bol==true) {bol=false;alert('Llenar Usuario');};

   /// alert(dni+'::'+apellidos+'::'+nombres+'::'+correo+'::'+usuario+'::'+password+'::'+rol);
    if(bol){
        var vimagepath=window.uploadedImage.imagePath;
        //var archivos = document.getElementById("fotoUsuario");//Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
        //var archivo = archivos.files; //Obtenemos los archivos seleccionados en el imput
        //Creamos una instancia del Objeto FormDara.
        //var formData = new FormData($("#formulario")[0]);

        //var archivos = document.getElementById("fotoUsuario");//Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
        //var archivo = archivos.files; //Obtenemos los archivos seleccionados en el imput
        //Creamos una instancia del Objeto FormDara.
        //var archivos = new FormData();
        /* Como son multiples archivos creamos un ciclo for que recorra la el arreglo de los archivos seleccionados en el input
        Este y añadimos cada elemento al formulario FormData en forma de arreglo, utilizando la variable i (autoincremental) como 
        indice para cada archivo, si no hacemos esto, los valores del arreglo se sobre escriben*/
        //for(i=0; i<archivo.length; i++){
        //archivos.append('archivo'+i,archivo[i]); //Añadimos cada archivo a el arreglo con un indice direfente
        //}
        //alert(formData);
        $.ajax({
            type: "POST",
            data: {dni:dni,
                apellidos:apellidos,
                nombres:nombres,
                password:password,
                correo:correo,
                user:usuario,
                rol:rol,
                uploadedImagePath:vimagepath,
                param_opcion:'agregarTrabajador'},
                //contentType: false,
                //processData: false,
            url: "../control/Usuario/controlUsuario.php",
            //contentType: false,
            //processData: false,
            //cache: false,
            success: function(datos) {
                if (datos == '') {
                    alert("Error");
                } else {
                    alert(datos);
                }
            },
            error: function(datos) {
                alert( datos+" Error Fatal1");
            }
        });
    }
    
}
function agregarFoto(){
    /*var formData = new FormData($("#formulario")[0]);
                var ruta = "imagen-ajax.php";
                $.ajax({
                    url: "../control/Usuario/controlUsuario.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)
                    {
                        if (datos == '') {
                            alert("Error");
                        } else {
                            alert(datos);
                        }
                    },
                    error: function(datos) {
                        alert( datos+" Error Fatal1");
                    } 
                });*/

}

function listarRol(){
    $.ajax({
            type: "POST",
            data: {param_opcion:'listarRol'},
            url: "../control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    alert("Error");
                } else {
                    $('#rol').html(datos);
                }
            },
            error: function(datos) {
                alert( datos+" Error Fatal Rol");
            }
        });

}
function seleccion(idUsuario){
    $.ajax({
            type: "POST",
            data: {idUsuario:idUsuario,param_opcion:'seleccion'},
            url: "../control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    alert("Error");
                } else {
                    alert(datos);
                    $("#rolE option[value="+datos+"]").attr("selected",true);
                }
            },
            error: function(datos) {
                alert( datos+" Error Fatal Rol");
            }
        });

};
function listarRolE(){
    $.ajax({
            type: "POST",
            data: {param_opcion:'listarRol'},
            url: "../control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    alert("Error");
                } else {
                    $('#rolE').html(datos);
                }
            },
            error: function(datos) {
                alert( datos+" Error Fatal Rol");
            }
        });

}
function listarUsuarios(){
    $.ajax({
            type: "POST",
            data: {param_opcion:'listarUsuarios'},
            url: "../control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    $('#ListaUsuarios').html(datos);
                }
            },
            error: function(datos) {
                alert(datos+" Error Fatal3");
            }
     });
}
function cargarEditar(idUsuario)
{
    //alert(idUsuario);
    $.ajax({
            type: "POST",
            data: {idUsuario:idUsuario,param_opcion:'cargarEditar'},
            url: "../control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    $('#AreaEditar').html(datos);
                }
            },
            error: function(datos) {
                alert(datos+" Error Fatal3");
            }
     });
}
function editarTrabajador(){
    var bol=true;
    dni=$('#dniE').val();
    apellidos=$('#apellidosE').val();
    nombres=$('#nombresE').val();
    correo=$('#correoE').val();
    usuario=$('#usuarioE').val();
    password=$('#passwordE').val();
    idUsuario=$('#idE').val();
    rol=$('#rolE option:selected').val();
    if (dni=='') {bol=false;alert('Llenar DNI');};
    if ($('#dniE').val().length!=8 && bol==true) { bol=false;alert('Tamaño 8 digitos en DNI');};
    if (apellidos=='' &&  bol==true) {bol=false;alert('Llenar Apellidos');};
    if (nombres=='' &&  bol==true) {bol=false;alert('Llenar nombres');};
    if (correo=='' &&  bol==true) {bol=false;alert('Llenar Correo');};
    if (usuario=='' &&  bol==true) {bol=false;alert('Llenar Usuario');};

    //alert(dni+'::'+apellidos+'::'+nombres+'::'+correo+'::'+usuario+'::'+password+'::'+rol+'::'+idUsuario);
    if(bol){
        //var vimagepath=window.uploadedImage.imagePath;
        $.ajax({
            type: "POST",
            data: {dni:dni,
                apellidos:apellidos,
                nombres:nombres,
                password:password,
                correo:correo,
                user:usuario,
                idUsuario:idUsuario,
                rol:rol,
                //uploadedImagePath:vimagepath,
                param_opcion:'editarTrabajador'},
            url: "../control/Usuario/controlUsuario.php",
            success: function(datos) {
                if (datos == '') {
                    alert("Error");
                } else {
                    alert(datos);
                    listarUsuarios();
                    $('#compose-modal').modal('hide');
                }
            },
            error: function(datos) {
                alert( datos+" Error Fatal1");
            }
        });
    }
    
}


/*imagens cargado */
/*imagens cargado */
/*imagens cargado */
/*imagens cargado */
/*imagens cargado */
/*imagens cargado */
/*imagens cargado */
/*imagens cargado */

var loadingHtml = "Loading..."; // this could be an animated image
var imageLoadingHtml = "Image loading...";
var http = getXMLHTTPRequest();
      //----------------------------------------------------------------
        function uploadImage() {
        var uploadedImageFrame = window.uploadedImage;
          uploadedImageFrame.document.body.innerHTML = loadingHtml;
          // VALIDATE FILE
        var imagePath = uploadedImageFrame.imagePath;
        if(imagePath == null){
          imageForm.oldImageToDelete.value = "";
        }
        else {
          imageForm.oldImageToDelete.value = imagePath;
        }
        imageForm.submit();
      }
      //----------------------------------------------------------------
      function showImageUploadStatus() {
        var uploadedImageFrame = window.uploadedImage;
        if(uploadedImageFrame.document.body.innerHTML == loadingHtml){
          divResult.innerHTML = imageLoadingHtml;
        }
        else {
          var imagePath = uploadedImageFrame.imagePath;
          if(imagePath == null){
            divResult.innerHTML = "No uploaded image in this form.";
          }
          else {
            divResult.innerHTML = "Loaded image: " + imagePath;
          }
        }
      }
      //----------------------------------------------------------------
      function getXMLHTTPRequest() {
        try {
            xmlHttpRequest = new XMLHttpRequest();
        }
        catch(error1) {
            try {
            xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
          }
          catch(error2) {
            try {
                xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(error3) {
                xmlHttpRequest = false;
            }
          }
        }
        return xmlHttpRequest;
      }
      //----------------------------------------------------------------
      function sendData() {
        var url = "submitForm.php";
        var parameters = "imageDescription=" + dataForm.imageDescription.value;
        var imagePath = window.uploadedImage.imagePath;
        if(imagePath != null){
          parameters += "&uploadedImagePath=" + imagePath;
        }
        
        http.open("POST", url, true);
    
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.setRequestHeader("Content-length", parameters.length);
        http.setRequestHeader("Connection", "close");
    
        http.onreadystatechange = useHttpResponse;
        http.send(parameters);
      }
      //----------------------------------------------------------------
      function submitFormIfNotImageLoading(maxLoadingTime, checkingIntervalTime) {
        if(window.uploadedImage.document.body.innerHTML == loadingHtml) {
          if(maxLoadingTime <= 0) {
            divResult.innerHTML = "The image loading has timed up. "
                                + "Please, try again when the image is loaded.";
          }
          else {
            divResult.innerHTML = imageLoadingHtml;
            maxLoadingTime = maxLoadingTime - checkingIntervalTime;
            var recursiveCall = "submitFormIfNotImageLoading(" 
                              + maxLoadingTime + ", " + checkingIntervalTime + ")";
            setTimeout(recursiveCall, checkingIntervalTime);
          }
        }
        else {
          sendData();
        }
      }
        //----------------------------------------------------------------
      function submitForm() {
        var maxLoadingTime = 3000; // milliseconds
        var checkingIntervalTime = 500; // milliseconds
        submitFormIfNotImageLoading(maxLoadingTime, checkingIntervalTime);
      }
      //----------------------------------------------------------------
      function useHttpResponse() {
        if (http.readyState == 4) {
            if (http.status == 200) {
            divResult.innerHTML = http.responseText;
            dataForm.reset();
            imageForm.reset();
            window.uploadedImage.document.body.innerHTML = "";
            window.uploadedImage.imagePath = null;
            }
        }
      }


