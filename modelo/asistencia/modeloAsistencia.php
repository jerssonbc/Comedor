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
        $hora=$this->param['horaMarcado'];
        $soloHora=$this->param['soloHoraMarcado'];
    	$consultaSql="SELECT c.id,c.ape_paterno,c.ape_maerno,
                c.nombre,c.escuela,c.num_matricula,p.descripcion,u.id as user_id FROM
         COMENSALES C INNER JOIN PROGRAMAS P ON C.programa_id=P.id
         inner join  usuarios u on c.id=u.id_comensal 
         WHERE codigo_comensal='".$codigo."' ";
    	$this->result = mysql_query($consultaSql);

        $datos = $this->obtenerCamposMultiples($this->result,
            array('id', 'ape_paterno', 'ape_maerno', 'nombre', 'escuela', 'num_matricula', 'descripcion','user_id'));
        $resp['total'] = count($datos);
        $turno=0;
        $resp['opcMensaje']= 0;

        $this->cerrarAbrir();
        $consultaSql="SELECT hora_inicio,hora_fin from turnos";
        $this->result = mysql_query($consultaSql);
        $horaInicio=array();
        $horaFin=array(); 
        $i=0;
        while($row=mysql_fetch_row($this->result)){
            $horaInicio[$i]=$row[0];
            $horaFin[$i]=$row[1];
            $i=$i+1;
        }

        if (($soloHora>=$horaInicio[0]) && ($soloHora<$horaFin[0])) {
            $turno=1;
        }
        if (($soloHora>=$horaInicio[1]) && ($soloHora<$horaFin[1])) {
            $turno=2;
        }
        if (($soloHora>=$horaInicio[2]) && ($soloHora<$horaFin[2])) {
            $turno=3;
        }
        if ($turno==0) {
            $resp['opcMensaje']= -1;
        }
        if ($resp['total']>0) {
            $consultaSql2="SELECT * FROM ASISTENCIA 
            WHERE comensal_id='".$datos[0]["id"]."' and turno_id=".$turno.
                            " and fecha='".date("Y-m-d")."' ";
            $res2 = mysql_query($consultaSql2);
            $validar = $this->obtenerCamposMultiples($res2,array('id'));
            $respV['total'] = count($validar);
            $resp['totalValidacion'] = count($validar);
            if ($resp['total']>0 and $respV['total']==0) {
                if ($turno>0) {
                    $consulta = "INSERT INTO ASISTENCIA (`id`, `fecha`, `comensal_id`, `turno_id`) 
                    VALUES (null,now(),".$datos[0]["id"].",".$turno.")";
                    $this->result = mysql_query($consulta);                    
                }  
            }        
        }
        $resp['datos'] = $datos;
        return $resp;
    }

    function obtenerCamposMultiples($consulta,$campos) {
        $datos3=array();

        if(count($campos) > 0){
            while($fila=mysql_fetch_array($consulta)){
                $datosFila=array();
                for($i=0; $i<count($campos); $i++){
                    if(array_key_exists($campos[$i], $fila)){
                        $datosFila[$campos[$i]]=$fila[$campos[$i]];
                    }
                }
                array_push($datos3, $datosFila);
            }
        }

        return $datos3;
    }
    
}

?>