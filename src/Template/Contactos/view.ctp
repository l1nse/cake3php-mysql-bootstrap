<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contacto'), ['action' => 'edit', $contacto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contacto'), ['action' => 'delete', $contacto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contacto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contactos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contacto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Entidades'), ['controller' => 'Entidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entidade'), ['controller' => 'Entidades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contactos view large-9 medium-8 columns content">
    <h3><?= h($contacto->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Entidade') ?></th>
            <td><?= $contacto->has('entidade') ? $this->Html->link($contacto->entidade->name, ['controller' => 'Entidades', 'action' => 'view', $contacto->entidade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($contacto->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($contacto->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($contacto->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo') ?></th>
            <td><?= h($contacto->cargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($contacto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contacto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($contacto->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contacto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contacto->modified) ?></td>
        </tr>
    </table>
</div>
