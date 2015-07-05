<div class="form-horizontal" id="contenido">
<h3 style="color:#5D98E3;" align="center"><b>Cronograma Comensal</b></h3><br>  
  <form onsubmit="guardarCronogramaComensal(); return false;" method="post" accept-charset="utf-8">
      <div class="form-group">
        <label for="idComensalCronograma" class="col-sm-2 control-label">Comensal</label>
        <div class="col-sm-7">
          <select class="form-control" id="idComensalCronograma" required>
          		<option value="0" selected disabled>Elegir comensal...</option>                                   
          </select>
        </div> 
        <div class="col-sm-3">
          <button type="submit" class="btn btn-primary btn-lg">GUARDAR</button>
        </div> 
      </div>
      <div class="form-group">
        <div class="col-sm-2"><input type="hidden" id="dia0"></div>
        <div class="col-sm-9">
            <table class="table table-responsive">
              <caption><h3><?php echo date("F"); ?></h3></caption>
              <thead>
                <tr class="danger">
                  <th>Lunes</th>
                  <th>Martes</th>
                  <th>Miercoles</th>
                  <th>Jueves</th>
                  <th>Viernes</th>
                  <th>Sabados</th>
                  <th>Domingos</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $numeroDias = date("t");
                $week = 1;
                for ($i=1; $i <=$numeroDias ; $i++) { 
                  $day_week = date('N', strtotime(date('Y-m').'-'.$i));
                  $calendar[$week][$day_week] = $i;
                  if ($day_week == 7) { $week++; };
                }
                $aux=1;
                foreach ($calendar as $days) {
                  echo '<tr>';
                  for ($i=1;$i<=7;$i++){
                    if(!isset($days[$i])){
                      $aux=0;                             
                    } 
                    echo '<td class="dia" id="dia'.$aux.'" onclick="seleccionarDiaCrono('.$aux.')"><div style="width:80px;height:80px;color:white;">';
                    if(isset($days[$i])){
                      echo '<h3>'.$days[$i].'</h3>';                              
                    } 
                    //echo "<br>";
                    //echo $aux;
                    echo '<input id="diaValor'.$aux.'" type="hidden" value="0">';
                    echo '</div></td>';
                    $aux=$aux+1;
                  }                          
                  echo '</tr>';
                }                
              ?>                
              </tbody>
            </table>
        </div>
      </div>
      <input type="hidden" id="numeroDias" value="<?php echo $numeroDias; ?>">
      <div id="mensajeCronograma" style="position:absolute;right:10px;bottom:10px;height:100px;width:300px;opacity:0.8;z-index:10;"></div>              
  </form>
</div> 