<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="despachos view large-9 medium-8 columns content">
    <h3>Ticket N° <?= h($despacho->ticket->id) ?>&nbsp;<a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>tickets/view/<?php echo $despacho->ticket->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i> Ver Ticket</a></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= h($despacho->empresa->name); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudade') ?></th>
            <td><?= h($despacho->ciudade->name); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comuna') ?></th>
            <td><?= h($despacho->comuna->name);?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entidade') ?></th>
            <td><?= h($despacho->entidade->name); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Documento') ?></th>
            <td><?= h($despacho->tipo_documento->name);?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Documento') ?></th>
            <td><?= h($despacho->numero_documento); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Horario') ?></th>
            <td><?= h($despacho->horario) ?></td>
        </tr>
        
        
        <tr>
            <th scope="row"><?= __('Fecha Solicitud') ?></th>
            <td><?= h($despacho->fecha_solicitud) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td>
                <div class="col-md-10">
                    <iframe style="width: 100%; height: 350px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCdNRziuJNaQKW9JPZiv3Xtw3EGBEsYTeY&q=<?= h($despacho->direccion) ?>" allowfullscreen>
                    </iframe>
                </div>
            </td>
        </tr>
       
    </table>
</div>
    <hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>tickets/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>