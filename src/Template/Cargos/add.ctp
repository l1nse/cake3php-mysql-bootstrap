<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="cargos form large-9 medium-8 columns content">
    <?= $this->Form->create($cargo) ?>
    <fieldset>
    <input type="hidden" name="active" id="active" value="1"> 
    <div class="form-group">
        <legend><?= __('Agregar Cargo') ?></legend>
        <?php
            echo $this->Form->control('Nombre', [ "class" => 'form-control', 'id' => 'name', 'name' => 'name', 'required' => true] );
            //echo $this->Form->control('area_id',[ "class" => 'form-control', 'id' => 'area_id', 'name' => 'area_id', 'required' => true] );    
        ?>

       
        <div class="input select required">
                <label for="Areas_Empresa">Area</label>
                 <select class="form-control" required="required" id="area_id" name="area_id">
                <option value=""></option>
                <?php
                    if(is_array($empresas) && count($empresas)>0){
                        foreach ($empresas as $row) {
                            foreach ($areas as  $row2) {
                                if($areas['empresa_id'] == $empresas['id'])
                                {
                                    if($row['id'] == $row2['empresa_id'])
                                    {

                                        echo '<option value="'.$row2['id'].'">'.$row['name'].' '.$row2['name']. '</option>';
                                    }
                                }
                        }
                            }
                            
                    }
                ?>
                </select>
        </div>        

        <div class="form-group">
                <?php
                    echo $this->Form->control('Cargo_id', [ 'empty' => true, 'id' => 'cargo_id', 'name' => 'cargo', "class" => 'form-control']);
                ?>
        </div>


    </fieldset>
     <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>cargos/index/">Cancelar</a>
            
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
</div>
