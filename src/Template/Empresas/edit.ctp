<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="empresas form large-9 medium-8 columns content">
    <?= $this->Form->create($empresa) ?>
    <input type="hidden" name="active" id="active" value="1"> 
    <fieldset>
        <legend><?= __('Edit Empresa') ?></legend>
        <?php
            echo $this->Form->control('Nombre',["id" => "name", "name" => "name", "class" => "form-control", "value" => $empresa['name'], "required" => true]);
            echo $this->Form->control('Rut',["id" => "rut", "name" => "rut", "class" => "form-control", "value" => $empresa['rut'], "required" => true]);
            echo $this->Form->control('Nombre_Softland',["id" => "name_softland", "name_softland" => "rut", "class" => "form-control", "value" => $empresa['name_softland'], "required" => true]);
        ?>
    </fieldset>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>empresas/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
