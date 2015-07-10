function historial(cod){
	$.ajax({
		type:'POST',
		data:{pag:cod,param_opcion:'listar'},
		url:'../control/Historial/controlHistorial.php',
		success:function(data){
			
			$('#historial').html(data);
		},
		error:function(data){
			alert(data+"Error al cargar");
		}
	});
}

function repetir(){
    //alert("ddd");
    timer = setTimeout("historial(1)",2000);
    //tablaDiaria();
}

function cronogHistorial(){
	$.ajax({
		type:'POST',
		data:{param_opcion:'cronograma'},
		url:'../control/Historial/controlHistorial.php',
		success:function(data){
			$('#cronogramaH').html(data);
		},
		error:function(data){
			alert(data+"Error al cargar");
		}
	});
}

function filtrar(){
	
	//var finicio=document.getElementById('txtfechaIn').value;
	//var ffin=document.getElementById('txtfechaFin').value;
	fechas=$('#reservation').val();
	b=0;
	entrar=0;
	finicio='';
	ffin='';
	for (var i = 0; i< fechas.length; i++) {
	         var caracter = fechas.charAt(i);
	         
	         
	         if (b==0) {
	         	finicio=finicio+caracter;
	         }else{
	         	ffin=ffin+caracter;
	         } 
	         if( caracter == "-" ) {
	            b=1;
	          } 
	    }
	finicio=$.trim(finicio.replace('-',''));
	ffin=$.trim(ffin);
	//alert(fechas+'::'+'::'+finicio+'::'+ffin);
	acceptInicio = validaFechaDDMMAAAA(finicio);
	
     if (!acceptInicio){
     	alert('Error en el formato Fecha Inicio');
     	entrar=1;
     }
     acceptFin = validaFechaDDMMAAAA(ffin);
     if (!acceptFin){
     	alert('Error en el formato Fecha Fin');
     	entrar=1;
     }	

	if (entrar==0) {
		finicio=cambiarFormato(finicio);
		ffin=cambiarFormato(ffin);
		$.ajax({
			type:'POST',
			data:{param_opcion:'filtrar',
				  inicio:finicio,fin:ffin},
			url:'../control/Historial/controlHistorial.php',
			success:function(data){
				$('#historial').html(data);
			},
			error:function(data){
				alert(data+"Error al cargar");
			}
		});

	};
		
	

}

function cambiarFormato(fecha){
	//01/07/2015
	var newfecha=fecha.substring(6)+'-'+fecha.substring(3,5)+'-'+fecha.substring(0,2);
	return newfecha;
}
function validaFechaDDMMAAAA(fecha){
	var dtCh= "/";
	var minYear=1900;
	var maxYear=2100;
	function isInteger(s){
		var i;
		for (i = 0; i < s.length; i++){
			var c = s.charAt(i);
			if (((c < "0") || (c > "9"))) return false;
		}
		return true;
	}
	function stripCharsInBag(s, bag){
		var i;
		var returnString = "";
		for (i = 0; i < s.length; i++){
			var c = s.charAt(i);
			if (bag.indexOf(c) == -1) returnString += c;
		}
		return returnString;
	}
	function daysInFebruary (year){
		return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
	}
	function DaysArray(n) {
		for (var i = 1; i <= n; i++) {
			this[i] = 31
			if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
			if (i==2) {this[i] = 29}
		}
		return this
	}
	function isDate(dtStr){
		var daysInMonth = DaysArray(12)
		var pos1=dtStr.indexOf(dtCh)
		var pos2=dtStr.indexOf(dtCh,pos1+1)
		var strDay=dtStr.substring(0,pos1)
		var strMonth=dtStr.substring(pos1+1,pos2)
		var strYear=dtStr.substring(pos2+1)
		strYr=strYear
		if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
		if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
		for (var i = 1; i <= 3; i++) {
			if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
		}
		month=parseInt(strMonth)
		day=parseInt(strDay)
		year=parseInt(strYr)
		if (pos1==-1 || pos2==-1){
			return false
		}
		if (strMonth.length<1 || month<1 || month>12){
			return false
		}
		if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
			return false
		}
		if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
			return false
		}
		if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
			return false
		}
		return true
	}
	if(isDate(fecha)){
		return true;
	}else{
		return false;
	}
}

