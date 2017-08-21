<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    
<div class="cargos form large-9 medium-8 columns content">

    <?= $this->Form->create($cargo) ?>
    <fieldset>
        <legend><?= __('Editar Cargo') ?></legend>

          <div class="input select required">
                <label for="Areas_Empresa">Area</label>
                 <select class="form-control" required="required" id="area_id" name="area_id">
                <option value=" "></option>
                <?php
                    $area_id = isset($cargo['area_id']) && $cargo['area_id']!='' ? $cargo['area_id'] : '';
                       // echo $area_id.'hola'; die;
                    if(is_array($areas) && count($areas)>0){

                        foreach ($areas as $row) {
                            if($area_id==$row['id']){
                                echo '<option value="'.$row['id'].'" selected="selected">'.$row['empresa']['name'].' => ' .$row['name']. '</option>';
                            }else{
                                echo '<option value="'.$row['id'].'">'.$row['name'].' => '.$row['empresa']['name'].' => ' .$row['name']. '</option>';
                            } 
                        }    
                    }
                ?>
                </select>
        </div>        
        <?php
            echo $this->Form->control('nombre' ,["id" => "empresa_id", "name" => "name", "class" => "form-control", "value" => $cargo['name'], 'required' => true]);
         //   echo $this->Form->control('area_id',["id" => "area_id", "name" => "area_id", "class" => "form-control", "value" => $cargo['area_id']]);
            
        ?>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>cargos/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div> 

    <?= $this->Form->end() ?>
    
</div>
