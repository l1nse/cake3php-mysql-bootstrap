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
                ['action' => 'delete', $mensajesAerolinea->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mensajesAerolinea->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mensajes Aerolineas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mensajesAerolineas form large-9 medium-8 columns content">
    <?= $this->Form->create($mensajesAerolinea) ?>
    <fieldset>
        <legend><?= __('Edit Mensajes Aerolinea') ?></legend>
        <?php
            echo $this->Form->control('SSR');
            echo $this->Form->control('reemisione_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
