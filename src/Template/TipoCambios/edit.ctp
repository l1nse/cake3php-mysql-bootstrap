<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="tipoCambios form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoCambio) ?>
    <input type="hidden" id="active" name="active" value="1" ?>
    <fieldset>
        <legend><?= __('Editar Tipo Cambio') ?></legend>
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <?php
            echo $this->Form->control('Nombre (*)' , [ "class" => 'form-control' , 'id' => 'name', 'name' => 'name', 'required' => true, "value" => $tipoCambio['name'] ]);
            
        ?>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>tipo-cambios/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
</div>
