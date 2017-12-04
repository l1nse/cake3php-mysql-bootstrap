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
                ['action' => 'delete', $utilidade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $utilidade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Utilidades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['controller' => 'FichaNegocios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Negocio'), ['controller' => 'FichaNegocios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="utilidades form large-9 medium-8 columns content">
    <?= $this->Form->create($utilidade) ?>
    <fieldset>
        <legend><?= __('Edit Utilidade') ?></legend>
        <?php
            echo $this->Form->control('ficha_negocio_id', ['options' => $fichaNegocios, 'empty' => true]);
            echo $this->Form->control('total_comag_clp');
            echo $this->Form->control('total_comag_usd');
            echo $this->Form->control('total_fee_clp');
            echo $this->Form->control('total_fee_usd');
            echo $this->Form->control('diferencia_cl');
            echo $this->Form->control('diferencia_usd');
            echo $this->Form->control('cobro_tc_clp');
            echo $this->Form->control('cobro_tc_usd');
            echo $this->Form->control('cargo_tc_clp');
            echo $this->Form->control('cargo_tc_usd');
            echo $this->Form->control('cargo_remesa_clp');
            echo $this->Form->control('cargo_remesa_usd');
            echo $this->Form->control('ult_final_clp');
            echo $this->Form->control('ult_final_usd');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
