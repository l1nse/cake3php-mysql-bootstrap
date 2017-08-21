<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ticket Control'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ticketControl index large-9 medium-8 columns content">
    <h3><?= __('Ticket Control') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('placa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('linea_aerea') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ticket') ?></th>
                <th scope="col"><?= $this->Paginator->sort('moneda') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emision_tkt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ficha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('factura') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ruta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pais') ?></th>
                <th scope="col"><?= $this->Paginator->sort('continente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itinerario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vendedor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observaciones_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tkt_usd_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tkt_clp_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax_usd_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax_clp_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tkt_usd_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tkt_clp_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax_usd_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax_clp_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('normal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('over') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dolares_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pesos_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dolares_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pesos_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dolares_3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pesos_3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observaciones_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_clp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('utilidad_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('utilidad_clp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('com_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('com_clp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('over_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('over_clp') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ticketControl as $ticketControl): ?>
            <tr>
                <td><?= $this->Number->format($ticketControl->id) ?></td>
                <td><?= h($ticketControl->placa) ?></td>
                <td><?= h($ticketControl->linea_aerea) ?></td>
                <td><?= h($ticketControl->ticket) ?></td>
                <td><?= h($ticketControl->moneda) ?></td>
                <td><?= h($ticketControl->emision_tkt) ?></td>
                <td><?= h($ticketControl->ficha) ?></td>
                <td><?= h($ticketControl->factura) ?></td>
                <td><?= h($ticketControl->empresa) ?></td>
                <td><?= h($ticketControl->apellido) ?></td>
                <td><?= h($ticketControl->nombre) ?></td>
                <td><?= h($ticketControl->ruta) ?></td>
                <td><?= h($ticketControl->pais) ?></td>
                <td><?= h($ticketControl->continente) ?></td>
                <td><?= h($ticketControl->itinerario) ?></td>
                <td><?= h($ticketControl->vendedor) ?></td>
                <td><?= h($ticketControl->observaciones_1) ?></td>
                <td><?= h($ticketControl->tkt_usd_1) ?></td>
                <td><?= h($ticketControl->tkt_clp_1) ?></td>
                <td><?= h($ticketControl->tax_usd_1) ?></td>
                <td><?= h($ticketControl->tax_clp_1) ?></td>
                <td><?= h($ticketControl->tkt_usd_2) ?></td>
                <td><?= h($ticketControl->tkt_clp_2) ?></td>
                <td><?= h($ticketControl->tax_usd_2) ?></td>
                <td><?= h($ticketControl->tax_clp_2) ?></td>
                <td><?= h($ticketControl->normal) ?></td>
                <td><?= h($ticketControl->over) ?></td>
                <td><?= h($ticketControl->dolares_1) ?></td>
                <td><?= h($ticketControl->pesos_1) ?></td>
                <td><?= h($ticketControl->dolares_2) ?></td>
                <td><?= h($ticketControl->pesos_2) ?></td>
                <td><?= h($ticketControl->dolares_3) ?></td>
                <td><?= h($ticketControl->pesos_3) ?></td>
                <td><?= h($ticketControl->observaciones_2) ?></td>
                <td><?= h($ticketControl->total_usd) ?></td>
                <td><?= h($ticketControl->total_clp) ?></td>
                <td><?= h($ticketControl->utilidad_usd) ?></td>
                <td><?= h($ticketControl->utilidad_clp) ?></td>
                <td><?= h($ticketControl->com_usd) ?></td>
                <td><?= h($ticketControl->com_clp) ?></td>
                <td><?= h($ticketControl->over_usd) ?></td>
                <td><?= h($ticketControl->over_clp) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ticketControl->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticketControl->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticketControl->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketControl->id)]) ?>
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
