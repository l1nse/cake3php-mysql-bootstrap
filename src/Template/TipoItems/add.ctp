<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="tipoItems form large-9 medium-8 columns content">

    <?= $this->Form->create($tipoItem) ?>
    <fieldset>

        <legend><?= __('Crear Item') ?></legend>
        <input type="hidden" name="active" id="active" value="1"> 
        <?php
             echo $this->Form->control('Nombre', ["id" => "name", "name" => "name", "class" => "form-control", "value" => $tipoItem['name'], "required" => true])
            
        ?>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>tipoItems/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
</div>
