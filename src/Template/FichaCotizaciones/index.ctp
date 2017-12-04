<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ficha Cotizacione'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fichaCotizaciones index large-9 medium-8 columns content">
    <h3><?= __('Ficha Cotizaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ejemplo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fichaCotizaciones as $fichaCotizacione): ?>
            <tr>
                <td><?= $this->Number->format($fichaCotizacione->id) ?></td>
                <td><?= h($fichaCotizacione->ejemplo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fichaCotizacione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fichaCotizacione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fichaCotizacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichaCotizacione->id)]) ?>
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
