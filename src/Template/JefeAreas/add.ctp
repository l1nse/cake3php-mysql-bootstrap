<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="jefeAreas form large-9 medium-8 columns content">
    <?= $this->Form->create($jefeArea) ?>
    <fieldset>
        <legend><?= __('Add Jefe Area') ?></legend>
        <?php
            echo $this->Form->control('area_id', ['options' => $areas, 'empty' => true]);
            echo $this->Form->control('ficha_personale_id', ['options' => $fichaPersonales, 'empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
