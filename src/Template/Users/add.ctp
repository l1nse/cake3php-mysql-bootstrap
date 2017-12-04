<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    
    <fieldset>

        <div class="form-group">
            <legend><?= __('Agregar Usuario') ?></legend>
            <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
            <input type="hidden" name="active" id="active" value="1"> 
            <?php
                /*echo $this->Form->control('username', [ "class" => 'form-control']);
                echo $this->Form->control('password', [ "class" => 'form-control']);
                echo $this->Form->control('role', [ "class" => 'form-control']);*/
                echo $this->Form->control('Email (*)', ["id" => "username", "name" => "username", "class" => "form-control", "value" => $user['username'], "required" => true]);
                echo $this->Form->control('Nombre (*)', ["id" => "name", "name" => "name", "class" => "form-control", "value" => $user['name'], "required" => true]);
                echo $this->Form->control('Apellido Paterno (*)', ["id" => "apellido1", "name" => "apellido1", "class" => "form-control", "value" => $user['apellido1'],"required" => true]);
                echo $this->Form->control('Apellidp Materno', ["id" => "apellido2", "name" => "apellido2", "class" => "form-control", "value" => $user['apellido2']]);
                echo $this->Form->control('password (*)', ["id" => "password", "name" => "password", "class" => "form-control", "value" => $user['password']]);
              //  echo $this->Form->control('role', ["id" => "role", "name" => "role", "class" => "form-control", "options" => [ '' => '' , 'asistente' => 'Asistente', 'gerente' => 'Gerente' , '3' => 'admin' ]]);
            ?>
        </div>
        <div class="form-group">
            <div class="input select required">
                <label for="role_id">Seleccionar Rol (*)</label>
                 <select class="form-control" required="required" id="role_id" name="role_id">
                <option value=""></option>
                <?php
                    if(is_array($roles) && count($roles)>0){
                        foreach ($roles as $row) {
                            if($row['id'] == $user['role_id'])
                            {
                                echo '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
                            }else
                            {
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';    
                            }
                            
                        }
                    }
                ?>
                </select>
            </div>
        </div>
        <hr>
    </fieldset>
    
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>users/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
</div>
