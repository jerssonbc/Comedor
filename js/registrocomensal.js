function loadInstitucion(){
	$.ajax({
		type:'POST',
		data:{param_opcion:'loadInstituciones'},
		url:'../control/Comensal/controlComensal.php',
		success:function(data){
			
			$('#idInstituciones').html(data);
		},
		error:function(data){
			alert(data+"Error al cargar");
		}
	});
}

function loadTipoComensal(){
	$.ajax({
		type:'POST',
		data:{param_opcion:'loadTipoComensal'},
		url:'../control/Comensal/controlComensal.php',
		success:function(data){
			
			$('#idTipoComensales').html(data);
		},
		error:function(data){
			alert(data+"Error al cargar");
		}
	});
}

function loadProgramas(){
	$.ajax({
		type:'POST',
		data:{param_opcion:'loadProgramas'},
		url:'../control/Comensal/controlComensal.php',
		success:function(data){
			
			$('#idProgramas').html(data);
		},
		error:function(data){
			alert(data+"Error al cargar");
		}
	});
}

function agregarComensal(){
	//event.preventDefault();
   
    var vdni=$('input[name=dni]').val();
    var vapepaterno=$('input[name=apepaterno]').val();
    var vapematerno=$('input[name=apematerno]').val();
    var vnombres=$('input[name=nombres]').val();
    var vcodigo_comensal=$('input[name=codigo_comensal]').val();
    var vinstitucion=$('#idinstitucion').val();
    var vtipocomensal=$('#idtipocomensal').val();
    var vprograma=$('#idprograma').val();

    var vusuario=$('input[name=usuario]').val();
    var vpassword=$('input[name=password]').val();

    if( vinstitucion=='0')
    	alert('Selection Intitucion');
    else{
    	if(vtipocomensal=='0')
    		alert("Seleccione Tipo Comensal");
    	else
    		if(vprograma=='0'){
    			alert("Seleccione Programa");
    		}else{
    			$.ajax({
                    type:'POST',
                    url:'../control/Comensal/controlComensal.php',
                    data:{param_opcion:'agregarComensal',
                    		dni:vdni,apepaterno:vapepaterno,
                    		apematerno:vapematerno,nombres:vnombres,
                    		codigo_comensal:vcodigo_comensal,institucion:vinstitucion,
                    		tipocomensal:vtipocomensal,programa:vprograma,
                    		usuario:vusuario,password:vpassword
                    		},
                    success:function(data){
                    	if(data=='OK'){
                        	alert("Resgistro Exitoso");

	                        $('#addComensal').each (function(){
						  		this.reset();
							});
	                    }else{
	                    	if(data=='EPC'){
	                    		alert("Fallo el registro del comensal ");
	                    	}else{
	                    		if(data=='EPU'){
	                    			alert("Usuario elegido ya exites, fallo registro");
	                    		}else{
	                    			alert("Error al Procesar Datos");
	                    		}
	                    	}
	                    	
	                    }
                                        
                    }
          		  });

    		}
    	}

}

function loadComensales(){

	$.ajax({
		type:'POST',
		data:{param_opcion:'loadComensales'},
		url:'../control/Comensal/controlComensal.php',
		success:function(data){
			
			$('#bcomensales').html(data);
		},
		error:function(data){
			alert(data+"Error al cargar");
		}
	});

}