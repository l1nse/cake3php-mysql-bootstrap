<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('entidades') ?>
<div class="sistemas form large-9 medium-8 columns content">
    <?= $this->Form->create($sistema) ?>
    <input type="hidden" name="active" id="active" value="1"> 
    <fieldset>
        <legend><?= __('Add Sistema') ?></legend>
        <div class="form-group">
            <?php
                echo $this->Form->control('Nombre' , ["id" => "name", "name" => "name", "class" => "form-control", "value" => $sistema['name'], "required" => true]);
                echo $this->Form->control('Nombre_contacto' , ["id" => "name_contacto", "name" => "name_contacto", "class" => "form-control", "value" => $sistema['name'], "required" => true]);
                echo $this->Form->control('Email' , ["id" => "email_contacto", "name" => "email_contacto", "class" => "form-control correo", "value" => $sistema['name'], "required" => true]);
                echo $this->Form->control('Rut_empresa' , ["id" => "rut_empresa", "name" => "rut_empresa", "class" => "form-control", "value" => $sistema['name'], "required" => true]);
                echo $this->Form->control('Nombre_empresa',  ["id" => "name_empresa", "name" => "name_empresa", "class" => "form-control", "value" => $sistema['name'], "required" => true]);
                echo $this->Form->control('direccion_empresa' ,   ["id" => "direccion_empresa", "name" => "direccion_empresa", "class" => "form-control", "value" => $sistema['name'], "required" => true]);
                
            ?>
        </div>
    </fieldset>
    <hr>
    <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>sistemas/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
