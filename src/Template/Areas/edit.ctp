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
        <legend><?= __('Editar Área') ?></legend>
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <div class="input select required">
                <label for="empresa_id">Empresa (*)</label>
                <select class="form-control" required="required" id="empresa_id" name="empresa_id">
                <option value=""></option>
                <?php
                    if(is_array($empresas) && count($empresas)>0){
                        foreach ($empresas as $row) {
                            if($area['empresa_id'] ==$row['id']){
                                echo '<option value="'.$row['id'].'" selected="selected">'.$row['name'].' '.$row['apellido1'].'</option>';
                            }else{
                                echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';
                            }
                            
                        }
                    }
                ?>
                </select>
            </div>
        <?php
           // echo $this->Form->control('Empresa_id', ["id" => "empresa_id", "name" => "empresa_id", "class" => "form-control", "value" => $area['empresa_id'], 'required' => true]);
            
            echo $this->Form->control('Nombre (*)',  ["id" => "name", "name" => "name", "class" => "form-control", "value" => $area['name'], 'required' => true]);

        ?>
    </div>
    </fieldset>
     <hr>   
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-danger" href="<?php echo APP_URI; ?>areas/index/">Cancelar</a>
                <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
            </div>
            <div class="col-md-1 col-md-offset-5">
                <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
            </div>
    </div>
     
    <?= $this->Form->end() ?>
</div>

