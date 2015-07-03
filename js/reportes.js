function tablaDiaria(){

    
    anio = $("#anio  option:selected").val();
    mes = $("#mes  option:selected").val();
    turno = $("#turno  option:selected").val();
    //alert(anio+mes+turno);
    $.ajax({
            type: "POST",
            data: {param_opcion:'tablaDiaria',anio:anio,mes:mes,turno:turno},
            url: "../control/Reportes/controlReportes.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    $('#tablaDiaria').html(datos);
                    
                }
            },
            error: function(datos) {
                alert(datos+" Error Fatal3");
            }
     });
}
function repetir(){
    //alert("ddd");
    timer = setTimeout("tablaDiaria()", 500);
    //tablaDiaria();
}
function cargarGrafico()
{
    $.ajax({
            type: "POST",
            data: {param_opcion:'grafico',anio:anio,mes:mes,turno:turno},
            url: "../control/Reportes/controlReportes.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    var d=JSON.parse(datos);
                    var bar = new Morris.Bar({
                    element: 'bar-chart',
                    resize: true,
                    data:d,
                    barColors: ['#00a65a', '#f56954', '#056354'],
                    xkey: "y",
                    ykeys: ['a', 'b','c'],
                    labels: ['MAÑANA', 'TARDE','NOCHE'],
                    hideHover: 'auto'
                })
                    
                    
                    //$('#bar-chart').html(datos);
                    //alert(datos);
                    
                }
            },
            error: function(datos) {
                alert(datos+" Error Fatal3");
            }
     });

  
}
function cargarCirculo(){

    anio = $("#anioCirculo  option:selected").val();
    mes = $("#mesCirculo  option:selected").val();
    turno = $("#turnoCirculo  option:selected").val();
    //alert(anio+mes+turno);
    $.ajax({
            type: "POST",
            data: {param_opcion:'cargarCirculo',anio:anio,mes:mes,turno:turno},
            url: "../control/Reportes/controlReportes.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    //$('#tablaDiaria').html(datos);
                    var d=JSON.parse(datos);
                    var donut = new Morris.Donut({
                    element: 'sales-chart',
                    resize: true,
                    colors: ["#3c8dbc", "#f56954", "#a0a65a","#fc8dbc", "#156954", "#00a65a"],
                    data: d,
                    hideHover: 'auto'
                });

                    
                }
            },
            error: function(datos) {
                alert(datos+" Error Fatal3");
            }
     });
    //DONUT CHART
     /*           var donut = new Morris.Donut({
                    element: 'sales-chart',
                    resize: true,
                    colors: ["#3c8dbc", "#f56954", "#a0a65a","#fc8dbc", "#156954", "#00a65a"],
                    data: [
                        {label: "Download Sales", value: 12},
                        {label: "In-Store Sales", value: 30},
                        {label: "Mail-Order Sales", value: 40}

                    ],
                    hideHover: 'auto'
                });*/

}

