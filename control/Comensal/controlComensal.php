<?php 
	include_once '../../modelo/Comensal/modeloComensal.php';
	$param=array();
	session_start();
	$param['param_opcion']='';
	$param['dni']='';
	$param['apepaterno']='';
	$param['apematerno']='';
	$param['nombres']='';
	$param['codigo_comensal']='';
	$param['institucion']='';
	$param['tipocomensal']='';
	$param['programa']='';
	$param['usuario']='';
	$param['password']='';
	$param['uploadedImagePath']='';

	if(isset($_POST['uploadedImagePath']))
		$param['uploadedImagePath']=$_POST['uploadedImagePath'];

	if(isset($_POST['param_opcion']))
		$param['param_opcion']=$_POST['param_opcion'];
	if(isset($_POST['dni']))
		$param['dni']=$_POST['dni'];
	if(isset($_POST['apepaterno']))
		$param['apepaterno']=$_POST['apepaterno'];
	if(isset($_POST['apematerno']))
		$param['apematerno']=$_POST['apematerno'];
	if(isset($_POST['nombres']))
		$param['nombres']=$_POST['nombres'];
	if(isset($_POST['codigo_comensal']))
		$param['codigo_comensal']=$_POST['codigo_comensal'];
	if(isset($_POST['institucion']))
		$param['institucion']=$_POST['institucion'];
	if(isset($_POST['tipocomensal']))
		$param['tipocomensal']=$_POST['tipocomensal'];
	if(isset($_POST['programa']))
		$param['programa']=$_POST['programa'];
	if(isset($_POST['usuario']))
		$param['usuario']=$_POST['usuario'];
	if(isset($_POST['password']))
		$param['password']=$_POST['password'];

	$Comensal=new ModeloComensal();
	echo $Comensal->gestionar($param);
 ?>