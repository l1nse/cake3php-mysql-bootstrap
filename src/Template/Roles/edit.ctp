<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('editRol') ?>

<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <input type="hidden" name="active" id="active" value="1"> 
    <fieldset>
        <legend><?= __('Editar Rol') ?></legend>
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <?php
             echo $this->Form->control('Nombre (*)', ["id" => "name", "name" => "name", "class" => "form-control", "value" => $role['name'] , "required" => true]);
            //echo $this->Form->control('active');
        ?>
        <!-- <div class="form-group">
            <div class="input select required">
                <label for="user_asignado_id">Asignar Permisos Padre</label> 
                <select multiple class="form-control" required="required" id="user_asignado_id" name="user_asignado_id">
                <option value=""></option>
                <?php
                    if(is_array($padres) && count($padres)>0){
                        foreach ($padres as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                    }
                ?>
                </select>
            </div>
        </div> -->
     <div class="form-group">
            <div class="input select required">
                <label for="permiso_id">Asignar Permisos hijo</label> 
                <select multiple class="form-control" required="required" id="permiso_id" name="permiso_id[]">
                <option value=""></option>
                <?php
                    if(is_array($hijos) && count($hijos)>0){
                        foreach ($hijos as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                    }
                ?>
                </select>
            </div>
            <br><br>
    </div>
      <div class="table-responsive">
         <h4><?= __('Permisos') ?></h4>
                <table class="table table-striped data-table">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Action</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    
                </thead>
                <tbody>
                    <?php foreach ($rolesPermiso as $row): ?>
                        <?php
                            //var_dump($row->permiso['active'] =='1'); die;    
                            if(isset($rolesPermiso)){

                                if($row->permiso['active'] =='1'){
                                    $estado =  '<span class="label label-success">Activo</span>';
                                    
                                }elseif($row->permiso['active'] =='2'){
                                    $estado =  '<span class="label label-danger">Inactivo</span>';
                                }elseif ($row->permiso['active'] =='0') {
                                    $estado =  '<span class="label label-warning">Pendiente</span>';
                                }
                                else{
                                    $estado =  '';
                                }
                            }
                        ?>
                        <tr>
                            <td><?php echo $row['permiso_id']  ?> </td>
                            <td><?php echo $row->permiso['name']  ?> </td>
                            <td><?php echo $row->permiso['action']  ?> </td>
                            <td style="text-align: left;"><?= $estado; ?></td>
                     
                              <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>permisos/view/<?php echo $row['permiso_id'] ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    

                    <?php if($row->permiso['active'] =='1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                    <a id="borrar" class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>rolesPermisos/borrar/<?php echo $row['id'] ?>/<?php echo $role['id']?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash "></i></a>
                    <?php }  ?>
                    
                    
                </td>  
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                </table>
    </div>
    </fieldset>
  
    <hr>
      <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>roles/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
