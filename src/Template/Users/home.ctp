<?php
	$rs_user = $this->request->session()->read('Auth.User');
?>
<h2 class="page-header"><?= __('Bienvenido') ?> <b><?php echo $rs_user[0]['username'] ?></b></h2>
<div class="row">
	<div class="col-xs-12 col-md-2">
		<a href="<?php echo APP_URI; ?>tickets/index/" class="thumbnail">
			<center><h1><i class="glyphicon glyphicon-pushpin"></i></h1>
				<div class="caption">
					<h4>Tickets Creados</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-12 col-md-2">
		<a href="<?php echo APP_URI; ?>tickets/asignado/" class="thumbnail">
			<center><h1><i class="glyphicon glyphicon-tags"></i></h1>
				<div class="caption">
					<h4>Tickets Asignados</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-12 col-md-2">
		<a href="<?php echo APP_URI; ?>tickets/home/" class="thumbnail">
			<center><h1><i class="glyphicon glyphicon-indent-right"></i></h1>
				<div class="caption">
					<h4>Resumen Tickes</h4>
				</div>
			</center>
		</a>
	</div>
	<div class="col-xs-12 col-md-2">
		<a href="<?php echo APP_URI; ?>tickets/list-user-ticket/" class="thumbnail">
			<center><h1><i class="glyphicon glyphicon-sort-by-attributes-alt"></i></h1>
				<div class="caption">
					<h4>Tickes por usuarios</h4>
				</div>
			</center>
		</a>
	</div>
</div>