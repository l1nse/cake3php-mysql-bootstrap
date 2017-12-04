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
     <!-- Modal cancelar reunion -->
<div  class="modal fade"  id="modalEstado" name="modalEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  style="position:absolute;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;" 
>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cancelar reunión</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" value="<?php echo $calendario->id ?>" name="idcalendario" id="idcalendario">
        
          <tr>
            <td><th scope="row"><?= __('Observación') ?></th></td>
            <td><textarea class="form-control" name="cancelar" id="cancelar" rows="4" cols="50"></textarea></td>
            
        </tr>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_cancelar_reunion" name="btn_cancelar_reunion">Guardar</button>
      </div>
    </div>
  </div>
</div>