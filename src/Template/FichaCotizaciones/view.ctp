<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ficha Cotizacione'), ['action' => 'edit', $fichaCotizacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ficha Cotizacione'), ['action' => 'delete', $fichaCotizacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichaCotizacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ficha Cotizaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficha Cotizacione'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fichaCotizaciones view large-9 medium-8 columns content">
    <h3><?= h($fichaCotizacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ejemplo') ?></th>
            <td><?= h($fichaCotizacione->ejemplo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fichaCotizacione->id) ?></td>
        </tr>
    </table>
</div>
