function registrarCronograma(){
  var xmlhttp;
  if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    }
  else
    {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("content").innerHTML=xmlhttp.responseText;      
      startTime();
      }
    }
  xmlhttp.open("GET","vista/registrarCronograma.php",true);
  xmlhttp.send();
}

function guardarCronogramaComensal() {
    idComensal=$('#idComensalCronograma').val();     
    numeroDias=$('#numeroDias').val();
    dia = new Array(numeroDias);
    for (var i = 1; i <= numeroDias ; i++) {
        dia[i]=$('#diaValor'+i).val();
        //alert("dia "+i+": "+dia[i]);
    };
//    alert(idComensal+"/"+numeroDias);
    
    var diaa = dia.toString();
      $.ajax({
          type: "POST",
          data: {idComensal,numeroDias,diaa,param_opcion:'registrar'},
          url: "control/cronograma/controlCronograma.php",
          success: function(datos) {
              if (datos == '') {
                  alert(datos+"Cronograma no registrado");
              } else {
                $("#mensajeCronograma").html(datos);
              }
          },
          error: function(datos) {
              alert( datos+" Error Fatal");
          }
      });
}

function seleccionarDiaCrono(id){
  opc=document.getElementById("diaValor"+id).value;
  if (opc==1) {
    document.getElementById("diaValor"+id).value="0";
    document.getElementById("dia"+id).style.background="#04A4BB";
  }else{
    document.getElementById("diaValor"+id).value="1";
    document.getElementById("dia"+id).style.background="#10BD04";
  }  
}