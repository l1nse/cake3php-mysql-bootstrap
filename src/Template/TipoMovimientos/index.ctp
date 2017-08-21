<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tipo Movimiento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoMovimientos index large-9 medium-8 columns content">
    <h3><?= __('Tipo Movimientos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoMovimientos as $tipoMovimiento): ?>
            <tr>
                <td><?= $this->Number->format($tipoMovimiento->id) ?></td>
                <td><?= h($tipoMovimiento->name) ?></td>
                <td><?= $this->Number->format($tipoMovimiento->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipoMovimiento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoMovimiento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoMovimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoMovimiento->id)]) ?>
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
