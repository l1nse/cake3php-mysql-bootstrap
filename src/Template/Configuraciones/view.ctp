<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="configuraciones view large-9 medium-8 columns content">
    <h3> ID : <?= h($configuracione->id) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($configuracione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Descripcion') ?></th>
            <td><?= h($configuracione->tipo_descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parametro') ?></th>
            <td><?= h($configuracione->parametro) ?></td>
        </tr>
        <?php 
        $estado  = $configuracione->active;
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
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?php  echo $estado ?></td>
        </tr>
        <?php $date = $configuracione->created; ?>
        <tr>            
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= $date->format('d/m/Y H:m') ?></td>
        </tr>
        <?php $date = $configuracione->modified; ?>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= $date->format('d/m/Y H:m') ?></td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo APP_URI; ?>configuraciones/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
            
        </div>
    </div>
</div>
