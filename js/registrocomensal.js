$(document).ready(function(){	
});
function loadEscuelas(){
        var vidfacultad=$('#idfacultad option:selected').val();
        $.ajax({
            type:'POST',
            data:{param_opcion:'loadEscuelas',id_facultad:vidfacultad},
            url:'../control/Comensal/controlComensal.php',
            success:function(data){
                $('#idEscuelas').html(data);
            },
            error:function(data){
                alert(data+"Error al cargar");
            }
        });
}
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

function loadFacultades(){
	$.ajax({
		type:'POST',
		data:{param_opcion:'loadFacultades'},
		url:'../control/Comensal/controlComensal.php',
		success:function(data){
			$('#idFacultades').html(data);
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
function loadProgramas2(){
	$.ajax({
		type:'POST',
		data:{param_opcion:'loadProgramas2'},
		url:'../control/Comensal/controlComensal.php',
		success:function(data){
			
			$('#idProgramas2').html(data);
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

    var vimagepath=window.uploadedImage.imagePath;
 
    if( vinstitucion=='0')
    	alert('Selection Intitucion');
    else{
    	if(vtipocomensal=='0')
    		alert("Seleccione Tipo Comensal");
    	else
    		if(vprograma=='0'){
    			alert("Seleccione Programa");
    		}else{
    			if(vimagepath==undefined)
    			{
    				alert("Seleccione su imagen Imagen");
    			}else{
    				$.ajax({
	                    type:'POST',
	                    url:'../control/Comensal/controlComensal.php',
	                    data:{param_opcion:'agregarComensal',
	                    		dni:vdni,apepaterno:vapepaterno,
	                    		apematerno:vapematerno,nombres:vnombres,
	                    		codigo_comensal:vcodigo_comensal,institucion:vinstitucion,
	                    		tipocomensal:vtipocomensal,programa:vprograma,
	                    		usuario:vusuario,password:vpassword,
	                    		uploadedImagePath:vimagepath
	                    		},
	                    success:function(data){
	                    	if(data=='OK'){
	                        	alert("Resgistro Exitoso");

		                        $('#addComensal').each (function(){
							  		this.reset();
								});
								doc = document.getElementById("uploadedImage");
								doc.contentDocument.body.innerHTML = "";

								$('#imageForm').each (function(){
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
}

function agregarComensaluunt(){
	var vdni=$('input[name=uudni]').val();
    var vapepaterno=$('input[name=uuapepaterno]').val();
    var vapematerno=$('input[name=uuapematerno]').val();
    var vnombres=$('input[name=uunombres]').val();
    var vcodigo_comensal=$('input[name=uucodigo_comensal]').val();

    var vfacultad=$('#idfacultad').val();
    var vescuela=$('#idescuela').val();

    var vprograma=$('#uuidprograma').val();

    var vusuario=$('input[name=uuusuario]').val();
    var vpassword=$('input[name=uupassword]').val();

    var vimagepath=window.uploadedImageuu.imagePath;
    
    if(vfacultad=='0'){
    	alert("Seleccione Facultad");
    }else{
    	if(vescuela=='0'){
    		alert("Seleccione Escuela");
    	}else{
    		if(vprograma=='0'){
				alert("Seleccione Programa");
			}else{
				if(vimagepath==undefined)
    			{
    				alert("Seleccione su imagen Imagen");
    			}else{
					$.ajax({
			            type:'POST',
			            url:'../control/Comensal/controlComensal.php',
			            data:{param_opcion:'agregarComensaluu',
			            		dni:vdni,apepaterno:vapepaterno,
			            		apematerno:vapematerno,nombres:vnombres,
			            		codigo_comensal:vcodigo_comensal,
			            		idfacultad:vfacultad,
			            		idescuela:vescuela,
			            		programa:vprograma,
			            		usuario:vusuario,password:vpassword,
			            		uploadedImagePath:vimagepath
			            		},
			            success:function(data){
			            	if(data=='OK'){
			                	alert("Resgistro Exitoso");
			                    $('#addComensaluu').each (function(){
							  		this.reset();
								});

								doc = document.getElementById("uploadedImageuu");
								doc.contentDocument.body.innerHTML = "";

								$('#imageFormuu').each (function(){
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