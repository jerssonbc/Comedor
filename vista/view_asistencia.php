<div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">REGISTRO</a></li>
                                    <li><a href="#tab_2" data-toggle="tab" onClick="cargarHoras();">HORAS</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="form-horizontal" id="contenido">
                                            <div id="reloj" style="font-size:20px;color:green;position:absolute;top:200px;right:50px;"></div>
                                            <h3 style="color:blue;" align="center"><b>ASISTENCIA COMENSAL</b></h3>
                                            <form onsubmit="registrarAsistenciaComensal(); return false;" method="post" accept-charset="utf-8">
                                                <input type="hidden" id="horaMarcado">
                                                <input type="hidden" id="soloHoraMarcado">
                                                <div class="form-group">                         
                                                    <label for="codigo" class="col-sm-2 control-label">Codigo del Alumno</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="codigo" id="codigo" placeholder="esperando codigo del alumno" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-5 col-sm-7">
                                                      <button type="submit" class="btn btn-primary btn-md">Marcar!</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div id="datosAsistencia">
                                                <div class="col-md-9">
                                                    <div class="form-group">                         
                                                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nombre" id="nombre" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="escuela" class="col-sm-2 control-label">Escuela</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="escuela" id="escuela" disabled>
                                                        </div>                  
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="matricula" class="col-sm-2 control-label">Matricula</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="matricula" id="matricula" disabled>
                                                        </div>                              
                                                    </div>
                                                    <div class="form-group">    
                                                        <label for="fechaRegistro" class="col-sm-2 control-label">Fecha Registro</label>
                                                        <div class="col-sm-10">              
                                                            <input type="date" class="form-control" name="fechaRegistro" id="fechaRegistro" disabled>
                                                        </div>  
                                                    </div>
                                                    <div class="form-group">    
                                                        <label for="programa" class="col-sm-2 control-label">Programa</label>
                                                        <div class="col-sm-10">              
                                                            <input type="text" class="form-control" name="programa" id="programa" disabled>
                                                        </div>  
                                                    </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="thumbnail" 
                                                        style="width:200px; height:200px;
                                                         margin:5px 0px 0px 5px;">
                                                        <img src="uploads/img.png" alt="">
                                                    </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>    
                                        </div>
                                        
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <form action="#" method="post" onsubmit="editarHorasTurno(); return false;" accept-charset="utf-8">
                                                <div id="formHoras">

                                                </div>
                                            
                                                <div class="modal-footer clearfix">
                                                    <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-pencil"></i> Editar</button>
                                                </div>
                                        </form>
                                                
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->