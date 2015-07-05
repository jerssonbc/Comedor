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
function tablaDiariaPrograma(){

    
    anio = $("#anioPrograma  option:selected").val();
    mes = $("#mesPrograma  option:selected").val();
    
    //alert(anio+mes+turno);
    $.ajax({
            type: "POST",
            data: {param_opcion:'tablaDiariaPrograma',anio:anio,mes:mes},
            url: "../control/Reportes/controlReportes.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    $('#tablaDiariaPrograma').html(datos);
                    
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
function cargarGraficofusion()
{
    anio = $("#anioGrafico  option:selected").val();
    $.ajax({
            type: "POST",
            data: {param_opcion:'graficofusion',anio:anio,mes:mes,turno:turno},
            url: "../control/Reportes/controlReportes.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {    
                    var d=JSON.parse(datos);
                    FusionCharts.ready(function(){
                    var revenueChart = new FusionCharts({
                      type: "mscolumn2d",
                      renderAt: "chartContainer",
                      width: "900",
                      height: "500",
                      xAxisName:"casa",
                      yAxisName:"cosa",
                      dataFormat: "json",
                      dataSource: {
                    "chart": {
                        "caption": "Reportes  de Asistencia Vs Grafico del año "+anio,
                        "xAxisname": "MESES",
                        "yAxisName": "Asistencia",
                        "numberPrefix": "",
                        "plotFillAlpha": "80",
                        "exportenabled": "1",
                        "exportatclient": "0",
                        "exporthandler": "http://107.21.74.91/",
                        "html5exporthandler": "http://107.21.74.91/",
                        "paletteColors": "#0075c2,#1aaf5d,#1a0111",
                        "baseFontColor": "#333333",
                        "baseFont": "Helvetica Neue,Arial",
                        "captionFontSize": "14",
                        "subcaptionFontSize": "14",
                        "subcaptionFontBold": "0",
                        "showBorder": "0",
                        "bgColor": "#ffffff",
                        "showShadow": "0",
                        "canvasBgColor": "#ffffff",
                        "canvasBorderAlpha": "0",
                        "divlineAlpha": "100",
                        "divlineColor": "#999999",
                        "divlineThickness": "1",
                        "divLineIsDashed": "1",
                        "divLineDashLen": "1",
                        "divLineGapLen": "1",
                        "usePlotGradientColor": "0",
                        "showplotborder": "0",
                        "valueFontColor": "#ffffff",
                        "placeValuesInside": "1",
                        "showHoverEffect": "1",
                        "rotateValues": "1",
                        "showXAxisLine": "1",
                        "xAxisLineThickness": "1",
                        "xAxisLineColor": "#999999",
                        "showAlternateHGridColor": "0",
                        "legendBgAlpha": "0",
                        "legendBorderAlpha": "0",
                        "legendShadow": "0",
                        "legendItemFontSize": "10",
                        "legendItemFontColor": "#666666"
                    },
                    "categories": [
                        {
                            "category": [
                                {
                                    "label": "ENE"
                                },
                                {
                                    "label": "FEB"
                                },
                                {
                                    "label": "MAR"
                                },
                                {
                                    "label": "ABR"
                                },
                                {
                                    "label": "MAY"
                                },
                                {
                                    "label": "JUN"
                                },
                                {
                                    "label": "JUL"
                                },
                                {
                                    "label": "AGO"
                                },
                                {
                                    "label": "SET"
                                },
                                {
                                    "label": "OCT"
                                },
                                {
                                    "label": "NOV"
                                },
                                {
                                    "label": "DIC"
                                }
                            ]
                        }
                    ],
                    "dataset": d,
                    "trendlines": [
                        {
                            "line": [
                                {
                                    "startvalue": "12250",
                                    "color": "#0075c2",
                                    "displayvalue": "MAÑANA",
                                    "valueOnRight": "1",
                                    "thickness": "1",
                                    "showBelow": "1",
                                    "tooltext": "Previous year quarterly target  : $2.5K"
                                },
                                {
                                    "startvalue": "25950",
                                    "color": "#1aaf5d",
                                    "displayvalue": "TARDE",
                                    "valueOnRight": "1",
                                    "thickness": "1",
                                    "showBelow": "1",
                                    "tooltext": "Current year quarterly target  : $23K"
                                }
                            ]
                        }
                    ]
                }
                 
                  });
                  revenueChart.render("chartContainer");
                });

                    
                    
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
function cargarCirculoFusion(){

    anio = $("#anioCirculo  option:selected").val();
    mes = $("#mesCirculo  option:selected").val();
    turno = $("#turnoCirculo  option:selected").val();
    meses= ['ENERO','FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
    m=meses[mes-1];
    //alert(m);
    $.ajax({
            type: "POST",
            data: {param_opcion:'cargarCirculoFusion',anio:anio,mes:mes,turno:turno},
            url: "../control/Reportes/controlReportes.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    //$('#tablaDiaria').html(datos);
                    var d=JSON.parse(datos);
                    FusionCharts.ready(function () {
                    var revenueChart = new FusionCharts({
                        type: 'doughnut3d',
                        renderAt: 'chart-container2',
                        width: '450',
                        height: '300',
                        dataFormat: 'json',
                        dataSource: {
                            "chart": {
                                "caption": " Porcentaje de Asistencias por Programa",
                                "subCaption": " Mes:"+m+"   año: "+anio,
                                "numberPrefix": "$",
                                "paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
                                "bgColor": "#ffffff",
                                "showBorder": "0",
                                "use3DLighting": "0",
                                "showShadow": "0",
                                "exportenabled": "1",
                                "exportatclient": "0",
                                "exporthandler": "http://107.21.74.91/",
                                "html5exporthandler": "http://107.21.74.91/",
                                "enableSmartLabels": "0",
                                "startingAngle": "310",
                                "showLabels": "0",
                                "showPercentValues": "1",
                                "showLegend": "1",
                                "legendShadow": "0",
                                "legendBorderAlpha": "0",                                
                                "decimals": "0",
                                "captionFontSize": "14",
                                "subcaptionFontSize": "14",
                                "subcaptionFontBold": "0",
                                "toolTipColor": "#ffffff",
                                "toolTipBorderThickness": "0",
                                "toolTipBgColor": "#000000",
                                "toolTipBgAlpha": "80",
                                "toolTipBorderRadius": "2",
                                "toolTipPadding": "5",
                            },
                            "data": d
                        }
                    }).render();
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

function cargarGraficofusionDoble(){

    anio = $("#anioGraficoDoble  option:selected").val();

    $.ajax({
            type: "POST",
            data: {param_opcion:'GraficoProgramadoAsistencia',anio:anio},
            url: "../control/Reportes/controlReportes.php",
            success: function(datos) {
                if (datos == '') {
                    
                } else {
                    //$('#tablaDiaria').html(datos);
                    var d=JSON.parse(datos);
                    //alert(datos);
                    FusionCharts.ready(function () {
                    var revenueChart = new FusionCharts({
                        type: 'msstackedcolumn2dlinedy',
                        renderAt: 'chartContainer3',
                        width: '900',
                        height: '500',
                        dataFormat: 'json',
                        dataSource: {
                            "chart": {
                                "caption": "Asistencias-Faltas vs Meses",
                                "subcaption": "AÑO : "+anio,
                                "xAxisName": "MESES",
                                "pYAxisName": "ASISTENCIAS-FALTAS",
                                "exportenabled": "1",
                                "exportatclient": "0",
                                "exporthandler": "http://107.21.74.91/",
                                "html5exporthandler": "http://107.21.74.91/",
                                
                                //Cosmetics
                                "paletteColors": "#5598c3,#2785c3,#31cc77,#1aaf5d,#f45b00,#115b00",                
                                "baseFontColor" : "#333333",
                                "baseFont" : "Helvetica Neue,Arial",
                                "captionFontSize" : "14",
                                "subcaptionFontSize" : "14",
                                "subcaptionFontBold" : "0",
                                "showBorder" : "0",
                                "bgColor" : "#ffffff",
                                "showShadow" : "0",
                                "canvasBgColor" : "#ffffff",
                                "canvasBorderAlpha" : "0",
                               
                                "divlineColor" : "#999999",
                                "divlineThickness" : "1",
                                "divLineIsDashed" : "1",
                                "divLineDashLen" : "1",
                                "divLineGapLen" : "1",
                                "usePlotGradientColor" : "0",
                                "showplotborder" : "0",
                                "valueFontColor" : "#ffffff",
                                "placeValuesInside" : "1",
                                "showXAxisLine" : "1",
                                "xAxisLineThickness" : "1",
                                "xAxisLineColor" : "#999999",
                                "showAlternateHGridColor" : "0",
                                "legendBgAlpha" : "0",
                                "legendBorderAlpha" : "0",
                                "legendShadow" : "0",
                                "legendItemFontSize" : "10",
                                "legendItemFontColor" : "#666666"
                                
                            },
                            "categories": [
                                {
                                    "category": [
                                        { "label": "ENE" },
                                        { "label": "FEB" },
                                        { "label": "MAR" },
                                        { "label": "ABR" },
                                        { "label": "MAY" },
                                        { "label": "JUN" },
                                        { "label": "JUL" },
                                        { "label": "AGT" },
                                        { "label": "SET" },
                                        { "label": "OCT" },
                                        { "label": "NOV" },
                                        { "label": "DIC" }
                                    ]
                                }
                            ],
                            "dataset": d
                        }
                    });
                    
                    revenueChart.render();
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
