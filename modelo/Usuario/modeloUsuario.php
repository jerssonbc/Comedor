<?php
include_once '../../modelo/modeloConexion.php';
//include_once '../../js/bootstrap.min.js';
//include_once '../../js/AdminLTE/app.js';

class ModeloUsuario{

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
            
            case "grabar":
                echo $this->grabar();
                break;
             case "entrar":
                echo $this->entrar();
                break; 
                case "listarMenu":
                echo $this->listarMenu();
                break;     
        }
    }
    function grabar() {
    	/*$this->cerrarAbrir();
    	$User=$this->param['user'];
    	$password=$this->param['password'];
    	$empresa=$this->param['empresa'];
    	$ruc=$this->param['ruc'];
    	$direccion=$this->param['direccion'];
    	$consultaSql="INSERT INTO `usuario`( `usu_nick`, `usu_clave`, `usu_estado`) VALUES ('$User','$password',1)";
    	$this->result = mysql_query($consultaSql);
    	$rs = mysql_query("SELECT @@identity AS idUsuario");
    	if ($row = mysql_fetch_row($rs)) {
			$idUsuario = trim($row[0]);
		}
        if($this->result){
        	$this->cerrarAbrir();
        	$consultaSql="INSERT INTO `empresa`( `nombre`, `ruc`, `direccion`, `idUsuario`) VALUES ('$empresa','$ruc','$direccion','$idUsuario')";
    		$this->result = mysql_query($consultaSql);
    		if($this->result){
    			header("Location:../vista/login.php");
    		}else{
    			header("Location:../vista/register.php");
    		}
        	
        }else
        {
        	header("Location:../vista/register.php");
        }*/
    }
    function entrar()
    {
    	$this->cerrarAbrir();
    	$User=$this->param['user'];
    	$password=$this->param['password'];
    	$consultaSql="SELECT u.id,u.usuario,u.password FROM usuarios u  where u.usuario='$User' and u.password='$password' ";
    	$this->result = mysql_query($consultaSql);
    	echo mysql_num_rows($this->result);
    	if(mysql_num_rows($this->result)==1){
    		session_start();
    		$row=mysql_fetch_row($this->result);
    		$_SESSION['idUsuario'] = $row[0];
            //$_SESSION['nombre'] = $row[1];
            $_SESSION['user'] = $row[1];
            header("Location:../../index.php");
    	}else{
    		header("Location:../../vista/login.php");
    	}
    }
    function listarMenu(){

        $usuario=$this->param['idUsuario'];
        $tipo=$this->param['tipo'];
        //echo "hola";
        if ($this->param['post']!='index') {
            # code...
            $post='../';
        }else{
            $post='';
        }

        $this->cerrarAbrir();
        $consultaSql="SELECT m.padre,m.nombre,m.url FROM menus m 
                        inner join rol_menu rm on m.id=rm.menu_id 
                        inner join roles r on r.id=rm.rol_id
                        inner join usuario_rol ur on r.id=ur.rol_id WHERE ur.usuario_id='$usuario' ";
        $this->result = mysql_query($consultaSql);
        if($this->result){
                //$cont=1;
                while($row=mysql_fetch_row($this->result)){

                    if($row[0]==$tipo){
                        
                            echo '<li><a href="'.$post.$row[2].'"><i class="fa fa-angle-double-right"></i>'.$row[1].'</a></li>';   
                
                }
            
            }
            if ($tipo==2) {
                echo '<li><a onclick="registrarAsistencia()" style="cursor:pointer;"><i class="fa fa-angle-double-right"></i> REGISTRAR ASISTENCIA</a></li>
                                <li><a onclick="tipoComensal()()" style="cursor:pointer;"><i class="fa fa-angle-double-right"></i> REGISTRAR TIPO COMENSAL</a></li>';

            }
            
    }
}

    
}

?>