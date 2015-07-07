

function agregarParametro()
{
	//alert("Estoy aca");
	var vcodigo=$('input[name=codigo]').val();
	var vanio=$('input[name=panio]').val();
	var vdescripcion=$("input[name=pdescripcion]").val();

	var vfechainicio=$("input[name=fechainicio]").val();
	var vfechafin=$("input[name=fechafin]").val();
	alert(vcodigo+'::'+vanio+'::'+vdescripcion+'::'+vfechainicio+'::'+vfechafin);
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
		success:function(datos){
			if(datos=='OK'){
				alert("Registro éxitoso"+datos);

			}else{
				alert("Errro al registrar datos: "+datos);

			}
		},
		error: function(datos) {
                alert( "Error de procesamiento ",datos);
         }
	});

   
}