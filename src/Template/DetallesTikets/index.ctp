<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Detalles Tiket'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detallesTikets index large-9 medium-8 columns content">
    <h3><?= __('Detalles Tikets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('H') ?></th>
                <th scope="col"><?= $this->Paginator->sort('K') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ET') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reemisione_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detallesTikets as $detallesTiket): ?>
            <tr>
                <td><?= $this->Number->format($detallesTiket->id) ?></td>
                <td><?= h($detallesTiket->H) ?></td>
                <td><?= h($detallesTiket->K) ?></td>
                <td><?= h($detallesTiket->ET) ?></td>
                <td><?= h($detallesTiket->reemisione_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $detallesTiket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detallesTiket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detallesTiket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detallesTiket->id)]) ?>
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
