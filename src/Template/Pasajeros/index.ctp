<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pasajero'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pasajeros index large-9 medium-8 columns content">
    <h3><?= __('Pasajeros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('folio_ficha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_ticket') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellidop') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellidom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rut') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nacionalidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('origen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destino') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aerolinea') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cod_pasasje') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aeropuerto_origen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aeropuerto_destino') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_hora_salida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_hora_llegada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pasajeros as $pasajero): ?>
            <tr>
                <td><?= $this->Number->format($pasajero->id) ?></td>
                <td><?= $this->Number->format($pasajero->folio_ficha) ?></td>
                <td><?= $this->Number->format($pasajero->numero_ticket) ?></td>
                <td><?= h($pasajero->nombre1) ?></td>
                <td><?= h($pasajero->nombre2) ?></td>
                <td><?= h($pasajero->apellidop) ?></td>
                <td><?= h($pasajero->apellidom) ?></td>
                <td><?= h($pasajero->rut) ?></td>
                <td><?= h($pasajero->nacionalidad) ?></td>
                <td><?= h($pasajero->origen) ?></td>
                <td><?= h($pasajero->destino) ?></td>
                <td><?= h($pasajero->aerolinea) ?></td>
                <td><?= h($pasajero->cod_pasasje) ?></td>
                <td><?= h($pasajero->aeropuerto_origen) ?></td>
                <td><?= h($pasajero->aeropuerto_destino) ?></td>
                <td><?= h($pasajero->fecha_hora_salida) ?></td>
                <td><?= h($pasajero->fecha_hora_llegada) ?></td>
                <td><?= $this->Number->format($pasajero->active) ?></td>
                <td><?= h($pasajero->created) ?></td>
                <td><?= h($pasajero->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pasajero->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pasajero->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pasajero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pasajero->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
