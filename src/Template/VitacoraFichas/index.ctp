<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vitacora Ficha'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estado Fichas'), ['controller' => 'EstadoFichas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estado Ficha'), ['controller' => 'EstadoFichas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['controller' => 'FichaNegocios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Negocio'), ['controller' => 'FichaNegocios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vitacoraFichas index large-9 medium-8 columns content">
    <h3><?= __('Vitacora Fichas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado_ficha_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ficha_negocio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vitacoraFichas as $vitacoraFicha): ?>
            <tr>
                <td><?= $this->Number->format($vitacoraFicha->id) ?></td>
                <td><?= $vitacoraFicha->has('estado_ficha') ? $this->Html->link($vitacoraFicha->estado_ficha->id, ['controller' => 'EstadoFichas', 'action' => 'view', $vitacoraFicha->estado_ficha->id]) : '' ?></td>
                <td><?= $vitacoraFicha->has('ficha_negocio') ? $this->Html->link($vitacoraFicha->ficha_negocio->id, ['controller' => 'FichaNegocios', 'action' => 'view', $vitacoraFicha->ficha_negocio->id]) : '' ?></td>
                <td><?= h($vitacoraFicha->created) ?></td>
                <td><?= h($vitacoraFicha->modified) ?></td>
                <td><?= $this->Number->format($vitacoraFicha->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vitacoraFicha->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vitacoraFicha->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vitacoraFicha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vitacoraFicha->id)]) ?>
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
