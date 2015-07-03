<?php

include_once '../../modelo/Reportes/modeloReportes.php';
session_start();
$param = array();

$param['anio']='';
$param['mes']='';
$param['turno']='';
$param['param_opcion']='';


if (isset($_POST['param_opcion']))
    $param['param_opcion'] = $_POST['param_opcion'];
if (isset($_POST['anio']))
    $param['anio'] = $_POST['anio'];
if (isset($_POST['mes']))
    $param['mes'] = $_POST['mes'];
if (isset($_POST['turno']))
    $param['turno'] = $_POST['turno'];

$Reportes=new ModeloReportes();
echo $Reportes->gestionar($param);
?>
