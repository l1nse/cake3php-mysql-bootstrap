<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Jefe Area'), ['action' => 'edit', $jefeArea->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Jefe Area'), ['action' => 'delete', $jefeArea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jefeArea->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jefe Areas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jefe Area'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jefeAreas view large-9 medium-8 columns content">
    <h3><?= h($jefeArea->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= $jefeArea->has('area') ? $this->Html->link($jefeArea->area->name, ['controller' => 'Areas', 'action' => 'view', $jefeArea->area->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ficha Personale') ?></th>
            <td><?= $jefeArea->has('ficha_personale') ? $this->Html->link($jefeArea->ficha_personale->name, ['controller' => 'FichaPersonales', 'action' => 'view', $jefeArea->ficha_personale->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($jefeArea->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($jefeArea->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($jefeArea->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($jefeArea->modified) ?></td>
        </tr>
    </table>
</div>
