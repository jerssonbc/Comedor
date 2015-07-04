<?php

include_once '../../modelo/Historial/modeloHistorial.php';

$param = array();
session_start();
$param['codigo']='4';//codigo del comensal
$param['param_opcion']='';//metodo de listar



if (isset($_POST['param_opcion']))
    $param['param_opcion'] = $_POST['param_opcion'];
if (isset($_POST['pag']))
    $param['pag'] = $_POST['pag'];
/*
if (isset($_POST['codigo']))
    $param['codigo'] = $_POST['codigo'];
*/

$Historial=new ModeloHistorial();
echo $Historial->gestionar($param);
?>

