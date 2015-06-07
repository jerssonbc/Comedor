<?php

include_once '../../modelo/tipocomensal/modeloTipoComensal.php';

$param = array();
session_start();
$param['tipoComensal']='';
$param['param_opcion']='';


if (isset($_POST['param_opcion']))
    $param['param_opcion'] = $_POST['param_opcion'];

if (isset($_POST['tipoComensal']))
    $param['tipoComensal'] = $_POST['tipoComensal'];


$Asistencia=new ModeloAsistencia();
$res = $Asistencia->gestionar($param);
$devuelve = "";
if ($res['total'] > 0) {
    $datos = $res['datos'];
    $num = $res['total'];
    for ($i = 0; $i < $num; $i++) {
        $tipocomensal = $datos[$i];                
        $devuelve .= '<tr class="info">
                        <td>'.$tipocomensal['id'].'</td><td>'.$tipocomensal['descripcion'].'</td><td><input type="checkbox" name="tipocomensalEstado" value="'.$tipocomensal['estado'].'"></td>
                    </tr>';
    }
}
echo $devuelve;

?>

