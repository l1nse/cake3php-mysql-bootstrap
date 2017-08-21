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
                ['action' => 'delete', $bsp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bsp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bsps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bsps form large-9 medium-8 columns content">
    <?= $this->Form->create($bsp) ?>
    <fieldset>
        <legend><?= __('Edit Bsp') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('document');
            echo $this->Form->control('cd');
            echo $this->Form->control('type_document');
            echo $this->Form->control('agent_code');
            echo $this->Form->control('billing_period', ['empty' => true]);
            echo $this->Form->control('conjuntion');
            echo $this->Form->control('refunden');
            echo $this->Form->control('related');
            echo $this->Form->control('cpns');
            echo $this->Form->control('nr');
            echo $this->Form->control('airline_code');
            echo $this->Form->control('issue_date', ['empty' => true]);
            echo $this->Form->control('int_dom');
            echo $this->Form->control('gross_fare_cash');
            echo $this->Form->control('tax_cash');
            echo $this->Form->control('gross_fare_credit');
            echo $this->Form->control('std_comm_rate');
            echo $this->Form->control('std_comm_amount');
            echo $this->Form->control('vat_on_comm');
            echo $this->Form->control('penalties');
            echo $this->Form->control('net_to_be_paid');
            echo $this->Form->control('credit_card');
            echo $this->Form->control('year');
            echo $this->Form->control('month');
            echo $this->Form->control('week');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
