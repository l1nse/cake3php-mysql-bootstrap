<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pasajero'), ['action' => 'edit', $pasajero->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pasajero'), ['action' => 'delete', $pasajero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pasajero->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pasajeros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pasajero'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pasajeros view large-9 medium-8 columns content">
    <h3><?= h($pasajero->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre1') ?></th>
            <td><?= h($pasajero->nombre1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre2') ?></th>
            <td><?= h($pasajero->nombre2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidop') ?></th>
            <td><?= h($pasajero->apellidop) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidom') ?></th>
            <td><?= h($pasajero->apellidom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rut') ?></th>
            <td><?= h($pasajero->rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nacionalidad') ?></th>
            <td><?= h($pasajero->nacionalidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Origen') ?></th>
            <td><?= h($pasajero->origen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destino') ?></th>
            <td><?= h($pasajero->destino) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aerolinea') ?></th>
            <td><?= h($pasajero->aerolinea) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cod Pasasje') ?></th>
            <td><?= h($pasajero->cod_pasasje) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aeropuerto Origen') ?></th>
            <td><?= h($pasajero->aeropuerto_origen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aeropuerto Destino') ?></th>
            <td><?= h($pasajero->aeropuerto_destino) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pasajero->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Folio Ficha') ?></th>
            <td><?= $this->Number->format($pasajero->folio_ficha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Ticket') ?></th>
            <td><?= $this->Number->format($pasajero->numero_ticket) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($pasajero->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Hora Salida') ?></th>
            <td><?= h($pasajero->fecha_hora_salida) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Hora Llegada') ?></th>
            <td><?= h($pasajero->fecha_hora_llegada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pasajero->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pasajero->modified) ?></td>
        </tr>
    </table>
</div>
