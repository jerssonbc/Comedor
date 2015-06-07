<?php

date_default_timezone_set("America/Lima");
class Conexion_Model {

    public static function getConexion() {
    
        $conexion = @mysql_connect("localhost","root","") or die("Conexion Fallida");
	@mysql_select_db("dbcomedor",$conexion)or die("Error cargando la base de datos");    
        return $conexion;
    }

}
?>