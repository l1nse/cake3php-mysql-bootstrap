<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reemisions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="reemisions form large-9 medium-8 columns content">
    <?= $this->Form->create($reemision) ?>
    <fieldset>
        <legend><?= __('Add Reemision') ?></legend>
        <?php
            echo $this->Form->control('AMD');
            echo $this->Form->control('A');
            echo $this->Form->control('K');
            echo $this->Form->control('M');
            echo $this->Form->control('N');
            echo $this->Form->control('O');
            echo $this->Form->control('Q');
            echo $this->Form->control('I');
            echo $this->Form->control('T_K');
            echo $this->Form->control('F');
            echo $this->Form->control('FP');
            echo $this->Form->control('FVLA');
            echo $this->Form->control('FM');
            echo $this->Form->control('TK');
            echo $this->Form->control('AI');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
