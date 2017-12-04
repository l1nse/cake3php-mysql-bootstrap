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
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <div class="form-group">
            <div class="input select required">
                <label for="empresa_id">Empresa (*)</label>
                <select class="form-control" id="empresa_id" name="empresa_id">
                <option value=""></option>
                <?php
                    if(is_array($empresas) && count($empresas)>0){
                        foreach ($empresas as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                    }
                ?>
                </select>
            </div>
        </div>
        <?php
            //echo $this->Form->control('Empresa_id', [ "class" => 'form-control', 'id' => 'empresa_id', 'name' => 'empresa_id', 'required' => true] );
            echo $this->Form->control('Nombre (*)' , [ "class" => 'form-control', 'id' => 'name', 'name' => 'name', 'required' => true] );
            
            
            
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