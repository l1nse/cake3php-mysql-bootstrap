<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pasajero'), ['action' => 'edit', $pasajero->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pasajero'), ['action' => 'delete', $pasajero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pasajero->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pasajero'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pasajero'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pasajero view large-9 medium-8 columns content">
    <h3><?= h($pasajero->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cotizacione') ?></th>
            <td><?= $pasajero->has('cotizacione') ? $this->Html->link($pasajero->cotizacione->cotizacione_id, ['controller' => 'Cotizaciones', 'action' => 'view', $pasajero->cotizacione->cotizacione_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pasajero->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pasajero->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($pasajero->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pasajero->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pasajero->modified) ?></td>
        </tr>
    </table>
</div>
