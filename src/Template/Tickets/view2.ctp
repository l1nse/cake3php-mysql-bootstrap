<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php
    if(isset($ticket->active)){
        if($ticket->active=='1'){
            $estado =  'Abierto';
        }elseif($ticket->active=='2'){
            $estado =  'Pendiente';
        }elseif($ticket->active=='3'){
            $estado =  'Cerrado';
        }else{
            $estado =  'Anulado';
        }
    }

    if(isset($ticket->prioridad)){
        if($ticket->prioridad=='1'){
            $prioridad = 'Alta';
        }elseif($ticket->prioridad=='1'){
            $prioridad = 'Media';
        }elseif($ticket->prioridad=='1'){
            $prioridad = 'Baja';
        }else{
            $prioridad = 'Alta';
        }
    }
?>

<div class="tickets view large-9 medium-8 columns content">
    <h3>Ticket N° <?= h($ticket->id) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Sistema') ?></th>
            <td><?= $ticket->sistema->name; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub-Sistema') ?></th>
            <td>
                <?= $ticket->sub_sistema->name; ?>
                <?php
                    if($ticket->sub_sistema_id==18 && isset($ticket->despachos[0]->id)){
                   //var_dump($ticket->despachos[0]->id); die;
                ?>
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>despachos/view/<?php echo $ticket->despachos[0]->id; ?>" data-toggle="tooltip" data-placement="left" title="Ver Despacho"><i class="glyphicon glyphicon-search"></i> Ver Despacho</a>
                <?php
                }
                ?>

            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario Creador') ?></th>
            <td><?= $ticket->user->username; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario Asignado') ?></th>
            <td><?= __($ticket->user_asignado->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prioridad') ?></th>
            <td><?= h($prioridad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tiempo limite') ?></th>
            <td><?= h($ticket->tiempo_limite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unidad de tiempo') ?></th>
            <td><?= h($ticket->tiempo_tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asunto') ?></th>
            <td><?= h($ticket->asunto) ?></td>
        </tr>
        <?php 
            if(is_array($archive) && count($archive)>0){
            ?>
            <tr>
                <th scope="row"><?= __('Adjunto') ?></th>
                <td><a href="<?= APP_URI ?>uploads/descarga/ticket/<?= $archive[0]->name; ?>" class="btn btn-success" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a></td>
            </tr>
            <?php
            }
        ?>
        
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= $this->Text->autoParagraph(h($ticket->descripcion)); ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= __($estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($ticket->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($ticket->modified) ?></td>
        </tr>
    </table>
</div>
<hr>
    <div class="tickets view large-9 medium-8 columns content well">
        <h4>Detalle de gestiones</h4>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>N°</th>
                    <!--<th>Usuario</th>-->
                    <th>Fecha</th>
                    <th>Comentario</th>
                    <th>Adjunto</th>
                    <!--<th>Acciones</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                    if(is_array($rs_gestiones) && count($rs_gestiones)>0){
                        $i = 1;
                        foreach ($rs_gestiones as $row) {
                            echo '<tr>';
                            echo '<td>'.$i .'</td>';
                            echo '<td>'.$row['created'] .'</td>';
                            echo '<td>'.$row['comentarios'] .'</td>';
                            if($row['file_name']!=''){
                                echo '<td><a href="'.APP_URI.'uploads/descarga/ticket/'.$row['file_name'] .'" class="btn btn-success btn-xs" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a></td>';
                            }else{
                                echo '<td></td>';
                            }
                            
                            echo '<!--<td></td>-->';
                            echo '</tr>';
                            $i++;
                        }
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    <hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>tickets/asignado/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>
