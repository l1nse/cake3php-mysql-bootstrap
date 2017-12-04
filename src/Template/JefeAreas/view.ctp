<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="jefeAreas view large-9 medium-8 columns content">
    <h3><?= h($jefeArea->ficha_personale->user['name'].' '.$jefeArea->ficha_personale->user['apellido1'].' '.$jefeArea->ficha_personale->user['apellido2'].' ' ) ?></h3>
    <table class="table table-striped table-bordered">
      
        <tr>
            <th scope="row"><?= __('Área :') ?></th>
            <td><?= h($jefeArea->area->name.' =>=> '.$jefeArea->area['empresa']['name'])?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Jefe : ') ?></th>
            <td><?= h($jefeArea->ficha_personale->user['name'].' '.$jefeArea->ficha_personale->user['apellido1'].' '.$jefeArea->ficha_personale->user['apellido2'].' ' ) ?></td>
        </tr>
        
        
        
    </table>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>jefe-areas/index"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>
