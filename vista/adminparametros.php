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
        <link href="../assets/css/goSamples.css" rel="stylesheet" type="text/css" /> 
        
        <link rel="stylesheet" href="../css/dataTables.bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../css/bootstrap-datepicker.css" type="text/css">
       
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue" onload="listarMenu1(2);listarMenu2(3);" >
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
                                        <a href="vista/logout.php" class="btn btn-default btn-flat">Sign out</a>
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
                                <span>REPORTES</span>
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
                         <li>Operaciones</li>
                          <li class="active">Parametros</li>
                       
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content" id="content" style="background: url(/img/fondo.jpg);no-repeat;height:500px" >
                    
                    <div class="row">
                        <div class="box box-primary" id="loading-example">
                            <div class="box-header">
                                    <i class="fa fa-asterisk"></i>
                                    <h3> Parametros</h3>
                                    <!-- tools box -->
                                    <div class=" box-tools">
                                        <button class="btn btn-primary btn-sm refresh-btn" 
                                            data-toggle="modal" data-target="#newparam-modal" title="Aregar">
                                            <i class="fa fa-plus-circle"> Agregar</i>
                                        </button>

                                        <button class="btn btn-primary btn-sm" data-toggle="tooltip" title="Imprimir"><i class="fa fa-print"> Imprimir</i></button>
                                    </div><!-- /. tools -->

                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-parametros">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Año</th>
                                            <th>Descripción</th>
                                            <th>Fecha Inició</th>
                                            <th>Fecha Termino</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataparametros">

                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->

                        </div><!-- /.box --> 
                        
                    </div>

                </section><!-- /.content -->
                
                <!--Inicio Modal -->
                <div class="modal fade" id="newparam-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" style="width:60%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-plus"></i>Agregar Parametro</h4>
                            </div>
                            <form id="addparametro" action="#" method="post" accept-charset="utf-8">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <input name="codigo" type="text" class="form-control"
                                             required id="codigo">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="panio">Año</label>
                                        <div class="input-group date" id="paramanio">
                                            <input name="panio" type="text" class="form-control" 
                                                   value="2015" required id="panio">
                                             <span class="input-group-addon add-on">
                                                <i class="fa fa-calendar"></i>
                                            </span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Descripción</span>
                                            <input name="pdescripcion" type="text" class="form-control" 
                                            required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="finicio" class="col-sm-2 control-label">Fecha Inicio:</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-append date" id="fechainicio">
                                                <input name="fechainicio" type="text" class="form-control" required>
                                                <span class="input-group-addon add-on">
                                                    <i class="fa  fa-calendar"></i></span>
                                            </div>

                                        </div>

                                        <label for="ffin" class="col-sm-2 control-label">Fecha Fin:</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-append date" id="fechafin">
                                                <input name="fechafin" type="text" class="form-control" required>
                                                <span class="input-group-addon add-on">
                                                    <i class="fa  fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                                <div class="modal-footer clearfix">

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    <i class="fa fa-times"></i> Discard</button>



                                    <a class="btn btn-primary pull-left" onClick="agregarParametro();">
                                    <i class="fa  fa-plus-circle"></i> Registrar</a>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- Fin Modal -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- jQuery 2.0.2 -->
        <script src="../js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        

        <script src="../js/menu.js" type="text/javascript"></script>
        <script src="../js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="../js/bootstrap-datepicker.es.min.js" type="text/javascript"></script>
        <script src="../js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/dataTables.bootstrap.js" type="text/javascript"></script>

        <script  src="../js/parametros.js" type="text/javascript"></script>
        <script src="../js/asistencia.js" type="text/javascript"></script>
        <script language="JavaScript" type="text/javascript">
            $(document).ready(function(){
                $('#dataTables-parametros').dataTable();

            });
            $('#paramanio').datepicker({
                    language:'es',
                    format: "yyyy",
                    startView: "year",
                    defaultViewDate:'today',
                   // viewMode: 'years',
                    minViewMode:'years'
                });
            $('#fechainicio').datepicker({
                language:'es',
                format: "dd/mm/yyyy"
            });
            $('#fechafin').datepicker({
                language:'es',
                format: "dd/mm/yyyy"
            });
        
          var loadingHtml = "Loading..."; // this could be an animated image
          var imageLoadingHtml = "Image loading...";
          var http = getXMLHTTPRequest();
          //-----------------------------------------------------------
          function uploadImageuu() {
                var uploadedImageFrameuu = window.uploadedImageuu;
                  uploadedImageFrameuu.document.body.innerHTML = loadingHtml;
                  // VALIDATE FILE
                var imagePathuu = uploadedImageFrameuu.imagePath;
                if(imagePathuu == null){
                  imageFormuu.oldImageToDeleteuu.value = "";
                }
                else {
                  imageFormuu.oldImageToDeleteuu.value = imagePathuu;
                }
                imageFormuu.submit();
           }
          //----------------------------------------------------------------
            function uploadImage() {
                var uploadedImageFrame = window.uploadedImage;
                  uploadedImageFrame.document.body.innerHTML = loadingHtml;
                  // VALIDATE FILE
                var imagePath = uploadedImageFrame.imagePath;
                if(imagePath == null){
                  imageForm.oldImageToDelete.value = "";
                }
                else {
                  imageForm.oldImageToDelete.value = imagePath;
                }
                imageForm.submit();
           }
          //----------------------------------------------------------------
          /*function showImageUploadStatus() {
                var uploadedImageFrame = window.uploadedImage;
                if(uploadedImageFrame.document.body.innerHTML == loadingHtml){
                  divResult.innerHTML = imageLoadingHtml;
                }
                else {
                  var imagePath = uploadedImageFrame.imagePath;
                  if(imagePath == null){
                    divResult.innerHTML = "No uploaded image in this form.";
                  }
                  else {
                    divResult.innerHTML = "Loaded image: " + imagePath;
                  }
                }
          }*/
          //----------------------------------------------------------------
          function getXMLHTTPRequest() {
                try {
                    xmlHttpRequest = new XMLHttpRequest();
                }
                catch(error1) {
                    try {
                    xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                  }
                  catch(error2) {
                    try {
                        xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    catch(error3) {
                        xmlHttpRequest = false;
                    }
                  }
                }
                return xmlHttpRequest;
          }
          //----------------------------------------------------------------
         /* function sendData() {
                var url = "submitForm.php";
                var parameters = "imageDescription=" + dataForm.imageDescription.value;
                var imagePath = window.uploadedImage.imagePath;
                if(imagePath != null){
                  parameters += "&uploadedImagePath=" + imagePath;
                }
                
                http.open("POST", url, true);
            
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.setRequestHeader("Content-length", parameters.length);
                http.setRequestHeader("Connection", "close");
            
                http.onreadystatechange = useHttpResponse;
                http.send(parameters);
          }*/
          //----------------------------------------------------------------
          /*function submitFormIfNotImageLoading(maxLoadingTime, checkingIntervalTime) {
                if(window.uploadedImage.document.body.innerHTML == loadingHtml) {
                  if(maxLoadingTime <= 0) {
                    divResult.innerHTML = "The image loading has timed up. "
                                        + "Please, try again when the image is loaded.";
                  }
                  else {
                    divResult.innerHTML = imageLoadingHtml;
                    maxLoadingTime = maxLoadingTime - checkingIntervalTime;
                    var recursiveCall = "submitFormIfNotImageLoading(" 
                                      + maxLoadingTime + ", " + checkingIntervalTime + ")";
                    setTimeout(recursiveCall, checkingIntervalTime);
                  }
                }
                else {
                  sendData();
                }
          }*/
            //----------------------------------------------------------------
          /*function submitForm() {
                var maxLoadingTime = 3000; // milliseconds
                var checkingIntervalTime = 500; // milliseconds
                submitFormIfNotImageLoading(maxLoadingTime, checkingIntervalTime);
          }*/
          //----------------------------------------------------------------
          /*function useHttpResponse() {
                if (http.readyState == 4) {
                    if (http.status == 200) {
                    divResult.innerHTML = http.responseText;
                    dataForm.reset();
                    imageForm.reset();
                    window.uploadedImage.document.body.innerHTML = "";
                    window.uploadedImage.imagePath = null;
                    }
                }
          }*/
        </script>

    </body>
</html>


<?php 
    }
?>
