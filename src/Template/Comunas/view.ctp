<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comuna'), ['action' => 'edit', $comuna->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comuna'), ['action' => 'delete', $comuna->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comuna->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comunas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comuna'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ciudades'), ['controller' => 'Ciudades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciudade'), ['controller' => 'Ciudades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comunas view large-9 medium-8 columns content">
    <h3><?= h($comuna->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($comuna->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudade') ?></th>
            <td><?= $comuna->has('ciudade') ? $this->Html->link($comuna->ciudade->name, ['controller' => 'Ciudades', 'action' => 'view', $comuna->ciudade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comuna->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($comuna->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($comuna->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ficha Personales') ?></h4>
        <?php if (!empty($comuna->ficha_personales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col"><?= __('Tipo Movimiento Id') ?></th>
                <th scope="col"><?= __('Area Id') ?></th>
                <th scope="col"><?= __('Cargo Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Apellido1') ?></th>
                <th scope="col"><?= __('Apellido2') ?></th>
                <th scope="col"><?= __('Fecha Nacimiento') ?></th>
                <th scope="col"><?= __('Estado Civil') ?></th>
                <th scope="col"><?= __('Paise Id') ?></th>
                <th scope="col"><?= __('Ciudade Id') ?></th>
                <th scope="col"><?= __('Comuna Id') ?></th>
                <th scope="col"><?= __('Direccion') ?></th>
                <th scope="col"><?= __('Telefono') ?></th>
                <th scope="col"><?= __('Celular') ?></th>
                <th scope="col"><?= __('Nombre Emergencia') ?></th>
                <th scope="col"><?= __('Telefono Emergencia') ?></th>
                <th scope="col"><?= __('Numero Cuenta') ?></th>
                <th scope="col"><?= __('Tipo Cuenta Id') ?></th>
                <th scope="col"><?= __('Banco Id') ?></th>
                <th scope="col"><?= __('Afp Id') ?></th>
                <th scope="col"><?= __('Apv') ?></th>
                <th scope="col"><?= __('Ahorro Cta2') ?></th>
                <th scope="col"><?= __('Isapre Id') ?></th>
                <th scope="col"><?= __('Valor Isapre') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($comuna->ficha_personales as $fichaPersonales): ?>
            <tr>
                <td><?= h($fichaPersonales->id) ?></td>
                <td><?= h($fichaPersonales->user_id) ?></td>
                <td><?= h($fichaPersonales->empresa_id) ?></td>
                <td><?= h($fichaPersonales->tipo_movimiento_id) ?></td>
                <td><?= h($fichaPersonales->area_id) ?></td>
                <td><?= h($fichaPersonales->cargo_id) ?></td>
                <td><?= h($fichaPersonales->name) ?></td>
                <td><?= h($fichaPersonales->email) ?></td>
                <td><?= h($fichaPersonales->apellido1) ?></td>
                <td><?= h($fichaPersonales->apellido2) ?></td>
                <td><?= h($fichaPersonales->fecha_nacimiento) ?></td>
                <td><?= h($fichaPersonales->estado_civil) ?></td>
                <td><?= h($fichaPersonales->paise_id) ?></td>
                <td><?= h($fichaPersonales->ciudade_id) ?></td>
                <td><?= h($fichaPersonales->comuna_id) ?></td>
                <td><?= h($fichaPersonales->direccion) ?></td>
                <td><?= h($fichaPersonales->telefono) ?></td>
                <td><?= h($fichaPersonales->celular) ?></td>
                <td><?= h($fichaPersonales->nombre_emergencia) ?></td>
                <td><?= h($fichaPersonales->telefono_emergencia) ?></td>
                <td><?= h($fichaPersonales->numero_cuenta) ?></td>
                <td><?= h($fichaPersonales->tipo_cuenta_id) ?></td>
                <td><?= h($fichaPersonales->banco_id) ?></td>
                <td><?= h($fichaPersonales->afp_id) ?></td>
                <td><?= h($fichaPersonales->apv) ?></td>
                <td><?= h($fichaPersonales->ahorro_cta2) ?></td>
                <td><?= h($fichaPersonales->isapre_id) ?></td>
                <td><?= h($fichaPersonales->valor_isapre) ?></td>
                <td><?= h($fichaPersonales->created) ?></td>
                <td><?= h($fichaPersonales->modified) ?></td>
                <td><?= h($fichaPersonales->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FichaPersonales', 'action' => 'view', $fichaPersonales->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FichaPersonales', 'action' => 'edit', $fichaPersonales->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FichaPersonales', 'action' => 'delete', $fichaPersonales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichaPersonales->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
