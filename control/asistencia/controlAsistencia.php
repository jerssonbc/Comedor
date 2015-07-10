 <?php

include_once '../../modelo/asistencia/modeloAsistencia.php';

$param = array();
session_start();
$param['codigo']='';
$param['horaMarcado']='';
$param['param_opcion']='';
$param['soloHoraMarcado']='';
$param['p']='';

if (isset($_POST['param_opcion']))
    $param['param_opcion'] = $_POST['param_opcion'];

if (isset($_POST['codigo']))
    $param['codigo'] = $_POST['codigo'];

if (isset($_POST['horaMarcado']))
    $param['horaMarcado'] = $_POST['horaMarcado'];

if (isset($_POST['soloHoraMarcado']))
    $param['soloHoraMarcado'] = $_POST['soloHoraMarcado'];

if (isset($_POST['p']))
    $param['p'] = $_POST['p'];


$Asistencia=new ModeloAsistencia();
$res = $Asistencia->gestionar($param);
$devuelve = "";
if ($res['total'] > 0 and $res['totalValidacion']==0) {
    $datos = $res['datos'];

    for ($i = 0; $i < count($datos); $i++) {
        $comensal = $datos[$i];
        if ($_POST['p']==1) {
            $devuelve = '<div class="col-md-9"> 
        <div class="form-group">
                                
                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="'.$comensal['ape_paterno'].' '.$comensal['ape_maerno'].', '.$comensal['nombre'].'" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="escuela"  style="display:none;" class="col-sm-2 control-label">Escuela</label>
                <div class="col-sm-10">
                    <input type="text" style="display:none;" class="form-control" name="escuela" value="'.$comensal['escuela'].'" id="escuela" disabled>
                </div>                  
            </div>
            <div class="form-group">
                <label for="matricula"  style="display:none;" class="col-sm-2 control-label">Matricula</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" style="display:none;" name="matricula" id="matricula" value="'.$comensal['num_matricula'].'" disabled>
                </div>                              
            </div>
            <div class="form-group">    
                <label for="fechaRegistro" class="col-sm-2 control-label">Fecha Registro</label>
                <div class="col-sm-10">              
                    <input type="date" class="form-control" name="fechaRegistro" id="fechaRegistro" value="'.date("Y-m-d").'" disabled>
                </div>  
            </div>
            <div class="form-group">    
                <label for="programa" class="col-sm-2 control-label">Programa</label>
                <div class="col-sm-10">              
                    <input type="text" class="form-control" name="programa" id="programa" value="'.$comensal['descripcion'].'" disabled>
                </div>  
            </div><br>
            <div class="alert alert-success" role="alert">
              <strong>Asistencia Registrada!</strong> Su asistencia ha sido registrada exitosamente!. 
             </div>
                  </div>
                <div class="col-md-3">
                    <div class="thumbnail" 
                        style="width:200px; height:200px;
                         margin:5px 0px 0px 5px;">

                        <img src="uploads/'.$comensal['user_id'].'.png" alt="Img del Comensal">
                    </div>
                </div>
                <div style="clear:both;"></div>  
            ';
                            
                        }else{                
        $devuelve = '<div class="col-md-9"> 
        <div class="form-group">
                                
                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="'.$comensal['ape_paterno'].' '.$comensal['ape_maerno'].', '.$comensal['nombre'].'" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="escuela"  style="display:none;" class="col-sm-2 control-label">Escuela</label>
                <div class="col-sm-10">
                    <input type="text" style="display:none;" class="form-control" name="escuela" value="'.$comensal['escuela'].'" id="escuela" disabled>
                </div>                  
            </div>
            <div class="form-group">
                <label for="matricula" style="display:none;" class="col-sm-2  control-label">Matricula</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" style="display:none;" name="matricula" id="matricula" value="'.$comensal['num_matricula'].'" disabled>
                </div>                              
            </div>
            <div class="form-group">    
                <label for="fechaRegistro" class="col-sm-2 control-label">Fecha Registro</label>
                <div class="col-sm-10">              
                    <input type="date" class="form-control" name="fechaRegistro" id="fechaRegistro" value="'.date("Y-m-d").'" disabled>
                </div>  
            </div>
            <div class="form-group">    
                <label for="programa" class="col-sm-2 control-label">Programa</label>
                <div class="col-sm-10">              
                    <input type="text" class="form-control" name="programa" id="programa" value="'.$comensal['descripcion'].'" disabled>
                </div>  
            </div><br>
            <div class="alert alert-success" role="alert">
		      <strong>Asistencia Registrada!</strong> Su asistencia ha sido registrada exitosamente!. 
		     </div>
                  </div>
                <div class="col-md-3">
                    <div class="thumbnail" 
                        style="width:200px; height:200px;
                         margin:5px 0px 0px 5px;">

                        <img src="../uploads/'.$comensal['user_id'].'.png" alt="Img del Comensal">
                    </div>
                </div>
                <div style="clear:both;"></div>  
            ';
        }
    }
}
//Ya ha marcado asistencia para ese turno en ese dia
if ($res['total'] > 0 and $res['totalValidacion']<>0) {
    $devuelve = "<div class='alert alert-danger' role='alert'>
              <strong>Asistencia Ya marcada!</strong> Ya se ha marcado la asistencia para este dia en este turno!. 
            </div>";
}
if ($res['total']==0) {
    $devuelve = "<div class='alert alert-warning' role='alert'>
              <strong>Comensal No Registrado!</strong> Su codigo de acceso no se encuentra en nuestra base de datos, probablemente su periodo de servicio ya expiro!. 
            </div>";
}
if ($res['opcMensaje']== -1) {
    $devuelve = "<div class='alert alert-warning' role='alert'>
              <strong>No Disponible!</strong> No se encuentra dentro de las horas de atencion para alguno de los turnos!. 
            </div>";
}
echo $devuelve;

?>

