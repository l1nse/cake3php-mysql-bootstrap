<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Servicio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['controller' => 'FichaNegocios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Negocio'), ['controller' => 'FichaNegocios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entidades'), ['controller' => 'Entidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entidade'), ['controller' => 'Entidades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocio Servicios'), ['controller' => 'FichaNegocioServicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Negocio Servicio'), ['controller' => 'FichaNegocioServicios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicios index large-9 medium-8 columns content">
    <h3><?= __('Servicios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ficha_negocio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('proveedor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_servicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('condicion_pago') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor_neto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor_neto_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor_neto_land') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor_neto_land_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iva_land_tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iva_land_pesos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iva_land_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comag_procentaje') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comag_pesos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comag_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('over_porcentaje') ?></th>
                <th scope="col"><?= $this->Paginator->sort('over_pesos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('over_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amex_porcentaje') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amex_pesos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amex_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('neto_comag_pesos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('neto_comag_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iva_porcentaje') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iva_pesos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iva_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boleta_honorario_porcentaje') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boleta_honorario_pesos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boleta_honorario_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_pesos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_contabilidad_pesos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_contabilidad_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicios as $servicio): ?>
            <tr>
                <td><?= $this->Number->format($servicio->id) ?></td>
                <td><?= $servicio->has('ficha_negocio') ? $this->Html->link($servicio->ficha_negocio->id, ['controller' => 'FichaNegocios', 'action' => 'view', $servicio->ficha_negocio->id]) : '' ?></td>
                <td><?= h($servicio->proveedor_id) ?></td>
                <td><?= h($servicio->tipo_servicio) ?></td>
                <td><?= h($servicio->condicion_pago) ?></td>
                <td><?= $this->Number->format($servicio->valor_neto) ?></td>
                <td><?= $this->Number->format($servicio->valor_neto_usd) ?></td>
                <td><?= $this->Number->format($servicio->tax) ?></td>
                <td><?= $this->Number->format($servicio->tax_usd) ?></td>
                <td><?= $this->Number->format($servicio->valor_neto_land) ?></td>
                <td><?= $this->Number->format($servicio->valor_neto_land_usd) ?></td>
                <td><?= h($servicio->iva_land_tipo) ?></td>
                <td><?= h($servicio->iva_land_pesos) ?></td>
                <td><?= h($servicio->iva_land_usd) ?></td>
                <td><?= $this->Number->format($servicio->comag_procentaje) ?></td>
                <td><?= $this->Number->format($servicio->comag_pesos) ?></td>
                <td><?= $this->Number->format($servicio->comag_usd) ?></td>
                <td><?= $this->Number->format($servicio->over_porcentaje) ?></td>
                <td><?= $this->Number->format($servicio->over_pesos) ?></td>
                <td><?= $this->Number->format($servicio->over_usd) ?></td>
                <td><?= $this->Number->format($servicio->amex_porcentaje) ?></td>
                <td><?= $this->Number->format($servicio->amex_pesos) ?></td>
                <td><?= $this->Number->format($servicio->amex_usd) ?></td>
                <td><?= $this->Number->format($servicio->neto_comag_pesos) ?></td>
                <td><?= $this->Number->format($servicio->neto_comag_usd) ?></td>
                <td><?= $this->Number->format($servicio->iva_porcentaje) ?></td>
                <td><?= $this->Number->format($servicio->iva_pesos) ?></td>
                <td><?= $this->Number->format($servicio->iva_usd) ?></td>
                <td><?= $this->Number->format($servicio->boleta_honorario_porcentaje) ?></td>
                <td><?= $this->Number->format($servicio->boleta_honorario_pesos) ?></td>
                <td><?= $this->Number->format($servicio->boleta_honorario_usd) ?></td>
                <td><?= $this->Number->format($servicio->total_pesos) ?></td>
                <td><?= $this->Number->format($servicio->total_usd) ?></td>
                <td><?= $this->Number->format($servicio->total_contabilidad_pesos) ?></td>
                <td><?= $this->Number->format($servicio->total_contabilidad_usd) ?></td>
                <td><?= h($servicio->modified) ?></td>
                <td><?= $this->Number->format($servicio->active) ?></td>
                <td><?= h($servicio->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servicio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servicio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicio->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
