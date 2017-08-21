<?php
	/*header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=tickets_creados.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");*/
	/*header("Content-type: application/vnd.ms-excel; name='excel'");
	header("Content-Disposition: attachment; filename=tickets_creados.xls");
	header("Pragma: no-cache");
	header("Expires: 0");*/
	header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
	header("Content-type:   application/x-msexcel; charset=utf-8");
	header("Content-Disposition: attachment; filename=tickets_asignados.xls"); 
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false); 

?>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<div class="tickets index large-9 medium-8 columns content">
    <h3 class="page-header"><?= __('Tickets asignados') ?></h3>
    <div class="table-responsive">
    <table class="table table-striped tabled-bordered data-table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Sistema</th>
                <th scope="col">Creador Ticket</th>
                <th scope="col">Asignado</th>
                <th scope="col">Asunto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Creado</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($tickets as $ticket): 
                if(isset($ticket->active)){
                    if($ticket->active=='1'){
                        $estado =  'Abierto';
                        $pulsate = 1;
                    }elseif($ticket->active=='2'){
                        $estado =  'Pendiente';
                        $pulsate = 1;
                    }elseif($ticket->active=='3'){
                        $estado =  'Cerrado';
                         $pulsate = 2; 
                    }elseif($ticket->active=='4'){
                        $estado =  'Reasignado';
                        $pulsate = 1;
                    }elseif($ticket->active=='0'){
                        $estado =  'Anulado';
                         $pulsate = 2; 
                    }elseif($ticket->active=='5'){
                        $estado =  'Rechazado';
                         $pulsate = 2; 
                    }elseif($ticket->active=='6'){
                        $estado =  'Aprobado';
                         $pulsate = 2; 
                    }else{
                        $estado =  '';
                         $pulsate = 2; 
                    }
                }

                if(isset($ticket->prioridad)){
                    if($ticket->prioridad=='1'){
                        $prioridad = 'Alta';
                    }elseif($ticket->prioridad=='2'){
                        $prioridad = 'Media';
                    }elseif($ticket->prioridad=='3'){
                        $prioridad = 'Baja';
                    }else{
                        $prioridad = 'Alta';
                    }
                }
                
                $estado_title = isset($ticket->active) && ($ticket->active=='0' || $ticket->active=='3') ? 'disabled="disabled"' : ''; 

                $estado_title = isset($ticket->active) && ($ticket->active=='0' || $ticket->active=='3') ? 'disabled="disabled"' : ''; 
                if($pulsate=='1' && $ticket->prioridad=='1'){
                    $td_class = 'danger';
                }elseif($pulsate=='1' && $ticket->prioridad=='2'){
                    $td_class = 'warning';
                }else{
                    $td_class = '';
                }
            ?>
            <tr>
                <td><?= $this->Number->format($ticket->id) ?></td>
                <td><?= h($ticket->sistema->name) ?></td>
                <td><?= h($ticket->user->username) ?></td>
                <td><?= h($ticket->user_asignado->username) ?></td>
                <td><?= h($ticket->asunto) ?></td>
                <td><?= h($ticket->descripcion) ?></td>
                <td><?= h($ticket->created) ?></td>
                <td class="center"><?= $prioridad;?></td>
                <td><?= $estado; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
