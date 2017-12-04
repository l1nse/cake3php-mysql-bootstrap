<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reemision'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reemisions index large-9 medium-8 columns content">
    <h3><?= __('Reemisions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('AMD') ?></th>
                <th scope="col"><?= $this->Paginator->sort('A') ?></th>
                <th scope="col"><?= $this->Paginator->sort('K') ?></th>
                <th scope="col"><?= $this->Paginator->sort('M') ?></th>
                <th scope="col"><?= $this->Paginator->sort('N') ?></th>
                <th scope="col"><?= $this->Paginator->sort('O') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Q') ?></th>
                <th scope="col"><?= $this->Paginator->sort('I') ?></th>
                <th scope="col"><?= $this->Paginator->sort('T_K') ?></th>
                <th scope="col"><?= $this->Paginator->sort('F') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FP') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FVLA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FM') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TK') ?></th>
                <th scope="col"><?= $this->Paginator->sort('AI') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reemisions as $reemision): ?>
            <tr>
                <td><?= $this->Number->format($reemision->id) ?></td>
                <td><?= h($reemision->AMD) ?></td>
                <td><?= h($reemision->A) ?></td>
                <td><?= h($reemision->K) ?></td>
                <td><?= h($reemision->M) ?></td>
                <td><?= h($reemision->N) ?></td>
                <td><?= h($reemision->O) ?></td>
                <td><?= h($reemision->Q) ?></td>
                <td><?= h($reemision->I) ?></td>
                <td><?= h($reemision->T_K) ?></td>
                <td><?= h($reemision->F) ?></td>
                <td><?= h($reemision->FP) ?></td>
                <td><?= h($reemision->FVLA) ?></td>
                <td><?= h($reemision->FM) ?></td>
                <td><?= h($reemision->TK) ?></td>
                <td><?= h($reemision->AI) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reemision->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reemision->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reemision->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reemision->id)]) ?>
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
