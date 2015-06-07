<?php
include_once '../../modelo/modeloConexion.php';

class ModeloAsistencia{

    private $param = array();
    private $conexion = null;
    private $result = null;

    function __construct() {
        $this->conexion = Conexion_Model::getConexion();
    }
    function cerrarAbrir()
    {
        mysql_close($this->conexion);
        $this->conexion = Conexion_Model::getConexion();
    }
    function gestionar($param) {
        $this->param = $param;
        switch ($this->param['param_opcion']) {            
            case "registrar":
                $resultadoAsistencia = $this->consultarRegistrar();
                break;    
        }
        return $resultadoAsistencia;
    }
    function consultarRegistrar() {
    	$this->cerrarAbrir();
    	$tipoComensal=$this->param['tipoComensal'];
    	$consultaSql="INSERT INTO `tipos_comensal`(`id`, `descripcion`, `estado`) VALUES (null,'".$tipoComensal."',1) ";
    	$this->result = mysql_query($consultaSql);
        $consultaSql="SELECT * FROM tipos_comensal ";
        $this->result = mysql_query($consultaSql);
        $datos = array();
        $datos = $this->obtenerCamposMultiples($this->result,array('id', 'descripcion', 'estado'));
        $resp['total'] = count($datos);
        $resp['datos'] = $datos;
        return $resp;
    }

    function obtenerCamposMultiples($consulta,$campos) {
        $datos=array();

        if(count($campos) > 0){
            while($fila=mysql_fetch_array($consulta)){
                $datosFila=array();
                for($i=0; $i<count($campos); $i++){
                    if(array_key_exists($campos[$i], $fila)){
                        $datosFila[$campos[$i]]=$fila[$campos[$i]];
                    }
                }
                array_push($datos, $datosFila);
            }
        }
        return $datos;
    }
    
}

?>