<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Utilidade'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['controller' => 'FichaNegocios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Negocio'), ['controller' => 'FichaNegocios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="utilidades index large-9 medium-8 columns content">
    <h3><?= __('Utilidades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ficha_negocio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_comag_clp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_comag_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_fee_clp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_fee_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diferencia_cl') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diferencia_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cobro_tc_clp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cobro_tc_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cargo_tc_clp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cargo_tc_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cargo_remesa_clp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cargo_remesa_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ult_final_clp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ult_final_usd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilidades as $utilidade): ?>
            <tr>
                <td><?= $this->Number->format($utilidade->id) ?></td>
                <td><?= $utilidade->has('ficha_negocio') ? $this->Html->link($utilidade->ficha_negocio->id, ['controller' => 'FichaNegocios', 'action' => 'view', $utilidade->ficha_negocio->id]) : '' ?></td>
                <td><?= $this->Number->format($utilidade->total_comag_clp) ?></td>
                <td><?= $this->Number->format($utilidade->total_comag_usd) ?></td>
                <td><?= $this->Number->format($utilidade->total_fee_clp) ?></td>
                <td><?= $this->Number->format($utilidade->total_fee_usd) ?></td>
                <td><?= $this->Number->format($utilidade->diferencia_cl) ?></td>
                <td><?= $this->Number->format($utilidade->diferencia_usd) ?></td>
                <td><?= $this->Number->format($utilidade->cobro_tc_clp) ?></td>
                <td><?= $this->Number->format($utilidade->cobro_tc_usd) ?></td>
                <td><?= $this->Number->format($utilidade->cargo_tc_clp) ?></td>
                <td><?= $this->Number->format($utilidade->cargo_tc_usd) ?></td>
                <td><?= $this->Number->format($utilidade->cargo_remesa_clp) ?></td>
                <td><?= $this->Number->format($utilidade->cargo_remesa_usd) ?></td>
                <td><?= $this->Number->format($utilidade->ult_final_clp) ?></td>
                <td><?= $this->Number->format($utilidade->ult_final_usd) ?></td>
                <td><?= $this->Number->format($utilidade->active) ?></td>
                <td><?= h($utilidade->created) ?></td>
                <td><?= h($utilidade->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $utilidade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $utilidade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $utilidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utilidade->id)]) ?>
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
