<?php

  $host="Localhost";
    $usuario="root";
    $password="";
    $db="dbcomedor";
    $idUsuario=$_REQUEST['idUsuario'];
 $c = @mysqli_connect($host, $usuario, $password,$db);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

  $sql=mysqli_query($c,"SELECT a.fecha,c.ape_paterno,c.ape_maerno,c.nombre,t.descripcion from 
    asistencia a inner join turnos t on a.turno_id=t.id inner join 
    comensales c on a.comensal_id=c.id inner join 
    usuarios u on c.id=u.id_comensal where u.id=".$idUsuario." order by a.fecha");


  $datos=array(); 
  $cont=0;
  while($row=mysqli_fetch_row($sql)){

       $fecha=$row[0];
       $ape_paterno=$row[1];
       $ape_maerno=$row[2];
       $nombre=$row[3];
       $descripcion=$row[4];
        $objeto= new stdClass();
       $objeto->fecha=$fecha;
       $objeto->ape_paterno=$ape_paterno;
       $objeto->ape_maerno=$ape_maerno;
       $objeto->nombre=$nombre;
       $objeto->descripcion=utf8_encode($descripcion);

       $datos[]=$objeto;
       $cont++;
       
  }
  /*
  $datos[]=array(
        "fecha"=>"17/06/2015",
        "ape_paterno"=>"Altamirano",
        "ape_maerno"=>"Guevara",
        "nombre"=>"Neyder",
        "descripcion"=>$idUsuario
      );*/
  echo json_encode($datos);
?>
