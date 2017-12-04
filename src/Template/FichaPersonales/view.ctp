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
            <td><?= h($fichaPersonale->user->id )  ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?=  h($fichaPersonale->empresa->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Movimiento') ?></th>
            <td><?= h($fichaPersonale->tipo_movimiento->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Área') ?></th>
            <td><?= h($fichaPersonale->area->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo') ?></th>
            <td><?= h($fichaPersonale->cargo->name)  ?></td>
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
            <td><?= h($fichaPersonale->paise->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudade') ?></th>
            <td><?= h($fichaPersonale->ciudade->name)?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comuna') ?></th>
            <td><?= h($fichaPersonale->comuna->name) ?></td>
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
            <td><?= h($fichaPersonale->banco->name)  ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Afp') ?></th>
            <td><?= h($fichaPersonale->afp->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isapre') ?></th>
            <td><?= h($fichaPersonale->isapre->name) ?></td>
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
<?php if(isset($idcalendario) && is_numeric($idcalendario))
    { 
?>
    <div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>calendarios/view/<?php echo $idcalendario ?>"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>

<?php  
    }else{ ?>
    <div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>fichaPersonales/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>


<?php   
    }
 ?>
    
</div>

