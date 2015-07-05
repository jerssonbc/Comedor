<?php

include_once '../../modelo/cronograma/modeloCronograma.php';

$param = array();
session_start();
$param['idComensal']='';
$param['numeroDias']='';
$param['diaa']='';
$param['param_opcion']='';


if (isset($_POST['param_opcion']))
    $param['param_opcion'] = $_POST['param_opcion'];

if (isset($_POST['idComensal']))
    $param['idComensal'] = $_POST['idComensal'];

if (isset($_POST['numeroDias']))
    $param['numeroDias'] = $_POST['numeroDias'];

if (isset($_POST['diaa']))
    $param['diaa'] = $_POST['diaa'];


$Cronograma=new ModeloCronograma();
$res = $Cronograma->gestionar($param);
$devuelve = "";

if ($res['opcMensaje']==0) {
    $devuelve = "<div class='alert alert-warning' role='alert'>
              <strong>Cronograma No Registrado!</strong>  
            </div>";
}
if ($res['opcMensaje']==1) {
    $devuelve = "<div class='alert alert-success' role='alert'>
              <strong>Cronograma Registrado!</strong> Su cronograma de servicio ha sido registrado exitosamente!. 
            </div>";
}
echo $devuelve;

?>

