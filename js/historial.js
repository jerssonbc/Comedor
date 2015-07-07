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

	var finicio=document.getElementById('txtfechaIn').value;
	var ffin=document.getElementById('txtfechaFin').value;
	
	if(finicio>ffin){
		alert('No puede seleccionar una fecha de fin menor '+ffin);
	}else{
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
	}

}

