

function agregarParametro()
{
	
	var vcodigo=$('input[name=codigo]').val();
	var vanio=$('input[name=panio]').val();
	var vdescripcion=$("input[name=pdescripcion]").val();

	var vfechainicio=Date($("input[name=fechainicio]").val())
	var vfechafin=Date($("input[name=fechafin]").val());



	$.ajax({
		type:'POST',
		url:'../control/parametros/procesoParametro.php',
		data:{
			param_opcion:'agregarParametro',
			codigo:vcodigo,anio:vanio,
			descripcion:vdescripcion,
			fechainicio:vfechainicio,
			fechafin:vfechafin
		},
		success:function(data){
			if(data=='OK'){
				alert("Registro éxitosso");
				$("#newparam-modal").modal("hide");
				$('#newparam-modal').each (function(){
							  		this.reset();
								});

			}else{
				alert("Errro al registrar datos: "+data);

			}
		},
		error: function(datos) {
                alert( "Error de procesamiento ",datos);
         }
	});

   
}