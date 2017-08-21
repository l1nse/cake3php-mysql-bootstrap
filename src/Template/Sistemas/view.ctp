<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="sistemas view large-9 medium-8 columns content">
    <h3><?= h($sistema->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($sistema->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Contacto') ?></th>
            <td><?= h($sistema->name_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Contacto') ?></th>
            <td><?= h($sistema->email_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rut Empresa') ?></th>
            <td><?= h($sistema->rut_empresa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Empresa') ?></th>
            <td><?= h($sistema->name_empresa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dirección Empresa') ?></th>
            <td><?= h($sistema->direccion_empresa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($sistema->id) ?></td>
        </tr>
        <tr>
                <?php
                    if(isset($sistema->active)){
                        if($sistema->active=='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($sistema->active=='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($sistema->active=='0') {
                            $estado =  '<span class="label label-warning">Pendiente</span>';
                        }
                        else{
                            $estado =  '';
                        }
                    }
                ?>
            <th scope="row"><?= __('Activo') ?></th>
            <td style="text-align: left;"><?= $estado;  ?></td>
        </tr>
      <!--  <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($sistema->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($sistema->modified) ?></td>
        </tr> -->
    </table>
    
</div>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>sistemas/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>

