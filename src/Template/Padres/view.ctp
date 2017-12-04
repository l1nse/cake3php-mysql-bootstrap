<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="padres view large-9 medium-8 columns content">
    <h3><?= h($padre->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($padre->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($padre->name) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($padre->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($padre->modified) ?></td>
        </tr> -->
        </tr>
        <tr>
            <?php
                    if(isset($padre->active)){
                        if($padre->active=='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($padre->active=='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($padre->active=='0') {
                            $estado =  '<span class="label label-warning">Pendiente</span>';
                        }
                        else{
                            $estado =  '';
                        }
                    }
                ?>
            <th scope="row"><?= __('Estado') ?></th>
            <td style="text-align: left;"><?= $estado;  ?></td>
        </tr>
        
    </table>
  
</div>
