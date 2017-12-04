<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mensajes Aerolinea'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mensajesAerolineas index large-9 medium-8 columns content">
    <h3><?= __('Mensajes Aerolineas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SSR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reemisione_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mensajesAerolineas as $mensajesAerolinea): ?>
            <tr>
                <td><?= $this->Number->format($mensajesAerolinea->ID) ?></td>
                <td><?= h($mensajesAerolinea->SSR) ?></td>
                <td><?= h($mensajesAerolinea->reemisione_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mensajesAerolinea->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mensajesAerolinea->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mensajesAerolinea->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $mensajesAerolinea->ID)]) ?>
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
