<?php
	$rs_user = $this->request->session()->read('Auth.User');
?>
<h3 class="page-header">Resumen de <strong>tickets asignados</strong></h3>
<div class="row">
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_all; ?></h1>
				<div class="caption">
					<h4>Todos</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_abierto; ?></h1>
				<div class="caption">
					<h4>Abiertos</h4>
				</div>
			</center>
		</a>
	</div>	
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_cursado; ?></h1>
				<div class="caption">
					<h4>Pendientes</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_asignado; ?></h1>
				<div class="caption">
					<h4>Reasignados</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_cerrado; ?></h1>
				<div class="caption">
					<h4>Cerrados</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_aprobado; ?></h1>
				<div class="caption">
					<h4>Aprobados</h4>
				</div>
			</center>
		</a>
	</div>		
</div>
<div class="row">
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_rechazado; ?></h1>
				<div class="caption">
					<h4>Rechazados</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_anulado; ?></h1>
				<div class="caption">
					<h4>Anulados</h4>
				</div>
			</center>
		</a>
	</div>
</div>
<div clasS="row">
	<div class="col-xs-12 col-md-12">
		<div id="donutchart" class="col-md-12" style="min-height: 300px"></div>
	</div>
</div>

<h3 class="page-header">Resumen de <strong>tickets creados</strong></h3>
<div class="row">
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_all1; ?></h1>
				<div class="caption">
					<h4>Todos</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_abierto1; ?></h1>
				<div class="caption">
					<h4>Abiertos</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_cursado1; ?></h1>
				<div class="caption">
					<h4>Pendientes</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_asignado1; ?></h1>
				<div class="caption">
					<h4>Reasignados</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_cerrado1; ?></h1>
				<div class="caption">
					<h4>Cerrados</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_aprobado1; ?></h1>
				<div class="caption">
					<h4>Aprobados</h4>
				</div>
			</center>
		</a>
	</div>	
</div>
<div class="row">
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_rechazado1; ?></h1>
				<div class="caption">
					<h4>Rechazados</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-6 col-md-2">
		<a href="#" class="thumbnail">
			<center><h1><?php echo $rs_anulado1; ?></h1>
				<div class="caption">
					<h4>Anulados</h4>
				</div>
			</center>
		</a>
	</div>
</div>
<div clasS="row">
	<div class="col-xs-12 col-md-12">
		<div id="donutchart2" class="col-md-12" style="height: 300px"></div>
	</div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Abiertos',     <?php echo $rs_abierto; ?>],
          ['Reasignados',     <?php echo $rs_asignado; ?>],
          ['Pendientes',     <?php echo $rs_cursado; ?>],
          ['Cerrados',  <?php echo $rs_cerrado; ?>],
          ['Anulados', <?php echo $rs_anulado; ?>],
          ['Rechazados', <?php echo $rs_rechazado; ?>],
          ['Aprobados', <?php echo $rs_aprobado; ?>],
        ]);

        var options = {
          title: '<?php echo 'Al día '.date('d-m-Y');  ?>',
          pieHole: 0.4,
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }


      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Abiertos',     <?php echo $rs_abierto1; ?>],
          ['Reasignados',     <?php echo $rs_asignado1; ?>],
          ['Pendientes',     <?php echo $rs_cursado1; ?>],
          ['Cerrados',  <?php echo $rs_cerrado1; ?>],
          ['Anulados', <?php echo $rs_anulado1; ?>],
          ['Rechazados', <?php echo $rs_rechazado1; ?>],
          ['Aprobados', <?php echo $rs_aprobado1; ?>],
        ]);

        var options = {
          title: '<?php echo 'Al día '.date('d-m-Y');  ?>',
          pieHole: 0.4,
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
        chart.draw(data, options);
      }

    </script>