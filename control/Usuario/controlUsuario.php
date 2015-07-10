<?php

include_once '../../modelo/Usuario/modeloUsuario.php';
session_start();
$param = array();
$param['tipo']='';
$param['post']='';
$param['dni']='';
$param['apellidos']='';
$param['apellidoP']='';
$param['apellidoM']='';
$param['nombres']='';
$param['correo']='';
$param['rol']='';
$param['estado']='';
$param['user']='';
$param['codigoC']='';

$param['Mentrada']='';
$param['Msalida']='';
$param['Tentrada']='';
$param['Tsalida']='';
$param['Nentrada']='';
$param['Nsalida']='';

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

if (isset($_POST['Mentrada']))
    $param['Mentrada'] = $_POST['Mentrada'];
if (isset($_POST['Msalida']))
    $param['Msalida'] = $_POST['Msalida'];
if (isset($_POST['Tentrada']))
    $param['Tentrada'] = $_POST['Tentrada'];
if (isset($_POST['Tsalida']))
    $param['Tsalida'] = $_POST['Tsalida'];
if (isset($_POST['Nentrada']))
    $param['Nentrada'] = $_POST['Nentrada'];
if (isset($_POST['Nsalida']))
    $param['Nsalida'] = $_POST['Nsalida'];
if (isset($_POST['apellidoP']))
    $param['apellidoP'] = $_POST['apellidoP'];
if (isset($_POST['apellidoM']))
    $param['apellidoM'] = $_POST['apellidoM'];
if (isset($_POST['codigoC']))
    $param['codigoC'] = $_POST['codigoC'];

$Usuario=new ModeloUsuario();
echo $Usuario->gestionar($param);
?>
