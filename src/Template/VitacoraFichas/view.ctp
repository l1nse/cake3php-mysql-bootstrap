<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vitacora Ficha'), ['action' => 'edit', $vitacoraFicha->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vitacora Ficha'), ['action' => 'delete', $vitacoraFicha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vitacoraFicha->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vitacora Fichas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vitacora Ficha'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estado Fichas'), ['controller' => 'EstadoFichas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado Ficha'), ['controller' => 'EstadoFichas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['controller' => 'FichaNegocios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficha Negocio'), ['controller' => 'FichaNegocios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vitacoraFichas view large-9 medium-8 columns content">
    <h3><?= h($vitacoraFicha->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Estado Ficha') ?></th>
            <td><?= $vitacoraFicha->has('estado_ficha') ? $this->Html->link($vitacoraFicha->estado_ficha->id, ['controller' => 'EstadoFichas', 'action' => 'view', $vitacoraFicha->estado_ficha->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ficha Negocio') ?></th>
            <td><?= $vitacoraFicha->has('ficha_negocio') ? $this->Html->link($vitacoraFicha->ficha_negocio->id, ['controller' => 'FichaNegocios', 'action' => 'view', $vitacoraFicha->ficha_negocio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vitacoraFicha->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($vitacoraFicha->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($vitacoraFicha->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($vitacoraFicha->modified) ?></td>
        </tr>
    </table>
</div>
