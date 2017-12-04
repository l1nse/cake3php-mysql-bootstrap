<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Utilidade'), ['action' => 'edit', $utilidade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Utilidade'), ['action' => 'delete', $utilidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utilidade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Utilidades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utilidade'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['controller' => 'FichaNegocios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficha Negocio'), ['controller' => 'FichaNegocios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="utilidades view large-9 medium-8 columns content">
    <h3><?= h($utilidade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ficha Negocio') ?></th>
            <td><?= $utilidade->has('ficha_negocio') ? $this->Html->link($utilidade->ficha_negocio->id, ['controller' => 'FichaNegocios', 'action' => 'view', $utilidade->ficha_negocio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($utilidade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Comag Clp') ?></th>
            <td><?= $this->Number->format($utilidade->total_comag_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Comag Usd') ?></th>
            <td><?= $this->Number->format($utilidade->total_comag_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Fee Clp') ?></th>
            <td><?= $this->Number->format($utilidade->total_fee_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Fee Usd') ?></th>
            <td><?= $this->Number->format($utilidade->total_fee_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diferencia Cl') ?></th>
            <td><?= $this->Number->format($utilidade->diferencia_cl) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diferencia Usd') ?></th>
            <td><?= $this->Number->format($utilidade->diferencia_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cobro Tc Clp') ?></th>
            <td><?= $this->Number->format($utilidade->cobro_tc_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cobro Tc Usd') ?></th>
            <td><?= $this->Number->format($utilidade->cobro_tc_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo Tc Clp') ?></th>
            <td><?= $this->Number->format($utilidade->cargo_tc_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo Tc Usd') ?></th>
            <td><?= $this->Number->format($utilidade->cargo_tc_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo Remesa Clp') ?></th>
            <td><?= $this->Number->format($utilidade->cargo_remesa_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo Remesa Usd') ?></th>
            <td><?= $this->Number->format($utilidade->cargo_remesa_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ult Final Clp') ?></th>
            <td><?= $this->Number->format($utilidade->ult_final_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ult Final Usd') ?></th>
            <td><?= $this->Number->format($utilidade->ult_final_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($utilidade->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($utilidade->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($utilidade->modified) ?></td>
        </tr>
    </table>
</div>
