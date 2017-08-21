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
                ['action' => 'delete', $afp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $afp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Afps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="afps form large-9 medium-8 columns content">
    <?= $this->Form->create($afp) ?>
    <fieldset>
        <legend><?= __('Edit Afp') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('valor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
