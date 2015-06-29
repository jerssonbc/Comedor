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
    function agregarTrabajador(){

        $dni=$this->param['dni'];
        $apellidos=$this->param['apellidos'];

        $nombres=$this->param['nombres'];
        //$foto1=$this->param['foto1'];
        //$foto2=$this->param['foto2'];
        $correo=$this->param['correo'];
        $rol=$this->param['rol'];
        $usuario = $this->param['user'];
        $password = $this->param['password'];
        $passwordMD5=md5($password);

        $fecha_created=date("Y-m-d");
        $fecha_updated=date("Y-m-d");
        $consultaSql="INSERT INTO trabajador(`dni`,`apellidos`,`nombres`,`correo`,`estado`,`created_at`,`updated_at`)
            values ('$dni','$apellidos',
                    '$nombres','$correo',1,'$fecha_created','$fecha_updated')";
         $consultaexiste="SELECT count(*) FROM usuarios where usuario='$usuario' ";
        $this->result=mysql_query($consultaexiste);
        if ($this->result) {
            $rowexiste=mysql_fetch_row($this->result);
            if ($rowexiste[0]<1) {
                $this->result=mysql_query($consultaSql);
                if ($this->result) {
                    $consultaSql="SELECT @@identity AS id";
                    $this->result=mysql_query($consultaSql);
                    if ($this->result) {
                        $row=mysql_fetch_row($this->result);
                        $consultaSql="INSERT INTO usuarios(usuario,password,estado,id_trabajador)
                                     values ( '$usuario','$passwordMD5',1,".$row[0].")";
                        $this->result=mysql_query($consultaSql);
                        if ($this->result) {
                            $consultaSql="SELECT id FROM usuarios where usuario='$usuario' and password='$passwordMD5'";
                                    $this->result=mysql_query($consultaSql);
                                    if($this->result)
                                    {
                                        $rowuserid=mysql_fetch_row($this->result);

                                        $consultaSql="INSERT INTO  usuario_rol(usuario_id,rol_id)
                                                         values (".$rowuserid[0].",'$rol')";
                                        $this->result=mysql_query($consultaSql);
                                        if ($this->result) {
                                            
                                            $pathToMove = "../../uploads/";
                                            $imagePathParameterName = "uploadedImagePath"; 
                                            $imagePath = '../'.$this->param[$imagePathParameterName];
                                                //&& (file_exists($imagePath))
                                            if (($imagePath != null) ) 
                                                { 
                                                 // $imagePathToMove = $pathToMove . basename($imagePath); 
                                                   $info=pathinfo($imagePath);

                                                  $imagePathToMove = $pathToMove .$rowuserid[0].'.png';//$info['extension'];

                                                  if(file_exists($imagePathToMove)) { 
                                                    unlink($imagePathToMove); 
                                                  } 
                                                  if(rename($imagePath, $imagePathToMove)) { 

                                                    //$consultaSql="update usuarios set imagen='foto".$rowuserid[0]."' where id=".$rowuserid[0];
                                                    //$this->result=mysql_query($consultaSql);
                                                    //if($this->result){

                                                    //}
                                                    //echo "The image " . $imagePathToMove . " was stored with the description '" . $description . "'."; 
                                                  } 
                                                  else { 
                                                    //echo "There was an error moving the file " . $imagePath . " to " . $imagePathToMove; 
                                                  } 
                                                } 
                                                else { 
                                                  //echo "No image was uploaded for the description '" . $description . "'."; 
                                                } 
                                            echo 'Registro Exitoso!';
                                        }
                                    }
                        }else{
                        echo 'Error al Registrar usuario';
                        }
                    }else{
                        echo 'Error al consultar ID Trabajador';
                    }
                    
                }else{
                    echo 'Error al Insertar Trabajador';
                }
                    
                
                
                
            }
        }else{
            echo 'Error al consultar existencia de usuario';
        }


    }
    function listarRol(){
        $this->cerrarAbrir();
        $consultaSql="SELECT id,descripcion from ROLES where estado=1 and id!=3";
        $this->result = mysql_query($consultaSql);
        if($this->result){
                //$cont=1;
                while($row=mysql_fetch_row($this->result)){
                            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
            }         
        }

    }
    function seleccion(){
        $idUsuario=$this->param['idUsuario'];
        $this->cerrarAbrir();
        $consultaSql="SELECT u.id,u.usuario,ur.rol_id from usuarios u 
                                inner join usuario_rol ur on u.id=ur.usuario_id where u.estado=1 and u.id='$idUsuario'";
        $this->result = mysql_query($consultaSql);
        if($this->result){
            $row=mysql_fetch_row($this->result);
            echo $row[2];   
        }

    }

    function entrar()
    {
    	$this->cerrarAbrir();
    	$User=$this->param['user'];
    	$password=$this->param['password'];
        $passwordM5=md5($password);
    	$consultaSql="SELECT u.id,u.usuario,u.password FROM usuarios u  where u.usuario='$User' and u.password='$passwordM5' ";
    	$this->result = mysql_query($consultaSql);
    	echo mysql_num_rows($this->result);
    	if(mysql_num_rows($this->result)==1){
    		session_start();
    		$row=mysql_fetch_row($this->result);
    		$_SESSION['idUsuario'] = $row[0];
            //$_SESSION['nombre'] = $row[1];
            $_SESSION['user'] = $row[1];
            header("Location:../../index");
    	}else{
    		header("Location:../../vista/login");
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
function listarUsuarios(){

    $this->cerrarAbrir();
        $consultaSql="SELECT u.id,u.usuario,t.dni,concat(t.apellidos,' ',t.nombres) from usuarios u inner join trabajador t 
                                on u.id_trabajador=t.id where u.estado=1 and u.id_trabajador is not null";
        $this->result = mysql_query($consultaSql);
        if($this->result){
                //$cont=1;
        
         
        //echo $show_path_photo_car;

            echo '<div class="box-body" id="ListaUsuarios">
                                                                <div class="box-header">
                                                                <h3 class="box-title">Trabajadores</h3>
                                                            </div><!-- /.box-header -->
                                                                <table class="table">
                                                                    <thead>
                                                                        
                                                                    <tr>
                                                                        <th style="width: 10px">#</th>
                                                                        <th>Usuario</th>
                                                                        <th>Dni</th>
                                                                        <th>Apellidos y Nombre</th>
                                                                        <th>Opciones</th>
                                                                        
                                                                    </tr>
                                                                    </thead>
                    <tbody id="bcomensales">';
                while($row=mysql_fetch_row($this->result)){


                    $link_photo_car = "../uploads/".$row[0].".png"; 

                    
     
                        if (file_exists("../../uploads/".$row[0].".png")) 
                        { 
                            $show_path_photo_car = $link_photo_car; // Photo unavailable 
                        } 
                        else 
                        { 
                            $show_path_photo_car ="../uploads/imgdefecto.png";
                        }
                           echo '<tr>
                                            <td><div class="pull-left image"><img src="'.$show_path_photo_car.'" style="width:35px;heigth:35px;" /></div></td>
                                            <td>'.$row[1].'</td>
                                            <td>'.$row[2].'</td>
                                            <td>'.$row[3].'</td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#compose-modal" onClick="cargarEditar('.$row[0].');listarRolE();"><icon class="glyphicon glyphicon-pencil"></button>
                                                <button class="btn btn-danger"><icon class="glyphicon glyphicon-trash"></button>
                                            </td>
                                        </tr>';
            }
            echo    '</tbody>
                                        
                                    </table>';     
        }
        $this->cerrarAbrir();
        $consultaSql="SELECT u.id,u.usuario,c.dni,concat(c.ape_paterno,' ',c.ape_maerno,' ',c.nombre) from usuarios u inner join comensales c 
                                on u.id_comensal=c.id where u.estado=1 and u.id_comensal is not null";
        $this->result = mysql_query($consultaSql);
        if($this->result){
                //$cont=1;
                                
            echo '<div class="box-body" id="ListaUsuarios">
                                                                <div class="box-header">
                                                                <h3 class="box-title">Comensales</h3>
                                                            </div><!-- /.box-header -->
                                                                <table class="table">
                                                                    <thead>
                                                                        
                                                                    <tr>
                                                                        <th style="width: 10px">#</th>
                                                                        <th>Usuario</th>
                                                                        <th>Dni</th>
                                                                        <th>Apellidos y Nombre</th>
                                                                        <th>Opciones</th>
                                                                        
                                                                    </tr>
                                                                    </thead>
                    <tbody id="bcomensales">';
                while($row=mysql_fetch_row($this->result)){
                    $link_photo_car = "../uploads/".$row[0].".png"; 

                    
     
                        if (file_exists("../../uploads/".$row[0].".png")) 
                        { 
                            $show_path_photo_car = $link_photo_car; // Photo unavailable 
                        } 
                        else 
                        { 
                            $show_path_photo_car ="../uploads/imgdefecto.png";
                        } 
                           echo '<tr>
                                            <td><div class="pull-left image"><img src="'.$show_path_photo_car.'" style="width:35px;heigth:35px;" /></div></td>
                                            <td>'.$row[1].'</td>
                                            <td>'.$row[2].'</td>
                                            <td>'.$row[3].'</td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#compose-modal" onClick="cargarEditarComensal('.$row[0].')"><icon class="glyphicon glyphicon-trash"></button>
                                                <button class="btn btn-danger"><icon class="glyphicon glyphicon-pencil"></button>
                                            </td>
                                        </tr>';
            }
            echo    '</tbody>
                                        
                                    </table>';     
        }

}
function cargarEditar(){
    $idUsuario=$this->param['idUsuario'];
    $this->cerrarAbrir();
       $consultaSql="SELECT u.id,u.usuario,t.dni,t.apellidos,t.nombres,t.correo,ur.rol_id from usuarios u inner join trabajador t 
                                on u.id_trabajador=t.id 
                                inner join usuario_rol ur on u.id=ur.usuario_id where u.estado=1 and u.id='$idUsuario' and u.id_trabajador is not null";
        $this->result = mysql_query($consultaSql);
        if($this->result){
            $row=mysql_fetch_row($this->result);

            echo '                          <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">USUARIO:</span>
                                                    <input id="usuarioE" type="text" class="form-control" placeholder="Usuario" value="'.$row[1].'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">NEW PASSWORD:</span>
                                                    <input id="passwordE" type="password" class="form-control" placeholder="New Password" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">DNI:</span>
                                                    <input id="dniE" type="text" class="form-control" placeholder="DNI" value="'.$row[2].'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">APELLIDOS:</span>
                                                    <input id="apellidosE" type="text" class="form-control" placeholder="APELLIDOS" value="'.$row[3].'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">NOMBRES:</span>
                                                    <input id="nombresE" type="text" class="form-control" placeholder="NOMBRES" value="'.$row[4].'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">CORREO:</span>
                                                    <input id="correoE" type="text" class="form-control" placeholder="NOMBRES" value="'.$row[5].'">
                                                    <input id="idE" type="hidden" class="form-control" placeholder="idE" value="'.$row[0].'">
                                                </div>
                                            </div>
                                            <div class="form-group" >
                                                    <label>ROL</label>
                                                    <select class="form-control" id="rolE">                                   
                                                    </select>
                                            </div>';

        }
}
function cargarEditarComensal(){
    $idUsuario=$this->param['idUsuario'];
    $this->cerrarAbrir();
       $consultaSql="SELECT u.id,u.usuario,t.dni,t.ape_paterno,t.ape_maerno,t.nombre,t.codigo_comensal,ur.rol_id 
                    from usuarios u inner join Comensales t 
                                on u.id_comensal=t.id 
                                inner join usuario_rol ur 
                                on u.id=ur.usuario_id where u.estado=1 and u.id='$idUsuario' and u.id_comensal is not null";
        $this->result = mysql_query($consultaSql);
        if($this->result){
            $row=mysql_fetch_row($this->result);

            echo '                          <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">USUARIO:</span>
                                                    <input id="usuarioEC" type="text" class="form-control" placeholder="Usuario" value="'.$row[1].'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">NEW PASSWORD:</span>
                                                    <input id="passwordEC" type="password" class="form-control" placeholder="New Password" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">DNI:</span>
                                                    <input id="dniEC" type="text" class="form-control" placeholder="DNI" value="'.$row[2].'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">APE PATERNO:</span>
                                                    <input id="apePaternoEC" type="text" class="form-control" placeholder="APELLIDOS" value="'.$row[3].'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">APE MATERNO:</span>
                                                    <input id="apeMaternoEC" type="text" class="form-control" placeholder="APELLIDOS" value="'.$row[3].'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">NOMBRES:</span>
                                                    <input id="nombresE" type="text" class="form-control" placeholder="NOMBRES" value="'.$row[4].'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">CODIGO COM:</span>
                                                    <input id="codigoE" type="text" class="form-control" placeholder="NOMBRES" value="'.$row[5].'">
                                                    <input id="idEC" type="hidden" class="form-control" placeholder="idE" value="'.$row[0].'">
                                                </div>
                                            </div>
                                            <div class="form-group" >
                                                    <label>ROL</label>
                                                    <select class="form-control" id="rolE">                                   
                                                    </select>
                                            </div>';

        }
}
function editarTrabajador(){
        $idUsuario=$this->param['idUsuario'];
        $dni=$this->param['dni'];
        $apellidos=$this->param['apellidos'];
        $nombres=$this->param['nombres'];
        $correo=$this->param['correo'];
        $rol=$this->param['rol'];
        $usuario = $this->param['user'];
        $password = $this->param['password'];
        $passwordMD5=md5($password);

        $fecha_updated=date("Y-m-d");
        $idUsuario=$this->param['idUsuario'];
        $consultaSql="SELECT ur.id from usuarios u 
                                inner join trabajador ur on ur.id=u.id_trabajador where  u.id='$idUsuario'";
        $this->result = mysql_query($consultaSql);
        if($this->result){
            $row=mysql_fetch_row($this->result);
            $idTrabajador=$row[0];   
        }

    $this->cerrarAbrir();
            if ($password='') {
                # code...
                $consultaSql="UPDATE `usuarios` SET `usuario`='$usuario' WHERE `id`='$idUsuario' ";
            }else{
                $consultaSql="UPDATE `usuarios` SET `usuario`='$usuario',`password`='$passwordMD5' WHERE `id`='$idUsuario' ";
            }
           
            $this->result = mysql_query($consultaSql);
            if($this->result){
                $this->cerrarAbrir();
                $consultaSql="UPDATE `trabajador` SET `dni`='$dni',`apellidos`='$apellidos',`nombres`='$nombres',`correo`='$correo',`updated_at`='$fecha_updated'    WHERE `id`='$idTrabajador' ";
                $this->result = mysql_query($consultaSql);
                if($this->result){
                echo 'ok';
                }else{
                    echo 'error en el editar Trabajador';
                }
            
        }else{
            echo 'error Editar Usuario';
        }

}
    
}

?>