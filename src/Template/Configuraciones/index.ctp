<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('configuraciones') ?>
<h3 class="page-header"><?= __('Configuraciones') ?></h3>
<div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
 <div class="form-group">

 <!--<input type="hidden" name="active" id="tipo_descripcion" value="1"> -->
    <row>  

     <?php 
     if(isset($configuraciones) && count($configuraciones) > 0)
        {
        ?> <label for="tipo_descripcion">URL AIR (*):</label>    <?php 
            if($configuraciones[0]!= '' && isset($configuraciones[0]))
            {
                if($configuraciones[0]['tipo_descripcion'] == 1)
                {
                    ?> <input type="text" name="parametroAIR" id="parametroAIR" value="<?php echo $configuraciones[0]['parametro']?>" required class="form-control"> <?php
                }else
                {
                    ?> <input type="text" name="parametroAIR" id="parametroAIR" value="" class="form-control" required > <?php
                }
            }
          ?>   
          <!-- <input type="hidden" name="tipo_descripcion1" id="tipo_descripcion1" value="1"> -->  
    </row><br>
    <row>  
        <label for="tipo_descripcion">Base de datos softland (*) :</label>
          <!--<input type="hidden" name="tipo_descripcion2" id="tipo_descripcion2" value="2">-->
          <?php 
            if($configuraciones[0]!= '' && isset($configuraciones[0]))
            {
                if($configuraciones[0]['tipo_descripcion'] == 2)
                {
                    ?> <input type="text" name="parametroBD" id="parametroBD" value="<?php echo $configuraciones[0]['parametro']?>" class="form-control" required > <?php
                }else
                {
                    if( isset($configuraciones[1]) && $configuraciones[1]!= '' )
                    {
                        if($configuraciones[1]['tipo_descripcion'] == 2)
                        {
                            ?> <input type="text" name="parametroBD" id="parametroBD" value="<?php echo $configuraciones[1]['parametro']?>" class="form-control" required > <?php
                        }else
                        {
                            ?> <input type="text" name="parametroBD" id="parametroBD" value="" class="form-control" required > <?php
                        }    
                    }else
                    {
                        ?> <input type="text" name="parametroBD" id="parametroBD" value="" class="form-control" required > <?php
                    }
                    
                }
            }else{
                var_dump("expression"); die;
            }
        }else
        {
            ?>
            <label for="tipo_descripcion">URL AIR :</label>
            <input type="text" name="parametroAIR" id="parametroAIR" value="" class="form-control" required >
            <label for="tipo_descripcion">Base DATOS SOFTLAND :</label>
            <input type="text" name="parametroBD" id="parametroBD" value="" class="form-control" required > <?php 
        }
      ?>   
      
    </row>
</div>
<row>
     
     <div class="col-md-1 ">
        <br>
                    <a class="btn btn-danger" id="btn_cancelar" name="btn_cancelar" href="<?php echo APP_URI; ?>users/home/">Cancelar</a>
     </div>
     <div class="col-md-1 col-md-offset-10">
        <br>
                    <a class="btn btn-success" id="btn_guardar" name="btn_guardar" >Guardar</a>
     </div>
</row>
    
</div>

