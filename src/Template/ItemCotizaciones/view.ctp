<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item Cotizacione'), ['action' => 'edit', $itemCotizacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Cotizacione'), ['action' => 'delete', $itemCotizacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemCotizacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Cotizaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Cotizacione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Items'), ['controller' => 'TipoItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Item'), ['controller' => 'TipoItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Cambios'), ['controller' => 'TipoCambios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Cambio'), ['controller' => 'TipoCambios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemCotizaciones view large-9 medium-8 columns content">
    <h3><?= h($itemCotizacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cotizacione') ?></th>
            <td><?= $itemCotizacione->has('cotizacione') ? $this->Html->link($itemCotizacione->cotizacione->cotizacione_id, ['controller' => 'Cotizaciones', 'action' => 'view', $itemCotizacione->cotizacione->cotizacione_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Item') ?></th>
            <td><?= $itemCotizacione->has('tipo_item') ? $this->Html->link($itemCotizacione->tipo_item->name, ['controller' => 'TipoItems', 'action' => 'view', $itemCotizacione->tipo_item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Cambio') ?></th>
            <td><?= $itemCotizacione->has('tipo_cambio') ? $this->Html->link($itemCotizacione->tipo_cambio->name, ['controller' => 'TipoCambios', 'action' => 'view', $itemCotizacione->tipo_cambio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemCotizacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($itemCotizacione->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($itemCotizacione->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($itemCotizacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($itemCotizacione->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($itemCotizacione->descripcion)); ?>
    </div>
</div>
