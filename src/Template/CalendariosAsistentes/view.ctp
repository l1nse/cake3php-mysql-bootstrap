<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calendarios Asistente'), ['action' => 'edit', $calendariosAsistente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calendarios Asistente'), ['action' => 'delete', $calendariosAsistente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendariosAsistente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calendarios Asistentes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calendarios Asistente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="calendariosAsistentes view large-9 medium-8 columns content">
    <h3><?= h($calendariosAsistente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $calendariosAsistente->has('user') ? $this->Html->link($calendariosAsistente->user->id, ['controller' => 'Users', 'action' => 'view', $calendariosAsistente->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($calendariosAsistente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reuinion Id') ?></th>
            <td><?= $this->Number->format($calendariosAsistente->reuinion_id) ?></td>
        </tr>
    </table>
</div>
