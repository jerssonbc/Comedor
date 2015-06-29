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
            
            case "grabar":
                echo $this->grabar();
                break;
             case "entrar":
                echo $this->entrar();
                break;
            case "listarRol":
                echo $this->listarRol();
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
        
    }
    
}

?>