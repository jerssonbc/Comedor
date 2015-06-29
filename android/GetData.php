<?php

	$host="Localhost";
    $usuario="root";
    $password="";
    $db="dbcomedor";
 $c = @mysqli_connect($host, $usuario, $password,$db);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
  $sql=mysqli_query($c,"SELECT nombre,ape_paterno,ape_maerno,num_matricula,facultad,escuela from comensales");
  $datos=array();
  while($row=mysqli_fetch_object($sql)){
       $datos[] = $row;
  }
  echo json_encode($datos);
  ?>