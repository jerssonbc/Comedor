<?php
include_once '../../modelo/modeloConexion.php';

class ModeloComensal{

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

            case "loadInstituciones":
                echo $this->loadInstituciones();
                break;
            case "loadTipoComensal":
                echo $this->loadTipoComensal();
                break;
            case "loadProgramas":
                echo $this->loadProgramas();
                break;
            case "agregarComensal":
                echo $this->agregarComensal();
                break;

            case "loadComensales":
                echo $this->loadComensales();
                break;

                  
        }
    }
    function agregarComensal(){
        $dni=$this->param['dni'];
        $apepaterno=$this->param['apepaterno'];
        $apematerno=$this->param['apematerno'];
        $nombres=$this->param['nombres'];
        $codigo_comensal=$this->param['codigo_comensal'];
        $institucion=$this->param['institucion'];
        $tipocomensal=$this->param['tipocomensal'];
        $programa=$this->param['programa'];
        $usuario = $this->param['usuario'];
        $password = $this->param['password'];
        $passwordMD5=md5($password);

        $estado=1;
        $fecha_exp=date("Y-m-d");
        $fecha_created=date("Y-m-d");
        $fecha_updated=date("Y-m-d");
        $consultaSql="INSERT INTO comensales(`dni`,`ape_paterno`,`ape_maerno`,`nombre`,`codigo_comensal`,`institucion_id`,`tipocomensal_id`,`programa_id`,`fecha_exp`,`estado`,`created_at`,`updated_at`)
            values ('$dni','$apepaterno','$apematerno',
                    '$nombres','$codigo_comensal',
                    '$institucion','$tipocomensal','$programa',
                    '$fecha_exp','$estado','$fecha_created','$fecha_updated')";

        $consultaexiste="SELECT count(*) FROM usuarios where usuario='$usuario' ";
        $this->result=mysql_query($consultaexiste);

        if ($this->result) {
            $rowexiste=mysql_fetch_row($this->result);
            if ($rowexiste[0]<1) {
                 $this->result=mysql_query($consultaSql);

                  if ($this->result) {
                        $consultaSql="select id from comensales where codigo_comensal=".$codigo_comensal;
                        $this->result=mysql_query($consultaSql);
                        if ($this->result) {
                            $row=mysql_fetch_row($this->result);

                            $consultaSql="INSERT INTO usuarios(usuario,password,estado, id_comensal)
                                 values ( '$usuario','$passwordMD5',1,".$row[0].")";

                            $this->result=mysql_query($consultaSql);
                                if ($this->result) {
                                    $consultaSql="SELECT id FROM usuarios where usuario='$usuario' and password='$passwordMD5'";
                                    $this->result=mysql_query($consultaSql);
                                    if($this->result)
                                    {
                                        $rowuserid=mysql_fetch_row($this->result);

                                        $consultaSql="INSERT INTO  usuario_rol(usuario_id,rol_id)
                                                         values (".$rowuserid[0].",3)";
                                        $this->result=mysql_query($consultaSql);
                                        if ($this->result) {
                                            
                                        }
                                    }
                                    echo 'OK';
                                }
                        }
                    }else{
                        echo 'EPC';//Error procesar comensales
                    }

            }else{
                echo 'EPU';//Error procesar usuario
            }
        }else{
            echo 'EPD';//Error procesar datos
        }

       
       

    }
    function loadInstituciones(){
        $this->cerrarAbrir();
        $consultaSql="SELECT id, descripcion FROM instituciones where estado=1";
        $this->result=mysql_query($consultaSql);

        if ($this->result) {
            echo '<label>Insitución</label>
                    <select class="form-control" id="idinstitucion"><option value="0">--Seleccionar--</option>';
            while ($row=mysql_fetch_row($this->result)) {
                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                # code...
            }
            echo '</select>';
        }
    }
    function loadTipoComensal(){
        $this->cerrarAbrir();
        $consultaSql="SELECT id, descripcion FROM tipos_comensal WHERE estado=1" ;
        $this->result=mysql_query($consultaSql);

        if ($this->result) {
            echo '<label>Tipo Comensal</label>
                <select class="form-control" id="idtipocomensal"><option value="0">--Seleccionar--</option>';
            while ($row=mysql_fetch_row($this->result)) {
                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                # code...
            }
            echo '</select>';
        }
    }
    function loadProgramas(){
        $this->cerrarAbrir();
        $consultaSql="SELECT id,descripcion FROM programas WHERE estado=1" ;
        $this->result=mysql_query($consultaSql);

        if ($this->result) {
            echo '<label>Programa</label>
                <select class="form-control" id="idprograma"><option value="0">--Seleccionar--</option>';
            while ($row=mysql_fetch_row($this->result)) {
                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                # code...
            }
            echo '</select>';
        }
    }
    
    function loadComensales(){
        $this->cerrarAbrir();
        $consultaSql="SELECT codigo_comensal,dni,ape_paterno,ape_maerno,nombre, p.descripcion FROM comensales c INNER JOIN programas p on c.programa_id=p.id ";
        $this->result = mysql_query($consultaSql);
        if($this->result){
                $cont=1;
            while($row=mysql_fetch_row($this->result)){
                echo '<tr>  
                            <td>'.$cont.'</td>
                            <td>'.$row[0].'</td>
                            <td>'.$row[1].'</td>
                            <td>'.$row[2].' '.
                                  $row[3].', '.$row[4].'</td>
                            <td>'.$row[5].'</td>';
                echo '</tr>';
                $cont++;
            }
        }

    }
   

    
}

?>