<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <div class="form-group">
            <legend><?= __('Crear rol') ?></legend>
            <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
            <input type="hidden" name="active" id="active" value="1"> 
            <?php
                echo $this->Form->control('Nombre (*)', ["id" => "name", "name" => "name", "class" => "form-control", "value" => $role['name'], "required" => true]);
                //echo $this->Form->control('active');
            ?>
        </div>
        
    
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
                <label for="permiso_id">Asignar Permisos hijo (*)</label> 
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
</div>
