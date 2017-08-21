<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('cotizaciones') ?>
<div class="cotizaciones index large-9 medium-8 columns content">
    <h3><?= __('Cotizaciones') ?></h3>
    <div class="row">
        <div class="col-md-12">
             <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>cotizaciones/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Cotización</a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Canal Venta</th>
                        <th>Total</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cotizaciones as $cotizacione): ?>
                    <tr>
                        <td><?= $cotizacione->cotizacione_id; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
