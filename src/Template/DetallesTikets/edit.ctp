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
                ['action' => 'delete', $detallesTiket->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detallesTiket->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Detalles Tikets'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="detallesTikets form large-9 medium-8 columns content">
    <?= $this->Form->create($detallesTiket) ?>
    <fieldset>
        <legend><?= __('Edit Detalles Tiket') ?></legend>
        <?php
            echo $this->Form->control('H');
            echo $this->Form->control('K');
            echo $this->Form->control('ET');
            echo $this->Form->control('reemisione_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
