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
    	$codigo=$this->param['codigo'];
    	$consultaSql="SELECT * FROM COMENSALES C INNER JOIN PROGRAMAS P ON C.programa_id=P.id WHERE codigo_comensal='".$codigo."' ";
    	$this->result = mysql_query($consultaSql);
        $datos = array();
        $datos = $this->obtenerCamposMultiples($this->result,array('id', 'ape_paterno', 'ape_maerno', 'nombre', 'escuela', 'num_matricula', 'descripcion'));
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