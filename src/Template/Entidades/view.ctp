<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Entidade'), ['action' => 'edit', $entidade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Entidade'), ['action' => 'delete', $entidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entidade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Entidades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entidade'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ciudades'), ['controller' => 'Ciudades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciudade'), ['controller' => 'Ciudades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comunas'), ['controller' => 'Comunas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comuna'), ['controller' => 'Comunas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Paises'), ['controller' => 'Paises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paise'), ['controller' => 'Paises', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Despachos'), ['controller' => 'Despachos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Despacho'), ['controller' => 'Despachos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="entidades view large-9 medium-8 columns content">
    <h3><?= h($entidade->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($entidade->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Giro') ?></th>
            <td><?= h($entidade->giro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($entidade->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudade') ?></th>
            <td><?= $entidade->has('ciudade') ? $this->Html->link($entidade->ciudade->name, ['controller' => 'Ciudades', 'action' => 'view', $entidade->ciudade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comuna') ?></th>
            <td><?= $entidade->has('comuna') ? $this->Html->link($entidade->comuna->name, ['controller' => 'Comunas', 'action' => 'view', $entidade->comuna->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paise') ?></th>
            <td><?= $entidade->has('paise') ? $this->Html->link($entidade->paise->name, ['controller' => 'Paises', 'action' => 'view', $entidade->paise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($entidade->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rut') ?></th>
            <td><?= h($entidade->rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rut Representante') ?></th>
            <td><?= h($entidade->rut_representante) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Representante') ?></th>
            <td><?= h($entidade->name_representante) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correo Representante') ?></th>
            <td><?= h($entidade->correo_representante) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($entidade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($entidade->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($entidade->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($entidade->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Despachos') ?></h4>
        <?php if (!empty($entidade->despachos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ticket Id') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col"><?= __('Regione Id') ?></th>
                <th scope="col"><?= __('Ciudade Id') ?></th>
                <th scope="col"><?= __('Comuna Id') ?></th>
                <th scope="col"><?= __('Entidade Id') ?></th>
                <th scope="col"><?= __('Tipo Documento Id') ?></th>
                <th scope="col"><?= __('Numero Documento') ?></th>
                <th scope="col"><?= __('Direccion') ?></th>
                <th scope="col"><?= __('Horario') ?></th>
                <th scope="col"><?= __('Fecha Solicitud') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($entidade->despachos as $despachos): ?>
            <tr>
                <td><?= h($despachos->id) ?></td>
                <td><?= h($despachos->ticket_id) ?></td>
                <td><?= h($despachos->empresa_id) ?></td>
                <td><?= h($despachos->regione_id) ?></td>
                <td><?= h($despachos->ciudade_id) ?></td>
                <td><?= h($despachos->comuna_id) ?></td>
                <td><?= h($despachos->entidade_id) ?></td>
                <td><?= h($despachos->tipo_documento_id) ?></td>
                <td><?= h($despachos->numero_documento) ?></td>
                <td><?= h($despachos->direccion) ?></td>
                <td><?= h($despachos->horario) ?></td>
                <td><?= h($despachos->fecha_solicitud) ?></td>
                <td><?= h($despachos->created) ?></td>
                <td><?= h($despachos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Despachos', 'action' => 'view', $despachos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Despachos', 'action' => 'edit', $despachos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Despachos', 'action' => 'delete', $despachos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $despachos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
