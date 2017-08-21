<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="bsps form large-9 medium-8 columns content">
    <?= $this->Form->create($bsp, array('class' => 'formulario','enctype' => "multipart/form-data", 'id' => 'frm_add')) ?>
    <fieldset>
        <legend><?= __('Cargar BSP') ?></legend>
        <div class="form-group">
            <?php
                echo $this->Form->control('Año', ["class" => "form-control", "id" => "ano", "name" => "ano", "options" => ["" => "", "2016" => "2016", "2017" => "2017"], 'required' => true]);
                echo $this->Form->control('Mes', ["class" => "form-control", "id" => "mes", "name" => "mes", "options" => ["" => "", "1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre"], 'required' => true]);
                echo $this->Form->control('Semana', ["class" => "form-control", "id" => "semana", "name" => "semana", "options" => ["" => "", "1" => "Uno", "2" => "Dos", "3" => "Tres", "4" => "Cuatro", "5" => "Cinco"], 'required' => true]);

                echo $this->Form->input('Cargar Archivo BSP',['type' => 'file', 'id' => 'file_bsp', 'name' => 'file_bsp']);
            ?>
        </div>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>bsps/index/">Cancelar</a>
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success', 'id' => 'btn_guardar')) ?>
        </div>
    </div>
    
    <?= $this->Form->end() ?>
</div>
