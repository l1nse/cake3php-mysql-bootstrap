<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="areas form large-9 medium-8 columns content">
    <?= $this->Form->create($area) ?>
    <input type="hidden" name="active" id="active" value="1"> 
    <fieldset>
    <div class="form-group">
        <legend><?= __('Agregar Área') ?></legend>
        <?php
            echo $this->Form->control('Empresa_id', [ "class" => 'form-control', 'id' => 'empresa_id', 'name' => 'empresa_id', 'required' => true] );
            echo $this->Form->control('Nombre' , [ "class" => 'form-control', 'id' => 'name', 'name' => 'name', 'required' => true] );
            
            
            
        ?>
     </div>   
    </fieldset>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>areas/index/">Cancelar</a>
            
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
</div>