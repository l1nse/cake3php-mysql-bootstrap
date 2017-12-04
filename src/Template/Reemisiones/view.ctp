<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reemisione'), ['action' => 'edit', $reemisione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reemisione'), ['action' => 'delete', $reemisione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reemisione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reemisiones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reemisione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Detalles Tikets'), ['controller' => 'DetallesTikets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalles Tiket'), ['controller' => 'DetallesTikets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mensajes Aerolineas'), ['controller' => 'MensajesAerolineas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mensajes Aerolinea'), ['controller' => 'MensajesAerolineas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reemisiones view large-9 medium-8 columns content">
    <h3><?= h($reemisione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('AMD') ?></th>
            <td><?= h($reemisione->AMD) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A') ?></th>
            <td><?= h($reemisione->A) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('M') ?></th>
            <td><?= h($reemisione->M) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('N') ?></th>
            <td><?= h($reemisione->N) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('O') ?></th>
            <td><?= h($reemisione->O) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Q') ?></th>
            <td><?= h($reemisione->Q) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('I') ?></th>
            <td><?= h($reemisione->I) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T K') ?></th>
            <td><?= h($reemisione->T_K) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('F') ?></th>
            <td><?= h($reemisione->F) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FP') ?></th>
            <td><?= h($reemisione->FP) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FVLA') ?></th>
            <td><?= h($reemisione->FVLA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FM') ?></th>
            <td><?= h($reemisione->FM) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TK') ?></th>
            <td><?= h($reemisione->TK) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AI') ?></th>
            <td><?= h($reemisione->AI) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reemisione->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('K') ?></h4>
        <?= $this->Text->autoParagraph(h($reemisione->K)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Detalles Tikets') ?></h4>
        <?php if (!empty($reemisione->detalles_tikets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('H') ?></th>
                <th scope="col"><?= __('K') ?></th>
                <th scope="col"><?= __('ET') ?></th>
                <th scope="col"><?= __('Reemisione Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($reemisione->detalles_tikets as $detallesTikets): ?>
            <tr>
                <td><?= h($detallesTikets->id) ?></td>
                <td><?= h($detallesTikets->H) ?></td>
                <td><?= h($detallesTikets->K) ?></td>
                <td><?= h($detallesTikets->ET) ?></td>
                <td><?= h($detallesTikets->reemisione_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DetallesTikets', 'action' => 'view', $detallesTikets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetallesTikets', 'action' => 'edit', $detallesTikets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetallesTikets', 'action' => 'delete', $detallesTikets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detallesTikets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Mensajes Aerolineas') ?></h4>
        <?php if (!empty($reemisione->mensajes_aerolineas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('SSR') ?></th>
                <th scope="col"><?= __('Reemisione Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($reemisione->mensajes_aerolineas as $mensajesAerolineas): ?>
            <tr>
                <td><?= h($mensajesAerolineas->ID) ?></td>
                <td><?= h($mensajesAerolineas->SSR) ?></td>
                <td><?= h($mensajesAerolineas->reemisione_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MensajesAerolineas', 'action' => 'view', $mensajesAerolineas->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MensajesAerolineas', 'action' => 'edit', $mensajesAerolineas->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MensajesAerolineas', 'action' => 'delete', $mensajesAerolineas->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $mensajesAerolineas->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
