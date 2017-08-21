<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sub Sistema'), ['action' => 'edit', $subSistema->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sub Sistema'), ['action' => 'delete', $subSistema->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subSistema->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sub Sistemas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub Sistema'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sistemas'), ['controller' => 'Sistemas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sistema'), ['controller' => 'Sistemas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subSistemas view large-9 medium-8 columns content">
    <h3><?= h($subSistema->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sistema') ?></th>
            <td><?= $subSistema->has('sistema') ? $this->Html->link($subSistema->sistema->name, ['controller' => 'Sistemas', 'action' => 'view', $subSistema->sistema->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subSistema->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subSistema->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($subSistema->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subSistema->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subSistema->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tickets') ?></h4>
        <?php if (!empty($subSistema->tickets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sistema Id') ?></th>
                <th scope="col"><?= __('Sub Sistema Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('User Asignado Id') ?></th>
                <th scope="col"><?= __('Prioridad') ?></th>
                <th scope="col"><?= __('Tiempo Limite') ?></th>
                <th scope="col"><?= __('Tiempo Tipo') ?></th>
                <th scope="col"><?= __('Asunto') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subSistema->tickets as $tickets): ?>
            <tr>
                <td><?= h($tickets->id) ?></td>
                <td><?= h($tickets->sistema_id) ?></td>
                <td><?= h($tickets->sub_sistema_id) ?></td>
                <td><?= h($tickets->user_id) ?></td>
                <td><?= h($tickets->user_asignado_id) ?></td>
                <td><?= h($tickets->prioridad) ?></td>
                <td><?= h($tickets->tiempo_limite) ?></td>
                <td><?= h($tickets->tiempo_tipo) ?></td>
                <td><?= h($tickets->asunto) ?></td>
                <td><?= h($tickets->descripcion) ?></td>
                <td><?= h($tickets->created) ?></td>
                <td><?= h($tickets->modified) ?></td>
                <td><?= h($tickets->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tickets', 'action' => 'view', $tickets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tickets', 'action' => 'edit', $tickets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tickets', 'action' => 'delete', $tickets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tickets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
