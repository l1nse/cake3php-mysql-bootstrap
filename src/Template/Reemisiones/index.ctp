<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="reemisiones index large-9 medium-8 columns content">
    <h3><?= __('Reemisiones') ?></h3>
    <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>reemisiones/add/"><i class="glyphicon glyphicon-plus-sign"></i> Agregar air</a>
        </div>
    
    <table class="table table-striped data-table">    
            <thead>
                <tr>
                    <th scope="col</th>
                    <th scope="col">AMD</th>
                    <th scope="col">A</th>
                    <th scope="col">M</th>
                    <th scope="col">N</th>
                    <th scope="col">O</th>
                    <th scope="col">Q</th>
                    <th scope="col">I</th>
                    <th scope="col">T_K</th>
                    <th scope="col">F</th>
                    <th scope="col">FP</th>
                    <th scope="col">FVLA</th>
                    <th scope="col">FM</th>
                    <th scope="col">TK</th>
                    <th scope="col">AI</th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reemisiones as $reemisione): ?>
                <tr>
                    <td><?= $this->Number->format($reemisione->id) ?></td>
                    <td><?= h($reemisione->AMD) ?></td>
                    <td><?= h($reemisione->A) ?></td>
                    <td><?= h($reemisione->M) ?></td>
                    <td><?= h($reemisione->N) ?></td>
                    <td><?= h($reemisione->O) ?></td>
                    <td><?= h($reemisione->Q) ?></td>
                    <td><?= h($reemisione->I) ?></td>
                    <td><?= h($reemisione->T_K) ?></td>
                    <td><?= h($reemisione->F) ?></td>
                    <td><?= h($reemisione->FP) ?></td>
                    <td><?= h($reemisione->FVLA) ?></td>
                    <td><?= h($reemisione->FM) ?></td>
                    <td><?= h($reemisione->TK) ?></td>
                    <td><?= h($reemisione->AI) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reemisione->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reemisione->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reemisione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reemisione->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    
    
</div>
