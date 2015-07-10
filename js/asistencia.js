function registrarAsistencia(post){
  //alert(post);
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
    if (post=='index') {
      xmlhttp.open("GET","vista/view_asistencia.php?p=1",true);
    }else{
      xmlhttp.open("GET","view_asistencia.php?p=2",true);
    };
  
  xmlhttp.send();
}

function registrarAsistenciaComensal(p) {
    if (p==1) {
        urls="control/asistencia/controlAsistencia.php"
    }else{
        urls="../control/asistencia/controlAsistencia.php"
    };
    codigo=$('#codigo').val();     
    horaMarcado=$('#horaMarcado').val(); 
    soloHoraMarcado=$('#soloHoraMarcado').val();
      $.ajax({
          type: "POST",
          data: {codigo,horaMarcado,soloHoraMarcado,p,param_opcion:'registrar'},
          url: urls,
          success: function(datos) {
              if (datos == '') {
                  alert(datos+"Comensal no registrado");
                  $('#codigo').val('');
                  $("#codigo").focus(); 
              } else {
                  
                  $("#datosAsistencia").html(datos);
                  $('#codigo').val('');
                  $("#codigo").focus();  
              }
          },
          error: function(datos) {
              alert( datos+" Error Fatal");
          }
      });
}

///////////////////////////////////////////////////////////////////////////////////////////////

function tipoComensal(post){
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
      }
    }
    if (post=='index') {
      xmlhttp.open("GET","vista/view_registrarTipoComensal.php",true);
    }else{
      xmlhttp.open("GET","view_registrarTipoComensal.php",true);
    };
  xmlhttp.send();
}

function registrarTipoComensal() {
    tipoComensal=$('#nombreTC').val();     
      $.ajax({
          type: "POST",
          data: {tipoComensal,param_opcion:'registrar'},
          url: "control/tipocomensal/controlTipoComensal.php",
          success: function(datos) {
              if (datos == '') {
                  alert(datos+"Tipo Comensal no registrado");
              } else {
                  $("#registrosComensal").html(datos);
              }
          },
          error: function(datos) {
              alert( datos+" Error Fatal");
          }
      });
}

function startTime(){
    today=new Date();
    h=today.getHours();
    m=today.getMinutes();
    s=today.getSeconds();
    m=checkTime(m);
    s=checkTime(s);
    document.getElementById('horaMarcado').value=h+":"+m+":"+s;
    document.getElementById('soloHoraMarcado').value=h;
    document.getElementById('reloj').innerHTML=h+":"+m+":"+s;
    t=setTimeout('startTime()',500);
}
function checkTime(i)
{
  if (i<10) {i="0" + i;}return i;
}