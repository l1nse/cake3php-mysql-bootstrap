<h3 class="page-header"><strong>Tickets </strong>por usuarios</h3>
<div class="row">
	<div class="col-xs-6 col-md-12">
		<div id="columnchart_values" class="col-md-12" style="height: 300px;"></div>
	</div>
</div>

<?php
	//anulados
	if(is_array($rs_0) && count($rs_0)>0){
		$grafico_0 = '';
		$i=1;
		foreach ($rs_0 as $row) {
			
			$username 	= isset($row['name']) 	&& $row['name']!='' 	? $row['name'] : '';
			$nulo 		= isset($row['nulo']) 		&& $row['nulo']!='' 		? $row['nulo'] : '';
			$abierto 	= isset($row['abierto']) 	&& $row['abierto']!='' 		? $row['abierto'] : '';
			$pendiente 	= isset($row['pendiente']) 	&& $row['pendiente']!='' 	? $row['pendiente'] : '';
			$reasignado = isset($row['reasignado']) && $row['reasignado']!='' 	? $row['reasignado'] : '';
			$cerrados 	= isset($row['cerrados']) 	&& $row['cerrados']!='' 	? $row['cerrados'] : '';
			$rechazado 	= isset($row['rechazado']) 	&& $row['rechazado']!='' 	? $row['rechazado'] : '';
			$aprobado 	= isset($row['aprobado']) 	&& $row['aprobado']!='' 	? $row['aprobado'] : '';

			//VALORES
			if($i==count($rs_0)){
				$grafico_0 .= '["'.$username.'", '.$abierto.', '.$pendiente.', '.$reasignado.', '.$cerrados.', '.$aprobado.', '.$rechazado.', '.$nulo.', '."''".'] '."\t";
			}else{
				$grafico_0 .= '["'.$username.'", '.$abierto.', '.$pendiente.', '.$reasignado.', '.$cerrados.', '.$aprobado.', '.$rechazado.', '.$nulo.', '."''".'], '."\t";
			}


			$i++;

		}
	}else{
			$grafico_0 = '["N/A", 0, "#428bca"], '."\\n";
	}

	
?>
	
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("visualization", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      
      var data = google.visualization.arrayToDataTable([
        ['Genre','Abiertos', 'Pendientes', 'Reasignados', 'Cerrados', 'Aprobados',
         'Rechazado', 'Anulados', { role: 'annotation' } ],
        <?php echo $grafico_0; ?>
      ]);

      
      var options = {
        width: 1024	,
        height: 400,
        legend: { position: 'top', maxLines: 8	 },
        bar: { groupWidth: '20%' },
        isStacked: true,
        vAxis: {minValue: 0}
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(data, options);
  	}

  	
  </script>