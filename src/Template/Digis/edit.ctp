<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $digi->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $digi->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Digis'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="digis form large-9 medium-8 columns content">
    <?= $this->Form->create($digi) ?>
    <fieldset>
        <legend><?= __('Edit Digi') ?></legend>
        <?php
            echo $this->Form->control('active');
            echo $this->Form->control('observacion');
            echo $this->Form->control('fecha_desde', ['empty' => true]);
            echo $this->Form->control('fecha_hasta', ['empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
