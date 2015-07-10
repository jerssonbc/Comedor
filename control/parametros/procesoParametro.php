<?php 
include_once '../../modelo/parametros/modeloParametros.php';
$param=array();
session_start();
$param['param_opcion']='';
$param['codigo']='';
$param['anio']='';
$param['descripcion']='';
$param['fechainicio']='';
$param['fechafin']='';

if(isset($_POST['codigo']))
		$param['codigo']=$_POST['codigo'];

if(isset($_POST['anio']))
		$param['anio']=$_POST['anio'];

if(isset($_POST['descripcion']))
		$param['descripcion']=$_POST['descripcion'];

if(isset($_POST['fechainicio']))
		$param['fechainicio']=$_POST['fechainicio'];

if(isset($_POST['param_opcion']))
		$param['param_opcion']=$_POST['param_opcion'];

if(isset($_POST['fechafin']))
		$param['fechafin']=$_POST['fechafin'];

$Parametro=new ModeloParametro();
echo $Parametro->gestionar($param);
 ?>