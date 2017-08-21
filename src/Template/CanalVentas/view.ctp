<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Canal Venta'), ['action' => 'edit', $canalVenta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Canal Venta'), ['action' => 'delete', $canalVenta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $canalVenta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Canal Ventas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canal Venta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="canalVentas view large-9 medium-8 columns content">
    <h3><?= h($canalVenta->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($canalVenta->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($canalVenta->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($canalVenta->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($canalVenta->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($canalVenta->active) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cotizaciones') ?></h4>
        <?php if (!empty($canalVenta->cotizaciones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cotizacione Id') ?></th>
                <th scope="col"><?= __('Entidade Id') ?></th>
                <th scope="col"><?= __('Canal Venta Id') ?></th>
                <th scope="col"><?= __('Version') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($canalVenta->cotizaciones as $cotizaciones): ?>
            <tr>
                <td><?= h($cotizaciones->id) ?></td>
                <td><?= h($cotizaciones->cotizacione_id) ?></td>
                <td><?= h($cotizaciones->entidade_id) ?></td>
                <td><?= h($cotizaciones->canal_venta_id) ?></td>
                <td><?= h($cotizaciones->version) ?></td>
                <td><?= h($cotizaciones->total) ?></td>
                <td><?= h($cotizaciones->created) ?></td>
                <td><?= h($cotizaciones->modified) ?></td>
                <td><?= h($cotizaciones->user_id) ?></td>
                <td><?= h($cotizaciones->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cotizaciones', 'action' => 'view', $cotizaciones->cotizacione_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cotizaciones', 'action' => 'edit', $cotizaciones->cotizacione_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cotizaciones', 'action' => 'delete', $cotizaciones->cotizacione_id], ['confirm' => __('Are you sure you want to delete # {0}?', $cotizaciones->cotizacione_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
