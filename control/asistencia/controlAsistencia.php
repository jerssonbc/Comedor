<?php

include_once '../../modelo/asistencia/modeloAsistencia.php';

$param = array();
session_start();
$param['codigo']='';
$param['param_opcion']='';


if (isset($_POST['param_opcion']))
    $param['param_opcion'] = $_POST['param_opcion'];

if (isset($_POST['codigo']))
    $param['codigo'] = $_POST['codigo'];


$Asistencia=new ModeloAsistencia();
$res = $Asistencia->gestionar($param);
$devuelve = "<div class='alert alert-warning' role='alert'>
		      <strong>Comensal No Registrado!</strong> Su codigo de acceso no se encuentra en nuestra base de datos, probablemente su periodo de servicio ya expiro!. 
		    </div>";
if ($res['total'] > 0) {
    $datos = $res['datos'];
    for ($i = 0; $i < count($datos); $i++) {
        $comensal = $datos[$i];                
        $devuelve = '<div class="form-group">                         
                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="'.$comensal['ape_paterno'].' '.$comensal['ape_maerno'].', '.$comensal['nombre'].'" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="escuela" class="col-sm-2 control-label">Escuela</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="escuela" value="'.$comensal['escuela'].'" id="escuela" disabled>
                </div>                  
            </div>
            <div class="form-group">
                <label for="matricula" class="col-sm-2 control-label">Matricula</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="matricula" id="matricula" value="'.$comensal['num_matricula'].'" disabled>
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
		    </div>';
    }
}
echo $devuelve;

?>

