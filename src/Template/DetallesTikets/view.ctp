<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Detalles Tiket'), ['action' => 'edit', $detallesTiket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Detalles Tiket'), ['action' => 'delete', $detallesTiket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detallesTiket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Detalles Tikets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalles Tiket'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="detallesTikets view large-9 medium-8 columns content">
    <h3><?= h($detallesTiket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('H') ?></th>
            <td><?= h($detallesTiket->H) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('K') ?></th>
            <td><?= h($detallesTiket->K) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ET') ?></th>
            <td><?= h($detallesTiket->ET) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reemisione Id') ?></th>
            <td><?= h($detallesTiket->reemisione_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($detallesTiket->id) ?></td>
        </tr>
    </table>
</div>
