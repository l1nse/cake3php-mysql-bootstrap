<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Digi'), ['action' => 'edit', $digi->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Digi'), ['action' => 'delete', $digi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $digi->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Digis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Digi'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="digis view large-9 medium-8 columns content">
    <h3><?= h($digi->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Observacion') ?></th>
            <td><?= h($digi->observacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $digi->has('user') ? $this->Html->link($digi->user->id, ['controller' => 'Users', 'action' => 'view', $digi->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($digi->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($digi->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Desde') ?></th>
            <td><?= h($digi->fecha_desde) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Hasta') ?></th>
            <td><?= h($digi->fecha_hasta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($digi->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($digi->modified) ?></td>
        </tr>
    </table>
</div>
