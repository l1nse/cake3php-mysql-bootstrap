<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="contactos view large-9 medium-8 columns content">
    <h3><?= h($contacto->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Entidade') ?></th>
            <td><?= $contacto->has('entidade') ? $this->Html->link($contacto->entidade->name, ['controller' => 'Entidades', 'action' => 'view', $contacto->entidade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($contacto->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($contacto->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($contacto->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo') ?></th>
            <td><?= h($contacto->cargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($contacto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contacto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($contacto->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contacto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contacto->modified) ?></td>
        </tr>
    </table>
</div>

<div class="col-md-8">
    <?php if(isset($idcalendario) && is_numeric($idcalendario))
    { ?>
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>calendarios/view/<?php echo $idcalendario ?>"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
    <?php
    } ?>
        
        
</div>