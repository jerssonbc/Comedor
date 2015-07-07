<?php

date_default_timezone_set("America/Lima");
class Conexion_Model {

    public static function getConexion() {
    
        $conexion = @mysql_connect("localhost","root","") or die("Conexion Fallida");
	@mysql_select_db("dbcomedor",$conexion)or die("Error cargando la base de datos");    
        return $conexion;

   //        $conexion = @mysql_connect("mysql.hostinger.es","u723575954_csunt","comedor123") or die("Conexion Fallida");
			// @mysql_select_db("u723575954_dbunt",$conexion)or die("Error cargando la base de datos");    
   //      return $conexion;


   //      $conexion = @mysql_connect("mysql13.000webhost.com","a1983462_csunt","comedor123") or die("Conexion Fallida");
			// @mysql_select_db("a1983462_comedor",$conexion)or die("Error cargando la base de datos");    
   //      return $conexion;
    }

}
?>