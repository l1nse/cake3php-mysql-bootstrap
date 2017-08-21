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
	header("Content-Disposition: attachment; filename=Anexo.xls"); 
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false); 

?>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<div class="exportar_excel index large-9 medium-8 columns content">
    <h3 class="page-header"><?= __('Listado corporativo') ?></h3>
    <div class="table-responsive">
    <table class="table table-striped tabled-bordered data-table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Empresa</th>
                <th scope="col">Área</th>
                <th scope="col">Cargo</th>
                <th scope="col">Email</th>
                <th scope="col">Anexo</th>
                <th scope="col">Celular</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
            foreach ($fichaPersonales as $ficha): 
                
            ?> 
            <tr>
                <td><?= $this->Number->format($ficha->id) ?></td>
                <td><?= h($ficha->user['name'].' '.$ficha->user['apellido1']) ?></td>
                <td><?= h($ficha->empresa['name']) ?></td>
                <td><?= h($ficha->area['name']) ?></td>
                <td><?= h($ficha->cargo['name']) ?></td>
                <td><?= h($ficha->email) ?></td> 
                <td><?= h($ficha->telefono) ?></td>
                <td><?= h($ficha->celular) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
