<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ticket Control'), ['action' => 'edit', $ticketControl->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ticket Control'), ['action' => 'delete', $ticketControl->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketControl->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ticket Control'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket Control'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ticketControl view large-9 medium-8 columns content">
    <h3><?= h($ticketControl->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Placa') ?></th>
            <td><?= h($ticketControl->placa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Linea Aerea') ?></th>
            <td><?= h($ticketControl->linea_aerea) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ticket') ?></th>
            <td><?= h($ticketControl->ticket) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Moneda') ?></th>
            <td><?= h($ticketControl->moneda) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emision Tkt') ?></th>
            <td><?= h($ticketControl->emision_tkt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ficha') ?></th>
            <td><?= h($ticketControl->ficha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Factura') ?></th>
            <td><?= h($ticketControl->factura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= h($ticketControl->empresa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($ticketControl->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($ticketControl->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ruta') ?></th>
            <td><?= h($ticketControl->ruta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pais') ?></th>
            <td><?= h($ticketControl->pais) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Continente') ?></th>
            <td><?= h($ticketControl->continente) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Itinerario') ?></th>
            <td><?= h($ticketControl->itinerario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendedor') ?></th>
            <td><?= h($ticketControl->vendedor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observaciones 1') ?></th>
            <td><?= h($ticketControl->observaciones_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tkt Usd 1') ?></th>
            <td><?= h($ticketControl->tkt_usd_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tkt Clp 1') ?></th>
            <td><?= h($ticketControl->tkt_clp_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Usd 1') ?></th>
            <td><?= h($ticketControl->tax_usd_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Clp 1') ?></th>
            <td><?= h($ticketControl->tax_clp_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tkt Usd 2') ?></th>
            <td><?= h($ticketControl->tkt_usd_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tkt Clp 2') ?></th>
            <td><?= h($ticketControl->tkt_clp_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Usd 2') ?></th>
            <td><?= h($ticketControl->tax_usd_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Clp 2') ?></th>
            <td><?= h($ticketControl->tax_clp_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Normal') ?></th>
            <td><?= h($ticketControl->normal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Over') ?></th>
            <td><?= h($ticketControl->over) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dolares 1') ?></th>
            <td><?= h($ticketControl->dolares_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pesos 1') ?></th>
            <td><?= h($ticketControl->pesos_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dolares 2') ?></th>
            <td><?= h($ticketControl->dolares_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pesos 2') ?></th>
            <td><?= h($ticketControl->pesos_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dolares 3') ?></th>
            <td><?= h($ticketControl->dolares_3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pesos 3') ?></th>
            <td><?= h($ticketControl->pesos_3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observaciones 2') ?></th>
            <td><?= h($ticketControl->observaciones_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Usd') ?></th>
            <td><?= h($ticketControl->total_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Clp') ?></th>
            <td><?= h($ticketControl->total_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Utilidad Usd') ?></th>
            <td><?= h($ticketControl->utilidad_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Utilidad Clp') ?></th>
            <td><?= h($ticketControl->utilidad_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Com Usd') ?></th>
            <td><?= h($ticketControl->com_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Com Clp') ?></th>
            <td><?= h($ticketControl->com_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Over Usd') ?></th>
            <td><?= h($ticketControl->over_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Over Clp') ?></th>
            <td><?= h($ticketControl->over_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ticketControl->id) ?></td>
        </tr>
    </table>
</div>
