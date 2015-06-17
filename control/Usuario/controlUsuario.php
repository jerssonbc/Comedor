<?php

include_once '../../modelo/Usuario/modeloUsuario.php';
session_start();
$param = array();
$param['tipo']='';
$param['post']='';
$param['dni']='';
$param['apellidos']='';
$param['nombres']='';
$param['correo']='';
$param['rol']='';
$param['estado']='';
$param['user']='';
$param['uploadedImagePath']='';
//$param['foto1']='';
//$param['foto2']='';
$param['password']='';
$param['idUsuario']=$_SESSION['idUsuario'];

$param['param_opcion']='';

if (isset($_POST['param_opcion']))
    $param['param_opcion'] = $_POST['param_opcion'];
if (isset($_POST['tipo']))
    $param['tipo'] = $_POST['tipo'];
if (isset($_POST['dni']))
    $param['dni'] = $_POST['dni'];
if (isset($_POST['apellidos']))
    $param['apellidos'] = $_POST['apellidos'];
if (isset($_POST['nombres']))
    $param['nombres'] = $_POST['nombres'];
if (isset($_POST['correo']))
    $param['correo'] = $_POST['correo'];
if (isset($_POST['rol']))
    $param['rol'] = $_POST['rol'];
if (isset($_POST['estado']))
    $param['estado'] = $_POST['estado'];
if (isset($_FILES['fotosUsuario'])){
    $param['foto1'] = $_FILES['fotosUsuario']['name'];
	$param['foto2'] = $_FILES['fotosUsuario']['tmp_name'];
}
if (isset($_POST['user']))
    $param['user'] = $_POST['user'];
if (isset($_POST['post']))
    $param['post'] = $_POST['post'];
if (isset($_POST['password']))
    $param['password'] = $_POST['password'];
if (isset($_POST['idUsuario']))
    $param['idUsuario'] = $_POST['idUsuario'];

if(isset($_POST['uploadedImagePath']))
        $param['uploadedImagePath']=$_POST['uploadedImagePath'];

$Usuario=new ModeloUsuario();
echo $Usuario->gestionar($param);
?>
