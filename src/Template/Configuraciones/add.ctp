<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="configuraciones form large-9 medium-8 columns content">
    <?= $this->Form->create($configuracione) ?>
    <fieldset>
        <div class="form-group">
            <legend><?= __('Agregar Configuración') ?></legend>
            <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
            <div class="form-group">
                <div class="input select required">
                    <label for="tipo_descripcion">Tipo Descripción (*)</label>
                    <select class="form-control" id="tipo_descripcion" name="tipo_descripcion" required="true">
                        <option value=""></option>
                        <option value="1">URL AIR</option>
                        <option value="2">BASE DATOS SOFTLAND</option>
                    </select>
                </div>
            </div>
            <?php
                
                echo $this->Form->control('parametro (*)', [ "class" => 'form-control', 'id' => 'parametro', 'name' => 'parametro', 'required' => true] );
                //echo $this->Form->control('active');
            ?>
            <input hidden name="active" id="active" value="1"?>
    </fieldset>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>configuraciones/index/">Cancelar</a>
            
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    
    <?= $this->Form->end() ?>
</div>
