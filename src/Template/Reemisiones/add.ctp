<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="reemisiones form large-9 medium-8 columns content">
    <?= $this->Form->create($reemisione) ?>
    <fieldset>
        <input type="hidden" name="contadoral" value="<?php echo $contadoral?>">
        <input type="hidden" name="contadortkt" value="<?php echo $contadortkt?>">
        <div class="form-group">
            <legend><?= __('Agregar Reemisione') ?></legend>
            <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
            <?php
                echo $this->Form->control('AIR', [ "class" => 'form-control', 'id' => 'AIR', 'name' => 'AIR', 'value'=>'-BLK206;7A;;230;0000000000;1A1098553;001001', 'required' => true] );
                echo $this->Form->control('AMD', [ "class" => 'form-control', 'id' => 'AMD', 'name' => 'AMD', 'required' => true] );
                echo $this->Form->control('1A', [ "class" => 'form-control', 'id' => 'AIR', 'name' => 'AIR', 'value'=>'1098553;1A1098553', 'required' => true] );
                echo $this->Form->control('4', [ "class" => 'form-control', 'id' => 'AIR', 'name' => 'AIR', 'value'=>'', 'required' => true] );
                echo $this->Form->control('A- Linea aerea', [ "class" => 'form-control', 'id' => 'A', 'name' => 'A', 'required' => true] );
                echo $this->Form->control('B- ', [ "class" => 'form-control', 'id' => 'A', 'name' => 'A', 'required' => true] );
                echo $this->Form->control('C- ', [ "class" => 'form-control', 'id' => 'A', 'name' => 'A', 'required' => true] );
                
                echo $this->Form->control('K', [ "class" => 'form-control', 'id' => 'K', 'name' => 'K', 'required' => true] );
                echo $this->Form->control('M', [ "class" => 'form-control', 'id' => 'M', 'name' => 'M', 'required' => true] );
                echo $this->Form->control('N', [ "class" => 'form-control', 'id' => 'N', 'name' => 'N', 'required' => true] );
                echo $this->Form->control('O', [ "class" => 'form-control', 'id' => 'O', 'name' => 'O', 'required' => true] );
                echo $this->Form->control('Q', [ "class" => 'form-control', 'id' => 'Q', 'name' => 'Q', 'required' => true] );
                echo $this->Form->control('I', [ "class" => 'form-control', 'id' => 'I', 'name' => 'I', 'required' => true] );
                echo $this->Form->control('T_K', [ "class" => 'form-control', 'id' => 'T_K', 'name' => 'T_K', 'required' => true] );
                echo $this->Form->control('F', [ "class" => 'form-control', 'id' => 'F', 'name' => 'F', 'required' => true] );
                echo $this->Form->control('FP', [ "class" => 'form-control', 'id' => 'FP', 'name' => 'FP', 'required' => true] );
                echo $this->Form->control('FVLA', [ "class" => 'form-control', 'id' => 'FVLA', 'name' => 'FVLA', 'required' => true] );
                echo $this->Form->control('FM', [ "class" => 'form-control', 'id' => 'FM', 'name' => 'FM', 'required' => true] );
                echo $this->Form->control('TK', [ "class" => 'form-control', 'id' => 'TK', 'name' => 'TK', 'required' => true] );
                echo $this->Form->control('AI', [ "class" => 'form-control', 'name' => 'AI', 'id' => 'AI', 'required' => true] );
            ?>  
            <br>
            
                <?php                                    
                    if($contadortkt > 0)
                    {
                        if($contadortkt < 6)
                        {

                            for ($i=0; $i < $contadortkt ; $i++) { 
                                   
                                echo $this->Form->control('TKT ida', [ "class" => 'form-control', 'name' => 'tktida'.$i, 'id' => 'tktida'.$i, 'required' => true] );
                                echo $this->Form->control('TKT vuelta', [ "class" => 'form-control', 'name' => 'tktvuelta'.$i, 'id' => 'tktvuelta'.$i, 'required' => true] );
                            }
                        }else
                        {
                            var_dump("Tiket en conjuncion"); die;
                        }
                    }
                ?>
                <br>
                <div class="col-md-12 col-xs-12">
                        <a class="btn btn-success btn-xs" id="btn_guardar" name="btn_guardar" href="<?php echo APP_URI; ?>reemisiones/agregarDetalleTiket/<?php echo $contadortkt ?>/<?php echo $contadoral ?>">Agregar Detalle ticket</a>
                </div>
                <br>
                <br> 
                
                
                 <?php                                    
                    if($contadoral > 0)
                    {
                        if($contadoral < 100)
                        {
                            
                            for ($i=0; $i < $contadoral ; $i++) { 
                                
                              //  echo $this->Form->control('Comentario Aeroliena', [ "class" => 'form-control', 'name' => 'comentario'.$i, 'id' => 'comentario'.$i, 'required' => true] );
                                ?>
                    <div class="form-group ">
                            
                            <div class="col-md-3 col-xs-12">
                                    <label for="tipomensaje"  >Comentario : </label>                            
                           
                                    <select style="width: 15em"> name="tipomensaje<?php echo $i ?>" >
                                      <option value=""></option>
                                      <option value="1">SSR OTHS</option>
                                      <option value="2">SSR DOCS</option>
                                      <option value="3">SSR CKIN</option>                                      
                                    </select>
                                
                            </div>
                            <div class="col-md-9 col-xs-12 ">
                                
                                <input type="text" class="form-control "  name="<?php echo 'comentario'.$i ?>" >
                            </div>
                            <br>
                            <br>
                            <br>


                            <?php
                            }
                        }else
                        {
                            var_dump("no meta mano!"); die;
                        }

                        
                    }
                            ?>
                </div>        
                

                <div class="col-md-12 col-xs-12">
                    <a class="btn btn-success btn-xs" id="btn_guardar" name="btn_guardar" href="<?php echo APP_URI; ?>reemisiones/agregarComentarioAerolinea/<?php echo $contadortkt ?>/<?php echo  $contadoral ?>">Agregar Mensaje Aeroliena</a>
                </div>

                  
        </div>
        
    </fieldset>

    
    
    <br>
    <div class="col-md-10 col-xs-12 " >
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    <div class="col-md-2 col-xs-12 ">
        
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>areas/index/">Cancelar</a>
    </div>        
    <?= $this->Form->end() ?>
</div>
