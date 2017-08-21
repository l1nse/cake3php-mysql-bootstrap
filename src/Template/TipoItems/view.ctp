<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Item'), ['action' => 'edit', $tipoItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Item'), ['action' => 'delete', $tipoItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item Cotizaciones'), ['controller' => 'ItemCotizaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Cotizacione'), ['controller' => 'ItemCotizaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoItems view large-9 medium-8 columns content">
    <h3><?= h($tipoItem->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tipoItem->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipoItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($tipoItem->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tipoItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tipoItem->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Item Cotizaciones') ?></h4>
        <?php if (!empty($tipoItem->item_cotizaciones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cotizacione Id') ?></th>
                <th scope="col"><?= __('Tipo Item Id') ?></th>
                <th scope="col"><?= __('Tipo Cambio Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipoItem->item_cotizaciones as $itemCotizaciones): ?>
            <tr>
                <td><?= h($itemCotizaciones->id) ?></td>
                <td><?= h($itemCotizaciones->cotizacione_id) ?></td>
                <td><?= h($itemCotizaciones->tipo_item_id) ?></td>
                <td><?= h($itemCotizaciones->tipo_cambio_id) ?></td>
                <td><?= h($itemCotizaciones->descripcion) ?></td>
                <td><?= h($itemCotizaciones->valor) ?></td>
                <td><?= h($itemCotizaciones->created) ?></td>
                <td><?= h($itemCotizaciones->modified) ?></td>
                <td><?= h($itemCotizaciones->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ItemCotizaciones', 'action' => 'view', $itemCotizaciones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ItemCotizaciones', 'action' => 'edit', $itemCotizaciones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItemCotizaciones', 'action' => 'delete', $itemCotizaciones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemCotizaciones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
