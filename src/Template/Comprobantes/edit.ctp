<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="comprobantes form large-9 medium-8 columns content">
    <?= $this->Form->create($comprobante) ?>
    <input type="hidden" name="active" id="active" value="1"> 
    
    <fieldset>
    <div class="form-group">
    <legend><?= __('Editar Comprobante') ?></legend>

         <div class="form-group">
                <div class="input select required">
                    <label for="user_asignado_id">Concepto</label>
                     <select class="form-control" required="required" id="tipo_item_id" name="tipo_item_id">
                    <option value=""></option>
                    <?php
                        if(is_array($items) && count($items)>0){
                            foreach ($items as $row) {
                                if($comprobante->tipo_item['id'] == $row['id'])
                                {
                                    echo '<option value="'.$row['id'].'" selected="selected">'.' '.$row['name'].'</option>';
                                    
                                }else{
                                echo '<option value="'.$row['id'].'">'.' '.$row['name'].'</option>';
                                }
                            }
                        }
                        
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input select required">
                    <label for="user_asignado_id">Numero cuenta softland</label>
                     <select class="form-control" required="required" id="numero_cuenta_ficha" name="numero_cuenta_ficha">
                    <option value=""></option>
                    <?php
                        if(is_array($numeroCuenta) && count($numeroCuenta)>0){
                            foreach ($numeroCuenta as $row) {
                                if($row['PCCODI'] ==  $comprobante->numero_cuenta_ficha)
                                {
                                    echo '<option value="'.$row['PCCODI'].'" selected="selected">'.' '.$row['PCCODI'].'==> '.$row['PCDESC'].'</option>';    
                                }else{
                                    echo '<option value="'.$row['PCCODI'].'">'.' '.$row['PCCODI'].'==> '.$row['PCDESC'].'</option>';    
                                }

                                //echo '<option value="'.$row['PCCODI'].'">'.' '.$row['PCCODI'].'==> '.$row['PCDESC'].'</option>';
                                
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
        <?php
      //     echo $this->Form->control('Nombre' , ["id" => "name", "name" => "name", "class" => "form-control", "value" => $comprobante['name'] , "required" => true]); 
            //echo $this->Form->control('concepto_ficha', ["id" => "tipo_item_id", "name" => "tipo_item_id", "class" => "form-control", "value" => $comprobante->tipo_item['name'] , "required" => true]); 
            //echo $this->Form->control('numero_cuenta_ficha' , ["id" => "numero_cuenta_ficha", "name" => "numero_cuenta_ficha", "class" => "form-control", "value" => $comprobante['numero_cuenta_ficha'] , "required" => true]);  

            echo $this->Form->control('tipo_asiento');

            echo $this->Form->control('glosa', ["id" => "glosa_ficha", "name" => "glosa_ficha", "class" => "form-control", "value" => $comprobante['glosa_ficha'] , "required" => true]); 
            echo $this->Form->control('tipo_documento1_ficha');
           // echo $this->Form->control('tipo_documento2_ficha', ["id" => "tipo_documento2_ficha", "name" => "tipo_documento2_ficha", "class" => "form-control", "value" => $comprobante['tipo_documento2_ficha'] , "required" => true]); 
            ?>
             <div class="form-group">
                <div class="input select required">
                    <label for="user_asignado_id">Tipo de documento</label>
                     <select class="form-control" required="required" id="tipo_documento2_ficha" name="tipo_documento2_ficha">
                    <option value=""></option>
                    <?php
                        if(is_array($tipoDocumento) && count($tipoDocumento)>0){
                            foreach ($tipoDocumento as $row) {
                                if($row['CodDoc'] ==  $comprobante->tipo_documento2_ficha)
                                {
                                    echo '<option value="'.$row['CodDoc'].'" selected="selected">'.' '.$row['CodDoc'].' ==> '.$row['DesDoc'].'</option>';
                                }else{
                                    echo '<option value="'.$row['CodDoc'].'">'.' '.$row['CodDoc'].' ==> '.$row['DesDoc'].'</option>';
                                }
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>    
            <?php
            echo $this->Form->control('numero_documento_ficha');
            
        ?>
     </div>   
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>comprobantes/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>

