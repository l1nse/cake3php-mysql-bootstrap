<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users view large-9 medium-8 columns content">
    <h3> Ficha personal : <?= h($fichaPersonale->name) ?> <?= h($fichaPersonale->user->apellido1) ?> <?= h($fichaPersonale->user->apellido2) ?> </h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $fichaPersonale->has('user') ? $this->Html->link($fichaPersonale->user->id, ['controller' => 'Users', 'action' => 'view', $fichaPersonale->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $fichaPersonale->has('empresa') ? $this->Html->link($fichaPersonale->empresa->name, ['controller' => 'Empresas', 'action' => 'view', $fichaPersonale->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Movimiento') ?></th>
            <td><?= $fichaPersonale->has('tipo_movimiento') ? $this->Html->link($fichaPersonale->tipo_movimiento->name, ['controller' => 'TipoMovimientos', 'action' => 'view', $fichaPersonale->tipo_movimiento->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Área') ?></th>
            <td><?= $fichaPersonale->has('area') ? $this->Html->link($fichaPersonale->area->name, ['controller' => 'Areas', 'action' => 'view', $fichaPersonale->area->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo') ?></th>
            <td><?= $fichaPersonale->has('cargo') ? $this->Html->link($fichaPersonale->cargo->name, ['controller' => 'Cargos', 'action' => 'view', $fichaPersonale->cargo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($fichaPersonale->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido Paterno') ?></th>
            <td><?= h($fichaPersonale->user->apellido1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido Materno') ?></th>
            <td><?= h($fichaPersonale->user->apellido2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($fichaPersonale->email) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Paise') ?></th>
            <td><?= $fichaPersonale->has('paise') ? $this->Html->link($fichaPersonale->paise->name, ['controller' => 'Paises', 'action' => 'view', $fichaPersonale->paise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudade') ?></th>
            <td><?= $fichaPersonale->has('ciudade') ? $this->Html->link($fichaPersonale->ciudade->name, ['controller' => 'Ciudades', 'action' => 'view', $fichaPersonale->ciudade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comuna') ?></th>
            <td><?= $fichaPersonale->has('comuna') ? $this->Html->link($fichaPersonale->comuna->name, ['controller' => 'Comunas', 'action' => 'view', $fichaPersonale->comuna->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dirección') ?></th>
            <td><?= h($fichaPersonale->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teléfono') ?></th>
            <td><?= h($fichaPersonale->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($fichaPersonale->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Emergencia') ?></th>
            <td><?= h($fichaPersonale->nombre_emergencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teléfono Emergencia') ?></th>
            <td><?= h($fichaPersonale->telefono_emergencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Cuenta') ?></th>
            <td><?= h($fichaPersonale->numero_cuenta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Cuenta') ?></th>
            <td><?= $fichaPersonale->has('tipo_cuenta') ? $this->Html->link($fichaPersonale->tipo_cuenta->name, ['controller' => 'TipoCuentas', 'action' => 'view', $fichaPersonale->tipo_cuenta->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Banco') ?></th>
            <td><?= $fichaPersonale->has('banco') ? $this->Html->link($fichaPersonale->banco->name, ['controller' => 'Bancos', 'action' => 'view', $fichaPersonale->banco->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Afp') ?></th>
            <td><?= $fichaPersonale->has('afp') ? $this->Html->link($fichaPersonale->afp->name, ['controller' => 'Afps', 'action' => 'view', $fichaPersonale->afp->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isapre') ?></th>
            <td><?= $fichaPersonale->has('isapre') ? $this->Html->link($fichaPersonale->isapre->name, ['controller' => 'Isapres', 'action' => 'view', $fichaPersonale->isapre->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fichaPersonale->id) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Apv') ?></th>
            <td><?= $this->Number->format($fichaPersonale->apv) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ahorro Cta2') ?></th>
            <td><?= $this->Number->format($fichaPersonale->ahorro_cta2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Isapre') ?></th>
            <td><?= $this->Number->format($fichaPersonale->valor_isapre) ?></td>
        </tr>
        <tr>
            
                <?php
                    if(isset($fichaPersonale->user['active'])){
                        if($fichaPersonale->user['active'] =='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($fichaPersonale->user['active'] =='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($fichaPersonale->user['active'] =='0') {
                            $estado =  '<span class="label label-warning">Pendiente</span>';
                        }
                        else{
                            $estado =  '';
                        }
                    }
                ?>

            <th scope="row"><?= __('Active') ?></th>
            <td style="text-align: left;"><?= $estado;  ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Nacimiento') ?></th>
            <td><?= h($fichaPersonale->fecha_nacimiento) ?></td>
        </tr>
      <!--  <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($fichaPersonale->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($fichaPersonale->modified) ?></td>
        </tr> -->
            
     
    </table>  
    <hr>
</div>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>fichaPersonales/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>

