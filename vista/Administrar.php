<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['idUsuario'])){
    header("Location:vista/login.php");
}else{
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>COMEDOR  | Universidad Nacional de Trujillo</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="../css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/goSamples.css" rel="stylesheet" type="text/css" /> 
        <link href="../css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue" onload="listarMenu1(2);listarMenu2(3);listarRol();listarUsuarios();">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                COMEDOR UNT
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['user']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../uploads/<?php echo $_SESSION['idUsuario']; ?>.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['user']; ?> - Web Developer
                                        <small>Member since may. 2015</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../uploads/<?php echo $_SESSION['idUsuario']; ?>.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $_SESSION['user']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>OPERACIONES</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu" id="listarMenu1">
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>REPORTES</span><small class="badge pull-right bg-green">Rep</small>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu" id="listarMenu2">
                            

                            </ul>
                        </li>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        
                        <small>Bienvenido al Sistema Comedor Univiersitario</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                       
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content" id="content" >
                            <div class="nav-tabs-custom">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#tab_1" data-toggle="tab">AGREGAR</a></li>
                                                    <li><a href="#tab_2" data-toggle="tab" onClick="listarUsuarios()">USUARIOS</a></li>
                                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1">
                                                            
                                                            <div class="box-header">
                                                                <h3 class="box-title">ASIGNAR USUARIOS </h3>
                                                            </div><!-- /.box-header -->
                                                            <div class="col-md-7">
                                                                    <div class="box-body">
                                                                     <div class="box box-primary">
                                                            
                                                                        <!-- form start -->
                                                                        <form role="form" id="formulario" enctype="multipart/form-data">
                                                                            <div class="box-body">
                                                                                <!--<div class="form-group">
                                                                                    <label for="exampleInputFile">Subir Foto Pefil</label>
                                                                                    <input type="file" name="fotoUsuario" id="fotoUsuario">
                                                                                    <p class="help-block">Cargado...</p>
                                                                                </div>-->
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">DNI</label>
                                                                                    <input type="number" class="form-control" id="dni" placeholder="Enter Dni">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Apellidos</label>
                                                                                    <input type="text" class="form-control" id="apellidos" placeholder="Enter Apellidos">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Nombres</label>
                                                                                    <input type="text" class="form-control" id="nombres" placeholder="Enter nombres">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Correo</label>
                                                                                    <input type="text" class="form-control" id="correo" placeholder="Enter correo">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">USUARIO</label>
                                                                                    <input type="text" class="form-control" id="usuario" placeholder="Enter usuario">
                                                                                </div>
                                                                                

                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPassword1">Password</label>
                                                                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                                                                </div>
                                                                                <div class="form-group" >
                                                                                    <label>ROL</label>
                                                                                    <select class="form-control" id="rol">
                                                                                        <option value="0">--Seleccionar--</option>
                                                                                        
                                                                                    </select>
                                                                                </div>
                                                                                                        
                                                                            </div><!-- /.box-body -->

                                                                            <div class="box-footer">
                                                                                <div  class="btn btn-primary" onClick="agregarTrabajador();agregarFoto();" >Agregar</div>
                                                                            </div>
                                                                        </form>
                                                                    </div><!-- /.box -->  

                                                                    

                                                                </div><!-- /.tab-pane -->
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="box-body">
                                                                     <div class="box box-primary">
                                                                    <iframe id="uploadedImage" name="uploadedImage" src="" 
                                                                      style="width:200px; height:200px;"
                                                                      frameborder="0" marginheight="0" marginwidth="0">
                                                                      </iframe>
                                                                      <br>
                                                                     <form id="imageForm" name="imageForm" enctype="multipart/form-data"
                                                                            action="uploadImage.php" method="POST" target="uploadedImage">
                                                                                <div class="form-group">
                                                                                    <label>Foto:</label>
                                                                                    <input name="imageToUpload"  class="form-control" 
                                                                                        id="imageToUpload" type="file"
                                                                                            onchange="uploadImage();" size="30" required/>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="oldImageToDelete">
                                                                                        
                                                                                    </label>
                                                                                    <input name="oldImageToDelete" id="oldImageToDelete" type="hidden"
                                                                                    size="50" />
                                                                                </div>
                                                                                    </BR>
                                                      
                                                      
                                                                    </form>
                                                                  </div>
                                                                </div>  
                                                            </div>
                                                            
                                                    </div><!-- /.tab-pane -->
                                                    <div class="tab-pane" id="tab_2">
                                                            <div class="box-body" id="ListaUsuarios">
                                                                <div class="box-header">
                                                                <h3 class="box-title">Asignar Roles</h3>
                                                            </div><!-- /.box-header -->
                                                                <table class="table">
                                                                    <thead>
                                                                        
                                                                    <tr>
                                                                        <th style="width: 10px">#</th>
                                                                        <th>Usuario</th>
                                                                        <th>Dni</th>
                                                                        <th>Apellidos y Nombre</th>
                                                                        <th>Opciones</th>
                                                                        <th style="width: 40px">Programa</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="bcomensales">
                                                                        
                                                                    
                                                                    </tbody>
                                                                    
                                                                </table>

                                                                
                                                            </div><!-- /.box-body -->
                                                            <div class="box-footer clearfix">
                                                                
                                                            </div>

                                                    </div><!-- /.tab-pane -->
                                                </div><!-- /.tab-content -->
                            </div>

                                                  
                        <!--NODAL EDITAR JEJEJE-->
                        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-pencil"></i> EDITAR USUARIO </h4>
                                    </div>
                                    <form action="#" method="post" onsubmit="editar(tipoEditar.value); return false;" accept-charset="utf-8">
                                        <div class="modal-body" id="AreaEditar">
                                            

                                        </div>
                                        <div class="modal-footer clearfix">

                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Salir</button>

                                            <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-pencil"></i> Editar</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <div class="modal fade" id="compose-modalCard" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-pencil"></i> GRABAR TARJETA RFID </h4>
                                    </div>
                                    <form action="#" method="post" onsubmit="return false;" accept-charset="utf-8">
                                        <div class="modal-body" id="AreaEditarCard">
                                            

                                        </div>
                                        <div class="modal-footer clearfix">

                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Salir</button>

                                    
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="../js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js"       type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js"        type="text/javascript"></script>
        <script src="../js/menu.js" type="text/javascript"></script>
        <script src="../js/validacionesUsuario.js" type="text/javascript"></script>
        <script src="../js/registrarCronograma.js" type="text/javascript"></script>
        <script src="../js/asistencia.js" type="text/javascript"></script>
        
    </body>
</html>


<?php 
    }
?>
