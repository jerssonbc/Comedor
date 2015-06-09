<?php
include_once '../../modelo/modeloConexion.php';

class ModeloHistorial{

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
            case "listar":
                $resultadoHistorial = $this->consultarHistorial();
                break;
            case "cronograma":
                $resultadoHistorial = $this->cronogramaHistorial();
                break;
        }
        return $resultadoHistorial;
    }
    function consultarHistorial() {
    	$this->cerrarAbrir();
    	$codigo=$this->param['codigo'];
            $fil=date('d');
            $hora=date('H');
            if($hora>=7 && $hora<12){
                $fil=$fil-2;
            }else{
                if($hora>=12 && $hora<19){
                    $fil--;
                }else{
                    if($hora>=19 && $hora<=21){
                        $fil;
                    }        
                }
            }
            for ($i=1; $i<=$fil; $i++) {
                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                echo '<tr><td rowspan="3" valign="middle">'.$fecha.'</td>';
                echo '<td>Noche</td>';
                $consultaSql="SELECT * FROM ASISTENCIA  where comensal_id='".$codigo."' 
                            and fecha='".$fechaformt."' and turno_id='3'";
                $this->result = mysql_query($consultaSql);
                if(mysql_num_rows($this->result))
                    echo '<td>Asistió</td>';
                else
                    echo '<td>Faltó</td>';
                echo '</tr>';

                echo '<tr>
                    <td>Tarde</td>';
                    $consultaSql2="SELECT * FROM ASISTENCIA  where comensal_id='".$codigo."' 
                            and fecha='".$fechaformt."' and turno_id='2'";
                    $this->result = mysql_query($consultaSql2);
                    if(mysql_num_rows($this->result))
                        echo '<td>Asistió</td>';
                    else
                        echo '<td>Faltó</td>';
                echo '</tr>
                <tr>
                    <td>Mañana</td>';
                    $consultaSql3="SELECT * FROM ASISTENCIA  where comensal_id='".$codigo."' 
                            and fecha='".$fechaformt."' and turno_id='1'";
                    $this->result = mysql_query($consultaSql3);
                    if(mysql_num_rows($this->result))
                        echo '<td>Asistió</td>';
                    else
                        echo '<td>Faltó</td>';
                echo '</tr>';       
            }
    }

    function cronogramaHistorial(){
        $this->cerrarAbrir();
        $codigo=$this->param['codigo'];
        $consultaSql="SELECT cs.fecha,cc.dias_habiles FROM cronogramas_comensal cc inner join 
        cronogramas_servicio cs on cc.comensal_id=cs.comensal_id where cc.comensal_id='".$codigo."'";
        $this->result=mysql_query($consultaSql);
        $dato=mysql_fetch_row($this->result);
        $finicio=$dato[0];
        $anho=substr($finicio,0,4);
        $mes=substr($finicio,5,2);
        $dia=substr($finicio,8,2);
        $fechaformt=$dia.'-'.$mes.'-'.$anho;
        $fechafin=$dato[1].'-'.$mes.'-'.$anho;
        if(mysql_num_rows($this->result)){
            echo '<h3>Fecha de Inicio de Programa:'.$fechaformt.
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Fecha de Fin de Programa:'.$fechafin.'
              </h3>';
        }
    }
}

?>