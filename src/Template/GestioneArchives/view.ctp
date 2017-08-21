<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gestione Archive'), ['action' => 'edit', $gestioneArchive->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gestione Archive'), ['action' => 'delete', $gestioneArchive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gestioneArchive->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gestione Archives'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gestione Archive'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gestiones'), ['controller' => 'Gestiones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gestione'), ['controller' => 'Gestiones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Archives'), ['controller' => 'Archives', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Archive'), ['controller' => 'Archives', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gestioneArchives view large-9 medium-8 columns content">
    <h3><?= h($gestioneArchive->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Gestione') ?></th>
            <td><?= $gestioneArchive->has('gestione') ? $this->Html->link($gestioneArchive->gestione->id, ['controller' => 'Gestiones', 'action' => 'view', $gestioneArchive->gestione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Archive') ?></th>
            <td><?= $gestioneArchive->has('archive') ? $this->Html->link($gestioneArchive->archive->name, ['controller' => 'Archives', 'action' => 'view', $gestioneArchive->archive->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gestioneArchive->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gestioneArchive->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gestioneArchive->modified) ?></td>
        </tr>
    </table>
</div>
