<?php
/**
  * @var \App\View\AppView $this
  */

    $rs_user = $this->request->session()->read('Auth.User');
?>
<?= $this->Html->script('entidades') ?>
<div class="contactos index large-9 medium-8 columns content">
	<div class="table-responsive">
	    <table class="table table-striped data-table-index">
	        <thead>
	            <tr>
	                <th ></th>
	                <th >Id</th>
	                <th >Empresa</th>
	                <th >Nombre</th>
	                <th >Email </th>
	                <th >Telefono </th>
	                <th >Cargo</th>
	                <th >Descripcion</th>
	                <th >Nacionalidad</th>
	                <th >Estado</th>
	                <th >Acciones </th>

	                
	            </tr>
	        </thead>
	        <tbody>
	             <?php foreach ($contactos as $contacto): ?>
	             	 <?php
                if(isset($contacto->active)){
                    if($contacto->active=='1'){
                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($contacto->active=='2'){
                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($contacto->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';

                    }
                    else{
                        $estado =  '';
                    }
                }

                ?>

	             	<td></td>
	           		<td> <?= h($contacto->id) ?> </td>
	           		<td> <?= h($contacto->entidade['name']) ?> </td>
	           		<td> <?= h($contacto->name) ?> </td>
	           		<td> <?= h($contacto->email) ?> </td>
	           		<td> <?= h($contacto->telefono) ?> </td>
	           		<td> <?= h($contacto->cargo) ?> </td>
	           		<td> <?= h($contacto->descripcion) ?> </td>
	           		<td> <?= h($contacto->nacionalidad) ?> </td>
	           		<td style="text-align: center;"><?= $estado;  ?></td>
	           		 <td style="text-align: center;">
                    
                      <?php if(in_array(75, $permisos2)) {?>
                        <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>Contactos/activar/<?php echo $contacto->id; ?>" data-toggle="tooltip" data-placement="center" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                      <?php }else{ ?>
                          <a class="btn btn-success btn-xs" disabled href="#" data-toggle="tooltip" data-placement="center" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                      <?php } ?>

                      <?php if(in_array(78, $permisos2)) {?>
                        <a class="btn btn-warning btn-xs" href="javascript:editModal(<?php echo $contacto->id;?> , '<?php echo $contacto->name;?>')" data-toggle="tooltip" data-placement="left" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                      <?php }else{ ?>
                          <a class="btn btn-warning btn-xs" disabled href="#" data-toggle="tooltip" data-placement="left" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                      <?php } ?>

                      <!--<?php if(in_array(123, $permisos2)) {?>
                         <a class="btn btn-danger btn-xs" href="javascript:delModal(<?php echo $contacto->id;?> , '<?php echo $contacto->name;?>')" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                      <?php }else{?>
                         <a class="btn btn-danger btn-xs" disabled href="#" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                      <?php } ?> -->

                        
                    </td>

	           		</tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
    </div>
</div>
<!-- modal para guardar contacto -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar contacto</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <?= $this->Form->create('', array('id' => 'form_contacto')) ?>
        <input type="hidden" name="entidade_id" id="entidade_id" value="">
        <div class="form-group">
          <?php
            echo '<div class="form-group">';
            echo $this->Form->control('Nombre completo (*)', ["class" => 'form-control', 'required' => true, 'id' => 'name', 'name' => 'name']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Email (*)', ["class" => 'form-control correo', 'required' => true, 'id' => 'email', 'name' => 'email']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Teléfono (*)', ["class" => 'form-control phone', 'required' => true, 'id' => 'telefono', 'name' => 'telefono']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Cargo', ["class" => 'form-control', 'id' => 'cargo', 'name' => 'cargo']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Descripción', ["class" => 'form-control', 'id' => 'descripcion', 'name' => 'descripcion']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Nacionalidad', ["class" => 'form-control', 'id' => 'nacionalidad', 'name' => 'nacionalidad']);
            echo '</div>';
            
          ?>
        <?= $this->Form->end() ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_guardar_contacto" name="btn_guardar_contacto">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal para editar contacto -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="labelModalEdit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="labelModalEdit">Editar contacto</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <?= $this->Form->create('', array('id' => 'form_contacto_edit')) ?>
        <input type="hidden" name="entidade_id2" id="entidade_id2" value="">
        <input type="hidden" name="id_contacto" id="id_contacto" value="">
        <div class="form-group">
          <?php
            echo '<div class="form-group">';
            echo $this->Form->control('Nombre completo (*)', ["class" => 'form-control', 'required' => true, 'id' => 'name2', 'name' => 'name2']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Email (*)', ["class" => 'form-control correo', 'required' => true, 'id' => 'email2', 'name' => 'email2']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Teléfono (*)', ["class" => 'form-control phone', 'required' => true, 'id' => 'telefono2', 'name' => 'telefono2']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Cargo', ["class" => 'form-control', 'id' => 'cargo2', 'name' => 'cargo2']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Descripción', ["class" => 'form-control', 'id' => 'descripcion2', 'name' => 'descripcion2']);
            echo '</div>';
            echo '<div class="form-group">';
            echo $this->Form->control('Nacionalidad', ["class" => 'form-control', 'id' => 'nacionalidad2', 'name' => 'nacionalidad2']);
            echo '</div>';
            
          ?>
        <?= $this->Form->end() ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_editar_contacto" name="btn_editar_contacto">Guardar</button>
      </div>
    </div>
  </div>
</div>
