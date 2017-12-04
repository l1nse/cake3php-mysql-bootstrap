<?php
/**
  * @var \App\View\AppView $this
  */

?>
<?= $this->Html->script('listado') ?>
<div class="tickets index large-9 medium-8 columns content">
    <h3 class="page-header"><?= __('Informe de tickets asignados') ?></h3>.
    <div class="row">
        <div class="col-md-12">
            <div class="input select required col-md-3">
                <select class="form-control" required="required" id="user_asignado_id" name="user_asignado_id">
                <option value="">Seleccionar usuario</option>
                <?php
                    if(is_array($rs_user) && count($rs_user)>0){
                        foreach ($rs_user as $row) {
                            if($user_asignado_id==$row['id']){
                                echo '<option value="'.$row['id'].'" selected="selected">'.$row['name'].' '.$row['apellido1'].'</option>';
                            }else{
                                echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';
                            }
                        }
                    }
                ?>
                </select>
            </div>
            <a class="btn btn-primary btn-xs" href="javascript:buscarListado()"><i class="glyphicon glyphicon-search"></i> Buscar</a>
            <!--<a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>tickets/asignado_excel/"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>-->
        </div>
    </div>
    <div class="table-responsive">
    <table class="table table-striped tabled-bordered data-table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Sistema</th>
                <th scope="col">Sub-Sistema</th>
                <th scope="col">Solicitante</th>
                <th scope="col">Asignado</th>
                <th scope="col">Asunto</th>
                <th scope="col">Creado</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Estado</th>
                <th scope="col" class="actions">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            foreach ($tickets as $ticket): 
                if(isset($ticket->active)){
                    if($ticket->active=='1'){
                        $estado =  '<span class="label label-danger">Abierto</span>';
                        $pulsate = 1;
                    }elseif($ticket->active=='2'){
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                        $pulsate = 1;
                    }elseif($ticket->active=='3'){
                        $estado =  '<span class="label label-info">Cerrado</span>';
                         $pulsate = 2; 
                    }elseif($ticket->active=='4'){
                        $estado =  '<span class="label label-success">Reasignado</span>';
                        $pulsate = 1;
                    }elseif($ticket->active=='0'){
                        $estado =  '<span class="label label-default">Anulado</span>';
                         $pulsate = 2; 
                    }elseif($ticket->active=='5'){
                        $estado =  '<span class="label label-danger">Rechazado</span>';
                         $pulsate = 2; 
                    }elseif($ticket->active=='6'){
                        $estado =  '<span class="label label-primary">Aprobado</span>';
                         $pulsate = 2; 
                    }else{
                        $estado =  '';
                         $pulsate = 2; 
                    }
                }

                if(isset($ticket->prioridad)){
                    if($ticket->prioridad=='1'){
                        $prioridad = '<span><i class="glyphicon glyphicon-upload"></i> Alta</span>';
                    }elseif($ticket->prioridad=='2'){
                        $prioridad = '<span><i class="glyphicon glyphicon-play-circle"></i> Media</span>';
                    }elseif($ticket->prioridad=='3'){
                        $prioridad = '<span><i class="glyphicon glyphicon-download"></i> Baja</span>';
                    }else{
                        $prioridad = '<span><i class="glyphicon glyphicon-upload"></i> Alta</span>';
                    }
                }

                $estado_title = isset($ticket->active) && ($ticket->active=='0' || $ticket->active=='3') ? 'disabled="disabled"' : ''; 
                if($pulsate=='1' && $ticket->prioridad=='1'){
                    $td_class = 'danger';
                }elseif($pulsate=='1' && $ticket->prioridad=='2'){
                    $td_class = 'warning';
                }else{
                    $td_class = '';
                }

                $date = $ticket->created;
            ?>
            <tr class="<?php echo $td_class; ?>">
                <td><?= $this->Number->format($ticket->id) ?></td>
                <td><?= h($ticket->sistema->name) ?></td>
                <td><?= h($ticket->sub_sistema->name) ?></td>
                <td><?= h($ticket->user->name.' '.$ticket->user->apellido1) ?></td>
                <td><?= h($ticket->user_asignado->name.' '.$ticket->user_asignado->apellido1) ?></td>
                <td><?= h($ticket->asunto) ?></td>
                <td><?= $date->format('d/m/Y'); ?></td>
                <td><?= $prioridad; ?></td>
                <td><?= $estado; ?></td>
                <td class="actions" style="text-align: center;">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>tickets/view2/<?php echo $ticket->id; ?>" data-toggle="tooltip" data-placement="left" title="Ver Ticket"><i class="glyphicon glyphicon-search"></i></a>
                     <?php
                        if($ticket->sub_sistema_id==18 && isset($ticket->despachos[0]->id)){
                           //var_dump($ticket->despachos[0]->id); die;
                        ?>
                            <a class="btn btn-default btn-xs" href="<?php echo APP_URI; ?>despachos/view/<?php echo $ticket->despachos[0]->id; ?>" data-toggle="tooltip" data-placement="left" title="Ver Despachos"><i class="glyphicon glyphicon-briefcase"></i></a>
                        <?php
                        }
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
