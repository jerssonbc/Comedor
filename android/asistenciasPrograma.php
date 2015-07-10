<?php

    $host="Localhost";
    $usuario="root";
    $password="";
    $db="dbcomedor";
    $idTurno=$_REQUEST['idTurno'];
    $mes=$_REQUEST['mes'];
    $year=$_REQUEST['year'];

    $c = @mysqli_connect($host, $usuario, $password,$db);
    /* comprueba la conexión */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql=mysqli_query($c,"SELECT p.descripcion,(SELECT count(c.id)as cantidad from comensales c 
        inner join asistencia a on c.id=a.comensal_id where c.programa_id=p.id and DATE_FORMAT(a.fecha,'%m')='".$mes."' and DATE_FORMAT(a.fecha,'%Y')='".$year."' and a.turno_id=".$idTurno.")as cantidad,(select count(c.id)as total from comensales c inner join asistencia a on c.id=a.comensal_id where DATE_FORMAT(a.fecha,'%m')='".$mes."' and DATE_FORMAT(a.fecha,'%Y')='".$year."' and a.turno_id=".$idTurno.")as Total from programas p");

    $datos=array(); 
    while($row=mysqli_fetch_row($sql)){
         $descripcion=$row[0];
         $cantidad=$row[1];
         $total=$row[2];
         $objeto= new stdClass();
         $objeto->cantidad=(int)($cantidad);
         $objeto->total=(int)($total);
         $objeto->descripcion=utf8_encode($descripcion);
         $datos[]=$objeto;         
    }
    echo json_encode($datos);
?>