<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <input type="hidden" name="active" id="active" value="1"> 
    <fieldset>
    <div class="form-group">
        <legend><?= __('Cambiar Password') ?></legend>
        <?php
            echo $this->Form->control('Email', ["id" => "username", "name" => "username", "class" => "form-control", "value" => $user['username'], "disabled" => true]);
            //echo $this->Form->control('Nombre', ["id" => "name", "name" => "name", "class" => "form-control", "value" => $user['name']]);
            //echo $this->Form->control('Apellido Paterno', ["id" => "apellido1", "name" => "apellido1", "class" => "form-control", "value" => $user['apellido1']]);
            //echo $this->Form->control('Apellidp Materno', ["id" => "apellido2", "name" => "apellido2", "class" => "form-control", "value" => $user['apellido2']]);
            echo $this->Form->control('password', ["id" => "password", "name" => "password", "class" => "form-control", "value" => '']);
            //echo $this->Form->control('role', ["id" => "role", "name" => "role", "class" => "form-control", "value" => $user['role']]);
           
        ?>
    </div>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>tickets/home/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
