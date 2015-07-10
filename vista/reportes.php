<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['idUsuario'])){
    header("Location:vista/login");
}else{
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>COMEDOR  | Universidad Nacional de Trujillo</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="../css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" /> 

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue" onload="listarMenu1(2);listarMenu2(3);tablaDiaria();repetir();">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../index" class="logo">
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
                                        <a href="#" onClick="tablaDiaria();">Followers</a>
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
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
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
                        <li><a href="#"><i class="fa fa-dashboard"></i> Reportes</a></li>
                       
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content" id="content">

                    <!-- row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- jQuery Knob -->
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Reportes de asistencia de comensales por día</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="col-xs-6" style="width:200px;">
                                        <div class="form-group">
                                            <label>AÑO</label>
                                            <select class="form-control" id="anio">
                                                <option value="2015">2015</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3" >
                                        <div class="form-group">
                                            <label>MES</label>
                                            <select class="form-control" id="mes" onchange="tablaDiaria();">
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6" selected>Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Nobiembre</option>
                                                <option value="12">Diciembre</option>

                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="box-body"  style="width:200px;">
                                            <label>TURNO</label>
                                            <select class="form-control" id="turno" onchange="tablaDiaria();">
                                                <option value="1">MAÑANA</option>
                                                <option value="2">TARDE</option>
                                                <option value="3">NOCHE</option>
                                            </select>
                                </div>
                                <div class="box-body" id="tablaDiaria">
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Grafico Asistencias Vs Meses</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>AÑO</label>
                                            <select class="form-control" id="anioGrafico" onchange="cargarGraficofusion();">
                                                <option value="2015" selected>--Seleccionar--</option>
                                                <option value="2015">2015</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                    <!--<div class="chart" id="bar-chart" style="height: 400px;"></div>-->
                                    <div id="chartContainer">FusionCharts!</div>
                                </div><!-- /.box-body -->
        
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Grafico Programas</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>AÑO</label>
                                            <select class="form-control" id="anioCirculo">
                                                <option value="2015">2015</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>MES</label>
                                            <select class="form-control" id="mesCirculo" onchange="cargarCirculoFusion();">
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6" selected>Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Nobiembre</option>
                                                <option value="12">Diciembre</option>

                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="box-body">
                                            <label>TURNO</label>
                                            <select class="form-control" id="turnoCirculo" onchange="cargarCirculoFusion();">
                                                <option value="1">MAÑANA</option>
                                                <option value="2">TARDE</option>
                                                <option value="3">NOCHE</option>
                                            </select>
                                </div>
                                <div class="box-body chart-responsive">
                                    <!--<div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>-->
                                    <div id="chart-container2">doughnut</div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Grafico Asistencias-Faltas Vs Meses </h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>AÑO</label>
                                            <select class="form-control" id="anioGraficoDoble" onchange="cargarGraficofusionDoble();">
                                                <option value="2015" selected>--Seleccionar--</option>
                                                <option value="2015">2015</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                    
                                    <div id="chartContainer3">FusionCharts!</div>
                                </div><!-- /.box-body -->
        
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                <div class="row">
                        <div class="col-xs-12">
                            <!-- jQuery Knob -->
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Reportes de asistencia por Programas</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>AÑO</label>
                                            <select class="form-control" id="anioPrograma">
                                                <option value="2015">2015</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>MES</label>
                                            <select class="form-control" id="mesPrograma" onchange="tablaDiariaPrograma();">
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6" selected>Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Nobiembre</option>
                                                <option value="12">Diciembre</option>

                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="box-body" >
                                    <table class="table table-bordered table-striped" >
                                                                    <thead>
                                                                        
                                                                    <tr>
                                                                        
                                                                        <th rowspan="2">PROGRAMA</th>
                                                                        <th  colspan="3">MAÑANA</th>
                                                                        <th colspan="3">TARDE</th>
                                                                        <th  colspan="3">NOCHE</th>
                                                                        <th rowspan="2">TOTAL</th>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        
                                                                
                                                                        <th>Programados(PP)</th>
                                                                        <th>Asistidos(CA)</th>
                                                                        <th>Porcentaje%(CA/PP)</th>
                                                                        <th>Programados(PP)</th>
                                                                        <th>Asistidos(CA)</th>
                                                                        <th>Porcentaje%(CA/PP)</th>
                                                                        <th>Programados(PP)</th>
                                                                        <th>Asistidos(CA)</th>
                                                                        <th>Porcentaje%(CA/PP)</th>
                                                                        
                                                                    </tr>
                                                                    </thead>
                                    <tbody id="tablaDiariaPrograma">
                                    </tbody>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                   

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="../js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- jQuery Knob -->
         
        <script src="../js/menu.js" type="text/javascript"></script>
        <script src="../js/asistencia.js" type="text/javascript"></script>
        <script src="../js/reportes.js" type="text/javascript"></script>
        <script src="../js/plugins/morris/raphael-min.js" type="text/javascript">></script>
        <script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../fusioncharts/fusioncharts.js"></script>
        <script type="text/javascript" src="../fusioncharts/themes/fusioncharts.theme.zune.js"></script>


        <script type="text/javascript">
            
        </script>
    </body>
</html>

<?php 
    }
?>
