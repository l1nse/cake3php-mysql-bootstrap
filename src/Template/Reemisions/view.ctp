<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reemision'), ['action' => 'edit', $reemision->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reemision'), ['action' => 'delete', $reemision->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reemision->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reemisions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reemision'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reemisions view large-9 medium-8 columns content">
    <h3><?= h($reemision->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('AMD') ?></th>
            <td><?= h($reemision->AMD) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A') ?></th>
            <td><?= h($reemision->A) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('K') ?></th>
            <td><?= h($reemision->K) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('M') ?></th>
            <td><?= h($reemision->M) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('N') ?></th>
            <td><?= h($reemision->N) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('O') ?></th>
            <td><?= h($reemision->O) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Q') ?></th>
            <td><?= h($reemision->Q) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('I') ?></th>
            <td><?= h($reemision->I) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T K') ?></th>
            <td><?= h($reemision->T_K) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('F') ?></th>
            <td><?= h($reemision->F) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FP') ?></th>
            <td><?= h($reemision->FP) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FVLA') ?></th>
            <td><?= h($reemision->FVLA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FM') ?></th>
            <td><?= h($reemision->FM) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TK') ?></th>
            <td><?= h($reemision->TK) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AI') ?></th>
            <td><?= h($reemision->AI) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reemision->id) ?></td>
        </tr>
    </table>
</div>
