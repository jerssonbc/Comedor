<?php
  $con=mysqli_connect('localhost', 'root', '', 'dbcomedor');
  $User=$_REQUEST['usuario'];
  $password=$_REQUEST['pass'];
  $passwordM5=md5($password);
  $consultaSql="SELECT u.id,u.usuario,u.password FROM usuarios u  where u.usuario='".$User."' and u.password='".$passwordM5."' ";
  $result = mysqli_query($con,$consultaSql);
  if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_row($result);
    $resultado[]=array("logstatus"=>"1","id"=>$row[0],);
  }else{
    $resultado[]=array(
      "logstatus"=>"0",
      "id"=>"0",
      );
  }
  echo json_encode($resultado);
?>