<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Mitani Holding';

$rs_user = $this->request->session()->read('Auth.User');

?>
<!DOCTYPE html>

<html>
<head>
  

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>: Intranet v 1.0
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- CSS -->
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('dashboard') ?>
    <?= $this->Html->css('jquery.dataTables.min') ?>
    <?= $this->Html->css('bootstrap-datetimepicker') ?>
    <?= $this->Html->css('select2.min') ?>
    <?= $this->Html->css('alerta') ?>
    <?= $this->Html->css('footer') ?>
    <?= $this->Html->css('wizard') ?>
    <?= $this->Html->css('fullcalendar.min') ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- script -->
    <?= $this->Html->script('jquery-3.2.1.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('jquery.dataTables.min') ?>
    <?= $this->Html->script('moment') ?>
    <?= $this->Html->script('bootstrap-datetimepicker') ?>
    <?= $this->Html->script('jquery.validate.min') ?>
    <?= $this->Html->script('es') ?>
    <?= $this->Html->script('select2.min') ?>
    <script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=6s3ro9rzcwpkg2xnywmkvqos646o0yz5b0tjvwf1mlfkk5x1'></script>
    <!--<?= $this->Html->script('tinymce/tinymce.min') ?>-->
    <?= $this->Html->script('jquery.Rut.min') ?>
    <?= $this->Html->script('funciones') ?>
    <?= $this->Html->script('alerta') ?>
    <?= $this->Html->script('fullcalendar') ?>
    <?= $this->Html->script('locale-all') ?>
    

    

    <!-- site url -->
    <script>var siteurl= '<?php echo APP_URI; ?>';</script>


    

</head>

                                                               

<body>

    <!-- header bootstrap -->

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <?php
                        //echo $this->Html->image('logos-holding.png', array('alt' => 'MITANI HOLDING', 'height' => '50px')); 
                    ?>
                    MITANI HOLDING 三谷 ホ－ルディング
                </a>
            </div>
    <div name="Menu"> 
      <?php
        $session = $this->request->session();
        $user_data = $session->read('Auth.User');
        //var_dump($user_data);
        
      ?>
      <div class="collapse navbar-collapse" id="main-menu">
      <ul class="nav navbar-nav navbar-right">  
        <?php 
            echo $loadPermisos;;
            
             switch ($estado) {

              //Almuerzo
              case '1':
                 $color = "#0000FF";                 
                break;
              //Banco
              case '2':
                 $color = "#492A01";                 
                break;
              //Despacho
              case '3':
                 $color = "#BF5200";                 
                break;
              //Oficina
              case '4':
                 $color = "#298A08";                 
                break; 
              //Otro 
              case '5':
                 $color = "#088A85";                 
                break; 
              //Retierado
              case '6':
                 $color = "#FB0004";              
                break; 
              //Vacaciones
              case '7':
                 $color = "#8B017F";              
                break; 
              //Visitas
              case '8':
                 $color = "#4A5776";              
                break; 
              
              default:
                $color = "#6E6E6E";
                break;
            }
        ?>
      
      <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i style="color: <?php echo $color ?>" class="glyphicon glyphicon-user "></i> <?php echo $rs_user[0]['username'] ?> <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo APP_URI; ?>users/cambiar-clave/"><i " class="glyphicon glyphicon glyphicon-refresh"></i> Cambiar Password</a></li>
                        <li  ><a href="javascript:abrirModal()"><i class="glyphicon glyphicon-thumbs-up"  ></i> Cambiar estado</a></li>
                        <li><a href="<?php echo APP_URI; ?>users/logout/"><i class="glyphicon glyphicon-off"></i> Cerrar sesión</a></li>
                        <ul>
                      </ul>
                    </li>  
        </ul>


    </nav>
    
   
    <div class="container-fluid">
    <!-- msj alerta --> 
     <?= $this->Flash->render() ?>
        <div class="row">
            
            <div class="col-md-12 main">
                <div class="container-fluid">
                    <div class="row body_container">
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal cambiar estado -->
        <div class="modal fade" id="modalEstado2" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cambiar estado</h4>
              </div>
              <div class="modal-body" style="min-height: 300px;">
                <div class="form-group"> 
                <tr>
                      <!--<td><h4>Estado : </h4></td>-->
                      <td>
                        <label for(active)> Estado </label>
                        <select class="form-control" required="required" id="active" name="active" style="width: 100%">
                          <?php 
                            $estoy1 = null;
                            $estoy2 = null;
                            $estoy3 = null;
                            $estoy4 = null;
                            $estoy5 = null;
                            $estoy6 = null;
                            $estoy7 = null;
                            $estoy8 = null;
                            $estoy9 = null;
                            $estoy10 = null;

                            switch ($estado) {
                              case '1':
                                  $estoy1 = 'selected="selected"';
                                break;
                                case '2':
                                  $estoy2 = 'selected="selected"';
                                break;

                                case '3':
                                  $estoy3 = 'selected="selected"';
                                break;

                                case '4':
                                  $estoy4 = 'selected="selected"';
                                break;

                                case '5':
                                  $estoy5 = 'selected="selected"';
                                break;

                                case '6':
                                  $estoy6 = 'selected="selected"';
                                break;

                                case '7':
                                  $estoy7 = 'selected="selected"';
                                break;

                                case '8':
                                  $estoy8 = 'selected="selected"';
                                break;
                                case '9':
                                  $estoy9 = 'selected="selected"';
                                break;
                                case '10':
                                  $estoy10 = 'selected="selected"';
                                break;
                            }
                          ?>
                          <option value="1" <?php echo $estoy1;?> > Almuerzo</option>
                          <option value="2" <?php echo $estoy2;?> > Banco</option>
                          <option value="9" <?php echo $estoy9;?> > Bodega</option>
                          <option value="3" <?php echo $estoy3;?> > Despacho</option>
                          <option value="4" <?php echo $estoy4;?> > Oficina</option>
                          <option value="5" <?php echo $estoy5;?> > Otro</option>
                          <option value="6" <?php echo $estoy6;?> > Retirado</option>
                          <option value="10" <?php echo $estoy10;?> > Reunión</option>
                          <option value="7" <?php echo $estoy7;?> > Vacaciones</option>
                          <option value="8" <?php echo $estoy8;?> > Visita</option>
                        </select>  
                      </td>
               </tr>

               <tr>
                  <label for="observacion""> Observación </label>
                  <input type = "text" id="observacion" name="observacion" class="form-control" >
               </tr>
               <tr>
                  <label for = "date_time"> Fecha y hora salida </label>
                  <input class="form-control datetimeCalendar" type="text"  id="date_salida" name="date_time" >
               </tr>
               <tr>
                  <label for = "date_time"> Fecha y hora entrada </label>
                  <input class="form-control datetimeCalendar" type="text"  id="date_vuelta" name="date_time" >
               </tr>
               
               </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar_estado">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!--<footer>
        <center><?php echo $this->Html->image('logos-holding.png', array('alt' => 'MITANI HOLDING', 'height' => '50px'));  ?></center>
    </footer>-->
    <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--footer start from here-->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 footerleft center ">
            <center>
                <div class="logofooter"> <?php echo $this->Html->image('logos-holding.png', array('alt' => 'MITANI HOLDING', 'width' => '380px'));  ?></div>
                
                <p><i class="fa fa-map-pin"></i> Luis Thayer Ojeda #0191, Piso 8, Providencia, Santiago, Chile</p>
                <p><i class="fa fa-phone"></i> Teléfono: +562 2598 8000</p>
                <p><i class="fa fa-envelope"></i> E-mail : informatica@mitani-holding.com</p>
            </center>
          </div>
         
        </div>
      </div>
    </footer>
    <!--footer start from here-->

    <div class="copyright">
      <div class="container">
        <div class="col-md-6">
          <p>© 2017 - Copyright Mitani Holding</p>
        </div>
        <div class="col-md-6">
          <ul class="bottom_ul">
          
          </ul>
        </div>
      </div>
    </div>

</body>


</html>

 
</div>




