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
	header("Content-Disposition: attachment; filename=Informe_reuiones.xls"); 
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false); 

?>

<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<div class="tickets index large-9 medium-8 columns content">
    <h3 class="page-header"><?= __('Informe reuniones') ?></h3>
    <div class="table-responsive">
    <table class="table table-striped tabled-bordered data-table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Motivo</th>
                <th scope="col">Observación</th>
                <th scope="col">Dirección</th>
                <th scope="col">Fecha</th>
                <th scope="col">Empresa</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
           	<?php foreach ($calendario as $row): ?>           	
           	<tr>
            	<td><?= $this->Number->format($row->id) ?></td>    
				<td><?= h($row->titulo) ?></td> 
				<td><?= h($row->motivo) ?></td>
				<td><?= h($row->observacion) ?></td>
				<td><?= h($row->address) ?></td>
				<td><?= h($row->date_time) ?></td>
				<td><?= h($row->contactos[0]['entidade']['name']) ?></td>
				<?php
					 if($row->active){

                if($row->active =='1'){
                    $estado = 'Agendada';
                                    
                }elseif($row->active =='2'){
                    $estado = 'Cancelada';
                }elseif ($row->active == '3') {
                    $estado = 'Reagendada';
                }
                elseif ($row->active =='4') {
                    $estado = 'Editada';
                }
                elseif ($row->active =='5') {
                    $estado = 'Concretadan';
                }else{
                    $estado =  '';
                }
            }
				?>
				<td><?= $estado ?></td>  	         
				
            </tr>
           	<?php endforeach ?>
            
            
        </tbody>
    </table>
    </div>
</div>
