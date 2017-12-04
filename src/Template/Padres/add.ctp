<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    
</nav>
<div class="padres form large-9 medium-8 columns content">
    <?= $this->Form->create($padre) ?>
    <fieldset>
        <legend><?= __('Agregar padre') ?></legend>
        <input type="hidden" name="active" id="active" value="1"> 
        <?php
            echo $this->Form->control('Nombre', ["id" => "name", "name" => "name", "class" => "form-control",  "required" => true])
            
        ?>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>padres/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
</div>
