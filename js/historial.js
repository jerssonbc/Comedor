function historial(){
	$.ajax({
		type:'POST',
		data:{param_opcion:'listar'},
		url:'../control/Historial/controlHistorial.php',
		success:function(data){
			
			$('#historial').html(data);
		},
		error:function(data){
			alert(data+"Error al cargar");
		}
	});
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

