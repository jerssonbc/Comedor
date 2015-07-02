<div class="form-horizontal" id="contenido">
    <div id="reloj" style="font-size:20px;color:green;position:absolute;top:200px;right:50px;"></div>
    <h3 style="color:blue;" align="center"><b>ASISTENCIA COMENSAL </b></h3>
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
</div> 