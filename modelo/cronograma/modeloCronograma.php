<?php
include_once '../../modelo/modeloConexion.php';

class ModeloCronograma{

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
                $resultadoCronograma = $this->registrarCronograma();
                break;    
        }
        return $resultadoCronograma;
    }
    function registrarCronograma() {
    	$this->cerrarAbrir();
    	$idComensal=$this->param['idComensal'];
        $numeroDias=$this->param['numeroDias'];
        $dia=$this->param['diaa'];
        $estadoDia = explode(',', $dia);
        $fecha="";
        for ($i=1; $i <= $numeroDias; $i++) {  
            $fecha=date("Y").'-'.date("m").'-'.str_pad($i, 2, "0", STR_PAD_LEFT);           
            $consultaSql="INSERT INTO cronogramas_servicio(fecha,estado,comensal_id) VALUES('".$fecha."',".$estadoDia[$i].",".$idComensal.") ";
            $this->result = mysql_query($consultaSql);
        }
        $resp['opcMensaje']= 1;        
        return $resp;
    }    
}

?>