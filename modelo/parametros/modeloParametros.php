<?php 
include_once '../../modelo/modeloConexion.php';

class ModeloParametro
{
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

            case "agregarParametro":
                echo $this->agregarParametro();
                break;
                 
        }
    }
    function agregarParametro(){
    	$codigo=$this->param["codigo"];
    	$anio=$this->param["anio"];
    	$descripcion=$this->param["descripcion"];
    	$fechainicio=$this->param["fechainicio"];
    	$fechafin=$this->param["fechafin"];
    	$estado=1;
    	$consultaSql="INSERT into parametros(codigo,anio,descripcion,fecha_inicio,fecha_termino,estado) 
    		values('$codigo','$anio','$descripcion','fechainicio','$fechafin','$estado')";
    	$this->result=mysql_query($consultaSql);
    	if($this->result){
    		echo 'OK'
    	}else{
    		echo 'EPD';

    	}
    }
}

 ?>