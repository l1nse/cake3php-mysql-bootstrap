<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="tipoCambios view large-9 medium-8 columns content">
    <h3><?= h($tipoCambio->name) ?></h3>
        <table class="table table-striped table-bordered" >
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($tipoCambio->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($tipoCambio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($tipoCambio->active) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tipoCambio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tipoCambio->modified) ?></td>
        </tr> -->
    </table>
    <div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>tipo-cambios/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
    </div>
    
</div>
