<?php
/**
  * @var \App\View\AppView $this
  */
?>    
<div class="configuraciones form large-9 medium-8 columns content">
    <?= $this->Form->create($configuracione) ?>
    <fieldset>
        <div class="form-group">
            <legend><?= __('Editar Configuración') ?></legend>
            <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
            <?php
                echo $this->Form->control('tipo_descripcion',  ["id" => "tipo_descripcion", "name" => "tipo_descripcion", "class" => "form-control", "value" => $configuracione['tipo_descripcion'], 'required' => true]);
                echo $this->Form->control('parametro',  ["id" => "parametro", "name" => "parametro", "class" => "form-control", "value" => $configuracione['parametro'], 'required' => true]);

                $estado = $configuracione['active'];
                switch ($estado) {
                    case '1':
                        $estado = "Activo";
                    break;
                    case '2':
                        $estado = "Pendiente";
                    break;
                    
                    default:
                        $estado = "Indefinido";
                    break;
                }                
            ?>
            <div class="input select required">
                <label for="active">Estado (*)</label>
                <select class="form-control" required="required" id="active" name="active">
                <option value="<?php echo $configuracione['active'] ?>"><?php echo "$estado" ?></option>
                <option value="1">Activo</option>
                <option value="2">Pendiente</option>
               
                </select>
            </div>
        </div>
    </fieldset>
     <div class="row">
            <div class="col-md-6">
                <a class="btn btn-danger" href="<?php echo APP_URI; ?>configuraciones/index/">Cancelar</a>
                <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
            </div>
            <div class="col-md-1 col-md-offset-5">
                <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
            </div>
    </div>
    <?= $this->Form->end() ?>
</div>
