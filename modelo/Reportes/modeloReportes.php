<?php
include_once '../../modelo/modeloConexion.php';
//include_once '../../js/bootstrap.min.js';
//include_once '../../js/AdminLTE/app.js';

class ModeloReportes{

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
            
            case "tablaDiaria":
                echo $this->tablaDiaria();
                break;
             case "grafico":
                echo $this->grafico();
                break;
            case "cargarCirculo":
                echo $this->cargarCirculo();
                break;
            case "seleccion":
                echo $this->seleccion();
                break;  
            case "agregarTrabajador":
                echo $this->agregarTrabajador();
                break; 
            case "listarMenu":
                echo $this->listarMenu();
                break; 
            case "listarUsuarios":
                echo $this->listarUsuarios();
                break;
            case "cargarEditar":
                echo $this->cargarEditar();
                break;
            case "cargarEditarComensal":
                echo $this->cargarEditarComensal();
                break; 
            case "editarTrabajador":
                echo $this->editarTrabajador();
                break;     
        }
    }
    function tablaDiaria(){

        $turno=$this->param['turno'];
        $month=$this->param['mes'];
        $year=$this->param['anio'];
        $month=(int)$month;
        $year=(int)$year;

        /*$this->cerrarAbrir();
        $consultaSql="";
        $this->result = mysql_query($consultaSql);
        if($this->result){
                //$cont=1;
                while($row=mysql_fetch_row($this->result)){
                }
        }*/
        $first_of_month = mktime (0,0,0, $month, 1, $year);
        $maxdays = date('t', $first_of_month);
        $fecha=date('Y-m-d');
         

        $fechita=date('w',strtotime($fecha));

        echo '<div class="box-body" id="ListaUsuarios">
                                                                <div class="box-header">
                                                                <h3 class="box-title">Comensales</h3>
                                                            </div><!-- /.box-header -->
                                                                <table class="table table-bordered table-striped" id="dataTables-comensales">
                                                                    <thead>
                                                                        
                                                                    <tr>
                                                                        
                                                                        <th>Fecha</th>
                                                                        <th>Platos Programados(PP)</th>
                                                                        <th>Comensales Asistidos(CA)</th>
                                                                        <th>Porcentaje % (CA/PP)</th>
                                                                        
                                                                    </tr>
                                                                    </thead>
                    <tbody>';


        for ($i=1; $i <=$maxdays ; $i++) { 
            # code...
            $fecha=$year.'/'.$month.'/'.$i;
            $dia=date('w',strtotime($fecha));


            if ($dia!=0) {
                # code...
                    $this->cerrarAbrir();
                    $consultaSql="SELECT count(id) from comensales  where estado=1 and created_at<=DATE_FORMAT('$fecha','%Y-%m-%d 00:00:00');";
                    $this->result = mysql_query($consultaSql);
                    if($this->result){
                            //$cont=1;
                            $row=mysql_fetch_row($this->result);
                            $total=$row[0];
                            $consultaSql="SELECT count(id) from asistencia where fecha='$fecha' and turno_id='$turno';";
                            $this->result = mysql_query($consultaSql);
                            if($this->result){
                                    //$cont=1;
                                    $row=mysql_fetch_row($this->result);
                                    $asistencia=$row[0];
                                    
                            }else{
                                $asistencia=0;
                            }

                    }else{
                        $total=0;
                        $asistencia=0;
                    }
                    if ($total==0) {
                        # code...
                        $total=1;
                    }
                
                    echo'<tr>
                                            
                                            <td>'.$fecha.'</td>
                                            <td>'.$total.'</td>
                                            <td>'.$asistencia.'</td>
                                            <td>
                                            <h3>
                                                    <small class="pull-right">'.number_format(($asistencia/$total)*100,2).'%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: '.(($asistencia/$total)*100).'%" role="progressbar" aria-valuenow="'.(($asistencia/$total)*100).'" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">'.(($asistencia/$total)*100).'% Complete</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>';



            }
        }


        
            echo    '</tbody>
                                        
                                    </table>
                                    ';

        echo '<script src="../js/dataTables.bootstrap.js" type="text/javascript"></script>
                  <script src="../js/jquery.dataTables.js" type="text/javascript"></script>

                  <script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
                  <script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>';
            echo "<script type='text/javascript'>
            $(document).ready(function(){
                
                $('#dataTables-comensales').dataTable();
                $('.knob').knob({
                });
                
                });
            </script>"; 

    }
    function grafico(){
        $year=2015;
        $datos=array();
        
        $meses=['ENE','FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGS', 'SET', 'OCT', 'NOV', 'DIC'];
        for ($i=1; $i <=12; $i++) { 
            # code...

            $this->cerrarAbrir();
                    $consultaSql="SELECT 
                            count(case when (a.turno_id=1) then a.id end )as MAANA,
                            count(case when (a.turno_id=2) then a.id end )as  TARDE,
                            count(case when (a.turno_id=3) then a.id end )as  NOCHE
                        from asistencia a where  DATE_FORMAT(a.fecha,'%m')=$i and DATE_FORMAT(a.fecha,'%Y')=$year";
                    $this->result = mysql_query($consultaSql);
                    if($this->result){
                            
                            $row=mysql_fetch_row($this->result);
                            $maniana=$row[0];
                            $tarde=$row[1];
                            $noche=$row[2];
                            $objeto= new stdClass();
                               $objeto->y=$meses[$i-1];
                               $objeto->a=(int)$maniana;
                               $objeto->b=(int)$tarde;
                               $objeto->c=(int)$noche;
                            $datos[]=$objeto;

                    }


        }
        echo json_encode($datos);  
    }

    function cargarCirculo(){

        $turno=$this->param['turno'];
        $month=$this->param['mes'];
        $year=$this->param['anio'];
        $month=(int)$month;
        $year=(int)$year;
        /*$*/
        $first_of_month = mktime (0,0,0, $month, 1, $year);
        $maxdays = date('t', $first_of_month);
        $fecha=date('Y-m-d');
         

        $fechita=date('w',strtotime($fecha));
        $datos=array();
        $this->cerrarAbrir();
        $consultaSql="SELECT p.descripcion,(SELECT count(c.id)as cantidad from comensales c 
    inner join asistencia a on c.id=a.comensal_id where c.programa_id=p.id and DATE_FORMAT(a.fecha,'%m')=$month and DATE_FORMAT(a.fecha,'%Y')=$year and a.turno_id=$turno)as cantidad,(select count(c.id)as total from comensales c inner join asistencia a on c.id=a.comensal_id where DATE_FORMAT(a.fecha,'%m')=$month and DATE_FORMAT(a.fecha,'%Y')=$year and a.turno_id=$turno)as Total from programas p";
        $this->result = mysql_query($consultaSql);
        if($this->result){ 
                while($row=mysql_fetch_row($this->result)){
                    $objeto= new stdClass();
                               $objeto->label=$row[0]."( %)";
                               if($row[2]!=0){
                                    $objeto->value=(int)(($row[1]/$row[2])*100);
                               }else{
                                    $objeto->value=0;
                               }
                            $datos[]=$objeto;
                }
        }

        return json_encode($datos);

    }
    
}

?>