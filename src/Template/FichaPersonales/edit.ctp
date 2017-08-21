<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('fichaPersonales') ?>

<div class="fichaPersonales form large-9 medium-8 columns content">

    
    <?= $this->Form->create($fichaPersonale) ?>
    <input type="hidden" id="area_hidden" name="area_hidden" value="<?php echo $fichaPersonale['area_id']; ?>">
    <input type="hidden" id="cargo_hidden" name="cargo_hidden" value="<?php echo $fichaPersonale['cargo_id']; ?>">
    <fieldset>
        <div class="form-group">
            <legend><?= __('Editar Ficha Personal') ?></legend>
          <div class="form-group">
        <?php
            echo(" <u> <strong>Datos obligatorios : </u> </strong><br><br> ");
            //echo $this->Form->control('empresa_id', ['options' => $empresas, 'empty' => true, "class" => 'form-control']);
             ?>
            <div class="form-group">
              <?php
            echo $this->Form->control('empresa_id', ['options' => $empresas, 'empty' => true, "class" => 'form-control', 'required' => true , 'id' => 'empresa_id', 'name' => 'empresa_id']);
            ?>
                
                
            </div>
        </div>

        <div class="form-group">
            <?php

                echo $this->Form->control('Área', [ 'id' => 'area_id', 'options' => $areas ,'name' => 'area_id', 'empty' => true, "class" => 'form-control']);
            ?>
        </div>
        <div class="form-group">
                <?php
                    echo $this->Form->control('Cargo_id', [ 'empty' => true, 'id' => 'cargo_id', 'value' => $fichaPersonale->area['name'] ,'name' => 'cargo_id','options' => $cargos ,"class" => 'form-control']);
                ?>
        </div>

         
        <?php
                
             

                echo $this->Form->control('tipo_movimiento_id', ["id" => "tipo_movimiento_id", "name" => "tipo_movimiento_id", "class" => "form-control", "value" => $fichaPersonale['tipo_movimiento_id']]);
                


                echo(" <strong><br><br>  <u> Antecedentes personales : </u> </strong> <br><br> ");

                echo $this->Form->control('Nombre' , ["id" => "name", "name" => "name", "class" => "form-control", "value" => $fichaPersonale['name']]);

                echo $this->Form->control('Apellido Paterno',["id" => "apellido1", "name" => "apellido1", "class" => "form-control", "value" => $fichaPersonale->user['apellido1']]);

                echo $this->Form->control('Apellido Materno',["id" => "apellido2", "name" => "apellido2", "class" => "form-control", "value" => 
                    $fichaPersonale->user['apellido2']]);

                echo $this->Form->control('email',["id" => "email", "name" => "email", "class" => "form-control", 'disabled' => true , "value" => $fichaPersonale['email']]);

                echo $this->Form->control('rut (*)', ["class" => 'form-control', 'id' => 'rut', 'name' => 'rut' , 'value' => $fichaPersonale['rut']]);

                ?>


                

                <div class="input text">
                <label >Fecha de nacimiento</label>
                <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control datetime " type="text" value="<?php echo $fichaPersonale['fecha_nacimiento']; ?>" ?>

                </div>  

                <?php


                echo $this->Form->control('Estado civil', ["class" => 'form-control', 'options' => [ '' => '' , '1' => 'Soltero', '2' => 'Casado' , '3' => 'Viudo' ], "value"=> $fichaPersonale->estado_civil , 'id' => 'tipo', 'name' => 'tipo']);

                //echo $this->Form->control('cargo_id', ["id" => "cargo_id", "name" => "cargo_id", "class" => "form-control", "value" => $fichaPersonale['cargo_id']]);
               

               // echo $this->Form->control('fecha_nacimiento', ["id" => "fecha_nacimiento", "name" => "fecha_nacimiento", "class" => "form-control", "value" => $fichaPersonale['fecha_nacimiento']]);


                //echo $this->Form->control('estado_civil',["id" => "estado_civil", "name" => "estado_civil", "class" => "form-control", "value" => $fichaPersonale['estado_civil']]);}


                 // echo $this->Form->control('estado_civil',["id" => "estado_civil", "name" => "estado_civil", "class" => "form-control", "value" => $civil ]);
                
              
                echo $this->Form->control('paise_id', ["id" => "paise_id", "name" => "paise_id", "class" => "form-control", "value" => $fichaPersonale['paise_id']]);

                echo $this->Form->control('ciudade_id', ["id" => "ciudade_id", "name" => "ciudade_id", "class" => "form-control", "value" => $fichaPersonale['ciudade_id']]);
                echo $this->Form->control('comuna_id', ["id" => "comuna_id", "name" => "comuna_id", "class" => "form-control", "value" => $fichaPersonale['comuna_id']]);
                echo $this->Form->control('Dirección',["id" => "direccion", "name" => "direccion", "class" => "form-control", "value" => $fichaPersonale['direccion']]);
                echo $this->Form->control('Extensión' , ["id" => "telefono", "name" => "telefono", "class" => "form-control phone", "value" => $fichaPersonale['telefono']]);
                echo $this->Form->control('celular', ["id" => "celular", "name" => "celular", "class" => "form-control phone", "value" => $fichaPersonale['celular']]);

                echo(" <u> <br><br><strong>Contacto emergencia : </u> </strong><br><br> ");

                echo $this->Form->control('nombre_emergencia',["id" => "nombre_emergencia", "name" => "nombre_emergencia", "class" => "form-control", "value" => $fichaPersonale['nombre_emergencia']]);
                echo $this->Form->control('Teléfono_emergencia', ["id" => "telefono_emergencia", "name" => "telefono_emergencia", "class" => "form-control phone", "value" => $fichaPersonale['telefono_emergencia']]);

                echo(" <br><br> <u> <strong>Datos de pago </u> </strong><br><br> ");

                echo $this->Form->control('tipo_cuenta_id', ["id" => "tipo_cuenta_id",  'empty' => true  ,"name" => "tipo_cuenta_id", "class" => "form-control", "options" => $fichaPersonale['tipo_cuenta_id'] ]);
                echo $this->Form->control('numero_cuenta', ["id" => "numero_cuenta", "name" => "numero_cuenta", "class" => "form-control", "value" => $fichaPersonale['numero_cuenta']]);
                
                echo $this->Form->control('banco_id', ["id" => "banco_id", "name" => "banco_id", "class" => "form-control", "value" => $fichaPersonale['banco_id']]);

                echo(" <br><br> <u> <strong>Datos previcionales : </u> </strong><br><br> ");

                echo $this->Form->control('afp_id', ["id" => "afp_id", "name" => "afp_id", "class" => "form-control", "value" => $fichaPersonale['afp_id']]);
                 echo $this->Form->control('isapre_id', ["id" => "isapre_id", "name" => "isapre_id", "class" => "form-control", "value" => $fichaPersonale['isapre_id']]);
                  echo $this->Form->control('valor_isapre' , ["id" => "valor_isapre", "name" => "valor_isapre", "class" => "form-control", "value" => $fichaPersonale['valor_isapre']]);
                echo $this->Form->control('apv', ["id" => "apv", "name" => "apv", "class" => "form-control", "value" => $fichaPersonale['apv']]);
                echo $this->Form->control('ahorro_cta2', ["id" => "ahorro_cta2", "name" => "ahorro_cta2", "class" => "form-control", "value" => $fichaPersonale['ahorro_cta2']]);
               
               
               
            ?>
        </div>   
    </fieldset>
      <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>fichaPersonales/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
</div>
</div>
