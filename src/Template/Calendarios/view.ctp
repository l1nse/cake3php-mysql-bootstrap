<?php
/**
  * @var \App\View\AppView $this
  */
?>

  <script type="text/javascript">
  tinymce.init({
    selector: '#descripcion',
      statusbar: false,
      visual: false,
      menubar: false,
      toolbar: false,
      readonly : 1,
    convert_newlines_to_brs : false,


  });
  tinymce.init({
    selector: '#observacion',
      statusbar: false,
      visual: false,
      menubar: false,
      toolbar: false,
      readonly : 1,
    convert_newlines_to_brs : false,

  });



</script>
<?= $this->Html->script('calendarioView') ?>
<h3> Reunión : <?= h($calendario->titulo) ?></h3>
<hr>    

        
<div class="calendarios view large-9 medium-8 columns content">    


    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($calendario->titulo) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Observación') ?></th>
            <td><?= h($calendario->observacion) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Observación') ?></th>
            <td><textarea class="form-control" name="observacion" id="observacion" rows="4" cols="50">
                                <td><?= $calendario->observacion ?></td>
                    </textarea>
               </td>
            
        </tr>
         <tr>
            <th scope="row"><?= __('Motivo') ?></th>
               <td><textarea class="form-control" name="descripcion" id="descripcion" rows="4" cols="50">
                                <td><?= $calendario->descripcion ?></td>
                    </textarea>
               </td>
            
        </tr>
        <tr>
            <th scope="row"><?= __('Dirección') ?></th>
            <td><?= h($calendario->address) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= h($calendario->contactos[0]['entidade']['name']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($calendario->id) ?></td>
        </tr>
         <?php
                //var_dump($row->permiso['active'] =='1'); die;    
            if(isset($calendario->active)){

                if($calendario->active =='1'){
                    $estado =  '<span class="label label-success">Agendada</span>';
                                    
                }elseif($calendario->active =='2'){
                    $estado =  '<span class="label label-danger">Cancelada</span>';
                }elseif ($calendario->active =='3') {
                    $estado =  '<span class="label label-warning">Reagendada</span>';
                }
                elseif ($calendario->active =='4') {
                    $estado =  '<span class="label label-info">Editada</span>';
                }
                elseif ($calendario->active =='5') {
                    $estado =  '<span class="label label-default">Concretada</span>';
                }elseif ($calendario->active =='6') {
                    $estado =  '<span class="label" style="background-color: #FD05C1" >Pre Agendada</span>';
                }
                else{
                    $estado =  '';
                }
            }
        ?>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td style="text-align: left;"><?= $estado; ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Tipo Calendario') ?></th>
            <td><?= $this->Number->format($calendario->tipo_calendario) ?></td>
        </tr>-->
        <?php $date = $calendario->date_time; ?>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($date->format('d/m/Y H:m')) ?></td>
        </tr>
        <!--<atr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($calendario->created) ?></td>
        </tr> 
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($calendario->modified) ?></td>
        </tr>-->
         
    </table>
   
</div>
<div class="row">
    <div class="form-group required">
        <div class="col-md-6">
            <a class="btn btn-primary" href="<?php echo APP_URI; ?>calendarios/index/<?php echo $calendario->tipo_calendario?>"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>            
        </div>
    </div>
    
    
    <?php if($calendario->active =='5' || $calendario->active =='2') { ?>
        <div class="col-md-2" align="right">
            <a id="btn_guard" class="btn btn-success" href="#" disabled><i class="glyphicon glyphicon-check" ></i> Reunión concretada</a>
        </div>
        <div class="col-md-2" align="right">
            <a class="btn btn-danger" href="#"<i class="glyphicon glyphicon-trash" disabled></i> Cancelar reunión</a>
        </div>
        <div class="col-md-2" align="right">
            <a class="btn btn-warning" href="#" disabled><i class="glyphicon glyphicon-edit" ></i> Editar reunión</a>
        </div>


    <?php }else{ ?>
        <div class="col-md-2" align="right">
            <a id="btn_cancelar" class="btn btn-danger" href="#"><i class="glyphicon glyphicon-trash" ></i> Cancelar reunión</a>
            
        </div>
        <div class="col-md-2" align="right">
            <a id="btn_guardar" class="btn btn-success" href="#"><i class="glyphicon glyphicon-check"></i> Reunión concretada</a>
        </div>
        <div class="col-md-2" align="right">
        <a class="btn btn-warning" href="<?php echo APP_URI; ?>calendarios/edit/<?php echo $calendario->id; ?>/<?php echo $calendario->contactos[0]['entidade']['id'] ?>"><i class="glyphicon glyphicon-edit"></i> Editar reunión</a>
        </div>

    <?php } ?>
    <hr>
</div>
           
 
<hr>


<hr>
<p>
  <h3>Ver </h3>
 <a class="btn btn-primary" data-toggle="collapse" href="#collapseContactos" aria-expanded="false" aria-controls="collapseContactos">
    Contactos
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseAsistentes" aria-expanded="false" aria-controls="collapseAsistentes">
    Asistentes
  </a>
    <a class="btn btn-success" href="<?php echo APP_URI; ?>calendarios/exportPdf/<?php echo $calendario->id; ?>"><i class="glyphicon glyphicon-download-alt"></i> Exportar a PDF</a>
</p>
<div class="collapse" id="collapseContactos">
    <div class="card card-block">
        <div class="table-responsive">
            <table class="table table-striped data-table">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Ver</th>
                    
                    </thead>
                <tbody>

                    <?php foreach ($contactos as $row):?>                            

                        <tr>
                            <td><?php echo $row->contacto['id']  ?> </td>
                            <td><?php echo $row->contacto['name']  ?> </td>
                            <td><?php echo $row->contacto['email']  ?> </td>
                            <td><?php echo $row->contacto['telefono']  ?> </td>                                                     
                            <td><a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>contactos/view/<?php echo $row->contacto['id'];?>/<?php echo "$calendario->id" ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

             </table>
        </div>
    </div>
  
    
</div>

<div class="collapse" id="collapseAsistentes">
      <div class="card card-block">
        <div class="table-responsive">
             <h4><?= __('Asistentes') ?></h4>
                    <table class="table table-striped data-table">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Ver</th>
                        
                        </thead>
                    <tbody>

                        <?php foreach ($asistentes as $row):?>                            
                            <?php //var_dump($row->user['ficha_personales'][0]['id']) ?>
                            <tr>
                                <td><?php echo $row->user['id']  ?> </td>
                                <td><?php echo $row->user['name'].' '.$row->user['apellido1']  ?> </td>
                                <td><?php echo $row->user['username'] ?> </td>
                                <td><?php echo $row->user->ficha_personales [0]['telefono'] ?> </td>                                                     
                                <td><a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>fichaPersonales/view/<?php echo $row->user['ficha_personales'][0]['id']; ?>/<?php echo $calendario->id ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a></td>        
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    </table>
        </div>
      </div>
  </div>

</div>

<!-- Modal concretar reunion-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cancelar reunión</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" value="<?php echo $calendario->id ?>" name="idcalendario" id="idcalendario">
         <tr>
            <td><th scope="row"><?= __('Observación') ?></th></td>
            <td><textarea class="form-control" name="concretar" id="concretar" rows="4" cols="50"></textarea></td>
        </tr>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_guardar_reunion" name="btn_guardar_reunion">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal cancelar reunion -->
<div class="modal fade" id="myCancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cancelar reunión</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" value="<?php echo $calendario->id ?>" name="idcalendario" id="idcalendario">
        
          <tr>
            <td><th scope="row"><?= __('Observación') ?></th></td>
            <td><textarea class="form-control" name="cancelar" id="cancelar" rows="4" cols="50"></textarea></td>
            
        </tr>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_cancelar_reunion" name="btn_cancelar_reunion">Guardar</button>
      </div>
    </div>
  </div>
</div>

