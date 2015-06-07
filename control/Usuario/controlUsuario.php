<?php

include_once '../../modelo/Usuario/modeloUsuario.php';
session_start();
$param = array();
$param['tipo']='';
$param['post']='';
$param['user']='';
$param['password']='';
$param['idUsuario']=$_SESSION['idUsuario'];

$param['param_opcion']='';

if (isset($_POST['param_opcion']))
    $param['param_opcion'] = $_POST['param_opcion'];
if (isset($_POST['tipo']))
    $param['tipo'] = $_POST['tipo'];
if (isset($_POST['user']))
    $param['user'] = $_POST['user'];
if (isset($_POST['post']))
    $param['post'] = $_POST['post'];
if (isset($_POST['password']))
    $param['password'] = $_POST['password'];
if (isset($_POST['empresa']))
    $param['empresa'] = $_POST['empresa'];

$Usuario=new ModeloUsuario();
echo $Usuario->gestionar($param);
?>
