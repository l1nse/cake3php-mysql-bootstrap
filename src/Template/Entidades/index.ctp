<?php
/**
  * @var \App\View\AppView $this
  */

    $rs_user = $this->request->session()->read('Auth.User');
?>
<?= $this->Html->script('entidades') ?>
<div class="entidades index large-9 medium-8 columns content">
    <h3 class="page-header"><?= __('Empresas') ?></h3>
    <div class="row">
        <div class="col-md-12">
        <?php
            if(in_array(71, $permisos2)){
        ?>
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>entidades/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Empresas</a>
           
            <!--<a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>tickets/index_excel/"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>-->
        <?php
            }else{
        ?>
            <a class="btn btn-primary btn-xs" href="#" disabled><i class="glyphicon glyphicon-plus-sign"></i> Crear Empresas</a>
        <?php
            }
        ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped data-table-index">
            <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Razón social</th>
                    <th>RUT</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Acuerdo</th>
                    <!--<th>Nombre representante</th>
                    <th>Correo representante</th>-->
                    <th>Estado</th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entidades as $entidade): ?>

                <?php
                if(isset($entidade->active)){
                    if($entidade->active=='1'){
                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($entidade->active=='2'){
                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($entidade->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                    }
                    else{
                        $estado =  '';
                    }
                }

                ?>
                <?php
                if(isset($entidade->active)){
                    if($entidade->active=='1' )
                    {
                     ?>
                <tr>
                    <td class="details-control" id="<?php echo $entidade->id; ?>"><a class="btn btn-xs btn-default"><i class="glyphicon glyphicon-menu-down"></i></a></td>
                    <td style="text-align: center;"><?= $this->Number->format($entidade->id) ?></td>
                    <td><?= h($entidade->name) ?></td>
                    <td><?= h($entidade->rut) ?></td>
                    <td><?= h($entidade->direccion) ?></td>
                    <td><?= h($entidade->telefono) ?></td>
                    <td><?= h($entidade->acuerdo) ?></td>
                    <!--<td><?= h($entidade->name_representante) ?></td>
                    <td><?= h($entidade->correo_representante) ?></td>-->
                    <td style="text-align: center;"><?= $estado;  ?></td>
                    <td style="text-align: center;">

                    <?php  if(in_array(77, $permisos2)){ ?>
                        <a class="btn btn-primary btn-xs" href="javascript:modalContacto(<?php echo $entidade->id; ?>, '<?php echo $entidade->name; ?>')" data-toggle="tooltip" data-placement="left" title="Agregar Contacto"><i class="glyphicon glyphicon-plus-sign"></i></a>
                    <?php }else {?>
                        <a class="btn btn-primary btn-xs" disabled href="#" data-toggle="tooltip" data-placement="left" title="Agregar Contacto"><i class="glyphicon glyphicon-plus-sign"></i></a>

                    <?php }?>

                    <?php  if(in_array(94, $permisos2)){?>

                        <a class="btn btn-info btn-xs" href="<?php echo APP_URI; ?>calendarios/add/<?php echo $entidade->id; ?>"" data-toggle="tooltip" data-placement="left" title="Agregar Reunion"><i class="glyphicon glyphicon-dashboard"></i></a>
                    <?php }else { ?>
                        <a class="btn btn-info btn-xs" disabled href="#" data-toggle="tooltip" data-placement="left" title="Agregar Reunion"><i class="glyphicon glyphicon-dashboard"></i></a>
                    <?php  } ?>

                    <?php  if(in_array(72, $permisos2)){?>
                        <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>entidades/edit/<?php echo $entidade->id; ?>/1" data-toggle="tooltip" data-placement="left" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                    <?php }else{?>
                        <a class="btn btn-warning btn-xs" disabled href="#" data-toggle="tooltip" data-placement="left" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                    <?php }?>

                    <?php if(in_array(122, $permisos2)){ ?>
                        <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>entidades/anular/<?php echo $entidade->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php }else{ ?>
                        <a class="btn btn-danger btn-xs" disabled href="#" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>

                    <?php }                          
                        }

                }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div  id="flashMessage"></div>
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

<!-- modal para desactivar contacto -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="labelModalDelete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="labelModalDelete">Desactivar contacto</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Esta seguro de desactivar el contacto?</div>
        <?= $this->Form->create('', array('id' => 'form_contacto_delete')) ?>
        <input type="hidden" name="entidade_id3" id="entidade_id3" value="">
        <input type="hidden" name="id_contacto3" id="id_contacto3" value="">

        <div class="form-group">
          
        <?= $this->Form->end() ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="btn_delete_contacto" name="btn_delete_contacto">Si</button>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
    table tr {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none; 
    }
</style>