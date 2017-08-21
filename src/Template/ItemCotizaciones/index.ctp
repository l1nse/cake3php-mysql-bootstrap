<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item Cotizacione'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Items'), ['controller' => 'TipoItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Item'), ['controller' => 'TipoItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Cambios'), ['controller' => 'TipoCambios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Cambio'), ['controller' => 'TipoCambios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemCotizaciones index large-9 medium-8 columns content">
    <h3><?= __('Item Cotizaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cotizacione_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_cambio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemCotizaciones as $itemCotizacione): ?>
            <tr>
                <td><?= $this->Number->format($itemCotizacione->id) ?></td>
                <td><?= $itemCotizacione->has('cotizacione') ? $this->Html->link($itemCotizacione->cotizacione->cotizacione_id, ['controller' => 'Cotizaciones', 'action' => 'view', $itemCotizacione->cotizacione->cotizacione_id]) : '' ?></td>
                <td><?= $itemCotizacione->has('tipo_item') ? $this->Html->link($itemCotizacione->tipo_item->name, ['controller' => 'TipoItems', 'action' => 'view', $itemCotizacione->tipo_item->id]) : '' ?></td>
                <td><?= $itemCotizacione->has('tipo_cambio') ? $this->Html->link($itemCotizacione->tipo_cambio->name, ['controller' => 'TipoCambios', 'action' => 'view', $itemCotizacione->tipo_cambio->id]) : '' ?></td>
                <td><?= $this->Number->format($itemCotizacione->valor) ?></td>
                <td><?= h($itemCotizacione->created) ?></td>
                <td><?= h($itemCotizacione->modified) ?></td>
                <td><?= $this->Number->format($itemCotizacione->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itemCotizacione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemCotizacione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemCotizacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemCotizacione->id)]) ?>
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
