
<div class="form-horizontal" id="contenido">
    <h3 style="color:#00A65A;" align="center"><b>REGISTRAR TIPO COMENSAL</b></h3>
    <form onsubmit="registrarTipoComensal(); return false;" method="post" accept-charset="utf-8">
        <div class="form-group">                         
            <label for="nombreTC" class="col-sm-2 control-label">NOMBRE</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nombreTC" id="nombreTC" placeholder="escriba el tipo de comensal" autofocus required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
              <button type="submit" class="btn btn-success btn-md">Registrar!</button>
            </div>
        </div>
    </form>
    <div id="listaTipoComensal">
        <table class="table table-hover table-responsive">
            <thead>
                <tr class="warning">
                    <th>Codigo</th>
                    <th>Tipo Comensal</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="registrosComensal">
                <tr class="info">
                    <td></td><td></td><td></td>
                </tr>
            </tbody>
        </table>
    </div>    
</div> 