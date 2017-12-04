<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mensajes Aerolinea'), ['action' => 'edit', $mensajesAerolinea->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mensajes Aerolinea'), ['action' => 'delete', $mensajesAerolinea->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $mensajesAerolinea->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Mensajes Aerolineas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mensajes Aerolinea'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mensajesAerolineas view large-9 medium-8 columns content">
    <h3><?= h($mensajesAerolinea->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('SSR') ?></th>
            <td><?= h($mensajesAerolinea->SSR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reemisione Id') ?></th>
            <td><?= h($mensajesAerolinea->reemisione_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($mensajesAerolinea->ID) ?></td>
        </tr>
    </table>
</div>
