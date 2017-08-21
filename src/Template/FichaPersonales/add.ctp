<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('fichaPersonales') ?>

<div class="fichaPersonales form large-9 medium-8 columns content">
    <?= $this->Form->create($fichaPersonale) ?>
    <input type="hidden" name="active" id="active" value="1"> 
    <input type="hidden" id="area_hidden" name="area_hidden" value="0" ?>
    <!--<input type="hidden" name="sub_sistema_id_hd" id="sub_sistema_id_hd" value=""> -->
    <fieldset>
        <legend><?= __('Agregar Ficha Personales') ?></legend>

         <div class="form-group">
            <div class="input select required">
                <label for="user_asignado_id">Asignar Usuario</label>
                 <select class="form-control" required="required" id="user_id" name="user_id">
                <option value=""></option>
                <?php
                    if(is_array($userAsignados) && count($userAsignados)>0){
                        foreach ($userAsignados as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].' '.$row['apellido2'].'</option>';
                        }
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="form-group">
        <?php
            echo(" <u> <strong>Datos obligatorios : </u> </strong><br><br> ");
            //echo $this->Form->control('empresa_id', ['options' => $empresas, 'empty' => true, "class" => 'form-control']);
             ?>
            <div class="form-group">
              <?php
            echo $this->Form->control('Empresa_id', ['options' => $empresas, 'empty' => true, "class" => 'form-control', 'required' => true , 'id' => 'empresa_id', 'name' => 'empresa_id']);
            ?>
                
                </select>
            </div>
        </div>
        <div class="form-group">
                <?php
                  //  echo $this->Form->control('Área', [ 'empty' => true, 'id' => 'area_id', 'name' => 'area_id', 'required' => true ,'required' => true,"class" => 'form-control']);
                echo $this->Form->control('Área', [ 'id' => 'area_id', 'options' => $areas ,'name' => 'area_id', 'empty' => true, "class" => 'form-control']);
                ?>
        </div>
        <!--<div class="form-group">
                <?php
                    //echo $this->Form->control('Cargo_id', [ 'empty' => true, 'id' => 'cargo_id', 'name' => 'cargo', "class" => 'form-control']);
                ?>
        </div>-->
        <div class="form-group">
                <?php
                    echo $this->Form->control('Cargo_id', [ 'empty' => true, 'id' => 'cargo_id', 'required' => true,'name' => 'cargo_id','options' => $cargos ,"class" => 'form-control']);
                ?>
        </div>

        <?php
            echo $this->Form->control('tipo_movimiento_id', ['options' => $tipoMovimientos, 'empty' => true,'required' => true , "class" => 'form-control']);

            //areas se llena segun el sistema elegido
            
            ?>
            
            <?php


            echo(" <strong><br><br>  <u> Antecedentes personales : </u> </strong> <br><br> ");
            ?>
           
        <?php
            echo $this->Form->control('nombre', [ "class" => 'form-control', 'disabled' => true, 'id' => 'nombre', 'name' => 'nombre', 'required' => true]);
            echo $this->Form->control('apellido paterno', [ "class" => 'form-control', 'disabled' => true, 'id' => 'apellido1', 'name' => 'apellido1','required' => true]);
            echo $this->Form->control('apellido materno', [ "class" => 'form-control', 'disabled' => true, 'id' => 'apellido2', 'name' => 'apellido2'/*, 'required' => true*/]); 
            echo $this->Form->control('email', [ "class" => 'form-control', 'disabled' => true]);
            echo $this->Form->control('rut (*)', ["class" => 'form-control', 'id' => 'rut', 'name' => 'rut']);

            
            //echo $this->Form->control('fecha_nacimiento', ['empty' => true, "class" => 'form-control']);   
            ?>
             <div class="input text">
                <label >Fecha de nacimiento</label>
                <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control datetime " type="text"   ?>
            </div>
            <?php
                 
            echo $this->Form->control('estado_civil', [ "class" => 'form-control', "options" => [ '' => '' , '1' => 'Soltero', '2' => 'Casado' , '3' => 'Viudo' ] ]);



            echo $this->Form->control('paises', [ "class" => 'form-control','id' => 'paises_id', 'name' => 'paises_id']);    
            echo $this->Form->control('ciudades', [ "class" => 'form-control','id' => 'ciudades', 'name' => 'ciudades']);
            echo $this->Form->control('comuna', [ 'empty' => true, "class" => 'form-control']);
            echo $this->Form->control('dirección', [ "class" => 'form-control']);
            echo $this->Form->control('Extensión', [ "class" => 'form-control phone','id' => 'telefono','required' => true , 'name' => 'telefono']);
            echo $this->Form->control('celular', [ "class" => 'form-control phone']);
            

            echo(" <u> <br><br><strong>Contacto emergencia : </u> </strong><br><br> ");

            echo $this->Form->control('nombre_emergencia', [ "class" => 'form-control']);
            echo $this->Form->control('teléfono_emergencia', [ "class" => 'form-control phone']);    

            echo(" <br><br> <u> <strong>Datos de pago </u> </strong><br><br> ");

            echo $this->Form->control('tipo_cuenta_id', ["id" => "tipo_cuenta_id",  'empty' => true  ,"name" => "tipo_cuenta_id", "class" => "form-control", "options" => $fichaPersonale['tipo_cuenta_id'] ]);
            echo $this->Form->control('número_cuenta', [ "class" => 'form-control']);    
            echo $this->Form->control('banco_id', ['options' => $bancos, 'empty' => true, "class" => 'form-control']);

            echo(" <br><br> <u> <strong>Datos previcionales : </u> </strong><br><br> ");
            echo $this->Form->control('afp_id', ['options' => $afps, 'empty' => true, "class" => 'form-control']);
            echo $this->Form->control('isapre_id', ['options' => $isapres, 'empty' => true, "class" => 'form-control']);
            echo $this->Form->control('valor_isapre', [ "class" => 'form-control']);
            echo $this->Form->control('apv', [ "class" => 'form-control']);
            echo $this->Form->control('ahorro_cta2', [ "class" => 'form-control']);

    //        echo(" <br><br> <u> <strong>Antecedetes de renumeraciones : </u> </strong><br><br> ");
    //        echo $this->Form->control('Sueldo', [ "class" => 'form-control']);
    //        echo $this->Form->control('Movilización', [ "class" => 'form-control']);
    //        echo $this->Form->control('Colación', [ "class" => 'form-control']);
    //        echo $this->Form->control('Gratificación', [ "class" => 'form-control']);
    //        echo $this->Form->control('Otro ingreso', [ "class" => 'form-control']);
    //        echo $this->Form->control('Total ingreso base', [ "class" => 'form-control']);

       //     echo(" <br><br> <u> <strong>Fechas del contrato : </u> </strong><br><br> ");
       //     echo $this->Form->control('tipo_contrato', [ "class" => 'form-control']);
       //     echo $this->Form->control('Fecha inicio', [ "class" => 'form-control']);  
       //     echo $this->Form->control('Fecha termino', [ "class" => 'form-control']);      

         //   echo(" <br><br> <u> <strong>Antecedetes administrativos : </u> </strong><br><br> ");
         //   echo $this->Form->control('Sucursal', ['options' => $areas, 'empty' => true, "class" => 'form-control']);
         //   echo $this->Form->control('Puesto/Cargo', ['options' => $cargos, 'empty' => true, "class" => 'form-control']);
           // echo $this->Form->control('Categoría', ['options' => $cargos, 'empty' => true, "class" => 'form-control']);
           // echo $this->Form->control('Departamento', ['options' => $areas, 'empty' => true, "class" => 'form-control']);
           // echo $this->Form->control('Jornada laboral', ['options' => $areas, 'empty' => true, "class" => 'form-control']);


            //    echo(" <br><br> <u> <strong>Antecedetes grupo familiar : </u> </strong><br><br> ");       
            //echo $this->Form->control('Cónyuge', ['options' => $areas, 'empty' => true, "class" => 'form-control']);               
            //echo $this->Form->control('Hijo 1', ['options' => $areas, 'empty' => true, "class" => 'form-control']);
            //echo $this->Form->control('Hijo 2', ['options' => $areas, 'empty' => true, "class" => 'form-control']);
            //echo $this->Form->control('Hijo 3', ['options' => $areas, 'empty' => true, "class" => 'form-control']);
            
            
            
            
            
            
            
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
