<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cotizacione'), ['action' => 'edit', $cotizacione->cotizacione_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cotizacione'), ['action' => 'delete', $cotizacione->cotizacione_id], ['confirm' => __('Are you sure you want to delete # {0}?', $cotizacione->cotizacione_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Entidades'), ['controller' => 'Entidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entidade'), ['controller' => 'Entidades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Canal Ventas'), ['controller' => 'CanalVentas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canal Venta'), ['controller' => 'CanalVentas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cotizaciones view large-9 medium-8 columns content">
    <h3><?= h($cotizacione->cotizacione_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cotizacione') ?></th>
            <td><?= $cotizacione->has('cotizacione') ? $this->Html->link($cotizacione->cotizacione->cotizacione_id, ['controller' => 'Cotizaciones', 'action' => 'view', $cotizacione->cotizacione->cotizacione_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entidade') ?></th>
            <td><?= $cotizacione->has('entidade') ? $this->Html->link($cotizacione->entidade->name, ['controller' => 'Entidades', 'action' => 'view', $cotizacione->entidade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Canal Venta') ?></th>
            <td><?= $cotizacione->has('canal_venta') ? $this->Html->link($cotizacione->canal_venta->name, ['controller' => 'CanalVentas', 'action' => 'view', $cotizacione->canal_venta->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $cotizacione->has('user') ? $this->Html->link($cotizacione->user->id, ['controller' => 'Users', 'action' => 'view', $cotizacione->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cotizacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version') ?></th>
            <td><?= $this->Number->format($cotizacione->version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($cotizacione->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($cotizacione->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cotizacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cotizacione->modified) ?></td>
        </tr>
    </table>
</div>
