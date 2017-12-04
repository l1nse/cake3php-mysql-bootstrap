<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="jefeAreas form large-9 medium-8 columns content">
    <?= $this->Form->create($jefeArea) ?>
    <input type="hidden" name="active" id="active" value="1"> 
    <fieldset>
    <div class="form-group">
        <legend><?= __('Editar Jefe Area') ?></legend>
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <?php
           // echo $this->Form->control('Nombre', ['options' => $fichaPersonales, 'empty' => true,"id" => "area_id", "name" => "area_id", "class" => "form-control",]);
        ?>
        <div class="input select required">
                <label for="users">Asignar Usuario (*)</label>
                <select class="form-control" required="required" id="users" name="users">
                <option value=""></option>
                <?php
                    if(is_array($users) && count($users)>0){
                        foreach ($users as $row) {
                            if($jefeArea->ficha_personale['user_id'] ==$row['id']){
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
           // echo $this->Form->control('area_id', ['options' => $areas, 'empty' => true,"id" => "area_id", "name" => "area_id", "class" => "form-control",]);
            
           // echo $this->Form->control('Nombre', ['options' => $jefeArea->ficha_personale->user['name'].' '.$jefeArea ->ficha_personale->user['apellido1'].' '.$jefeArea ->ficha_personale->user['apellido2'] , 'empty' => true,"id" => "Nombre", "name" => "Nombre", "class" => "form-control",]);


        ?>
        </div>

        <div class="input select required">
                <label for="Areas_Empresa">Area (*)</label>
                 <select class="form-control" required="required" id="area_id" name="area_id">
                <option value=" "></option>
                <?php
                    
                    $area_id = isset($jefeArea ['area_id']) && $jefeArea ['area_id']!='' ? $jefeArea ['area_id'] : '';
                
                       
                    if(is_array($areas) && count($areas)>0){
                         //echo $area_id.'hola'; die;

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
        <hr>
    </fieldset>
       <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>jefe-areas/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>

