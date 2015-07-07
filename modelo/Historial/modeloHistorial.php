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
                //$resultadoHistorial = $this->consultarHistorial();
                $resultadoHistorial = $this->consultarHistorialEdgar();
                break;
            case "cronograma":
                $resultadoHistorial = $this->cronogramaHistorial();
                break;
            case "filtrar":
                $resultadoHistorial = $this->filtrar();
                break;
        }
        return $resultadoHistorial;
    }
    function consultarHistorial() {
    	$this->cerrarAbrir();
    	$codigo=$this->param['codigo'];
        $pag=$this->param['pag'];
            $it=date('d');
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
            for ($i=1; $i<=$it; $i++) {
                if($i<=3 && $pag==1){
                        if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                }else{
                    if($pag==2 && $i>3 && $i<=6){
                        if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                }else{
                       if($pag==3 && $i>6 && $i<=9){
                           if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                }else{
                       if($pag==4 && $i>9 && $i<=12){
                        if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                       }else{
                           if($pag==5 && $i>12 && $i<=15){
                            if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                           }else{
                               if($pag==6 && $i>15 && $i<=18){
                                if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                               }else{
                                   if($pag==7 && $i>18 && $i<=21){
                                    if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                                   }else{
                                        if($pag==8 && $i>24 && $i<=27){
                                            if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                                        }else{
                                            if($pag==9 && $i>27 && $i<=30){
                                                if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                                           }else{
                                            if($pag==10 && $i>30){
                                                if($it==$fil && $i==1){
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
                    }else{
                        if(($it-1)==$fil && $i==1){
                            $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                            $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                            echo '<tr><td rowspan="2" valign="middle">'.$fecha.'</td>';
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
                        }else{
                            if(($it-2)==$fil && $i==1){
                                $fecha=(date("d")-$i+1).'-'.(date("m")).'-'.(date("Y"));
                                $fechaformt=(date("Y").'-'.(date("m")).'-'.(date("d")-$i+1));
                                echo '<tr><td rowspan="1" valign="middle">'.$fecha.'</td>';
                                echo '<td>Mañana</td>';
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
                    }
                    if($i>=2){
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
                                           }
                                        }
                                   }
                               }
                           }
                       }
                     }
                    }
                }

            }
    }
    function consultarHistorialEdgar(){
        $this->cerrarAbrir();
        $codigo=$this->param['codigo'];
        $month=6;
        $year=2015;
        $first_of_month = mktime (0,0,0, $month, 1, $year);
        $maxdays = date('t', $first_of_month);
        $fecha=date('Y-m-d');
        $programas=array(0,0,0,0,0,0);
        echo '<table  class="table table-bordered table-striped" id="tablita">
                        <thead align="center">
                            <td>FECHA</td>
                            <td>MAÑANA</td>
                            <td>TARDE</td>
                            <td>NOCHE</td>
                        </thead>
                        <tbody align="center" >';

        for ($i=1; $i <=$maxdays ; $i++) { 
            # code...
            $fecha=$year.'/'.$month.'/'.$i;
            $dia=date('w',strtotime($fecha));


            if ($dia!=0) {
                # code...
                echo '<tr><td>'.$fecha.'</td>';
                        for ($u=1; $u <=3 ; $u++) { 
                            # code...
                        
                            
                                $consultaSql2="SELECT a.id from asistencia a where a.turno_id=$u and a.fecha='".$fecha."' and a.comensal_id='$codigo'";
                                $this->result = mysql_query($consultaSql2);
                                if($this->result){

                                        $dato=mysql_fetch_row($this->result);
                                        if ($dato[0]) {
                                            # code...
                                            echo '<td>Asistió</td>';
                                        }else{
                                            echo '<td>Faltó</td>';

                                        }

                                            # code...
                                        
                                        
                                        
                                }else{
                                    
                                }

                        }
                        echo '</tr>';
                       
             }         
        }
        echo '

                        </tbody>
                    </table>';
        echo '<script src="../js/dataTables.bootstrap.js" type="text/javascript"></script>
            <script src="../js/jquery.dataTables.js" type="text/javascript"></script>';
            echo "<script type='text/javascript'>
            $(document).ready(function(){
                
                $('#tablita').dataTable();

                
                });
            </script>"; 

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

    function filtrar(){
        $this->cerrarAbrir();
        $codigo=$this->param['codigo'];
        $Inicio=$this->param['inicio'];
        $fin=$this->param['fin'];
        $consultaSql="SELECT * FROM asistencia WHERE fecha between '".$inicio."' and '".$fin."' and comensal_id='".$codigo."'";
        $this->result=mysql_query($consultaSql);
        $dato=mysql_fetch_row($this->result);
        echo "string";
        if(mysql_num_rows($this->result)){
            echo '<tr><td>'.$dato[1].'</td>
                  <td>'.$dato[2].'</td>
                  <td>'.$dato[3].'</td></tr>';
        }
    }
}

?>