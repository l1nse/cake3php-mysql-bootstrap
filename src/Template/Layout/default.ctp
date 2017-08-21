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
                        echo $this->Html->image('logo_black.jpg', array('alt' => 'MITANI HOLDING', 'height' => '50px')); 
                    ?>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <?php
                    if($rs_user[0]['role']=='asistente'){
                ?>
                <!--<li><a href="<?php echo APP_URI; ?>tickets/index/""><i class="glyphicon glyphicon-comment"></i> Tickets</a></li>-->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-globe"></i> Intranet Mitani <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo APP_URI; ?>entidades/index/"><i class="glyphicon glyphicon-list-alt"></i> Listado Maestro Clientes</a></li>
                    <li><a href="<?php echo APP_URI; ?>fichaPersonales/anexo/"><i class="glyphicon glyphicon-list-alt"></i> Anexos </a></li>                  
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-comment"></i> Tickets <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo APP_URI; ?>tickets/index/"><i class="glyphicon glyphicon-pushpin"></i> Creados</a></li>
                    <li><a href="<?php echo APP_URI; ?>tickets/asignado/"><i class="glyphicon glyphicon-tags"></i> Asignados</a></li>
                    <li><a href="<?php echo APP_URI; ?>tickets/listado/"><i class="glyphicon glyphicon-tasks"></i> Informe tickets</a></li>
                    <li><a href="<?php echo APP_URI; ?>tickets/home/"><i class="glyphicon glyphicon-indent-right"></i> Resumen</a></li>
                    <li><a href="<?php echo APP_URI; ?>tickets/list-user-ticket/"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i> Tickets por usuarios</a></li>
                  </ul>
                </li>
                <?php } ?>
                <?php
                    if($rs_user[0]['role']=='admin' || $rs_user[0]['role']=='gerente'){
                ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-globe"></i> Intranet Mitani <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo APP_URI; ?>entidades/index/"><i class="glyphicon glyphicon-list-alt"></i> Listado Maestro Clientes</a></li>
                    <li><a href="<?php echo APP_URI; ?>fichaPersonales/anexo/"><i class="glyphicon glyphicon-list-alt"></i> Anexos </a></li>                  
                    <li><a href="<?php echo APP_URI; ?>entidades/activar-empresas/"><i class="glyphicon glyphicon-ok-sign"></i> Aprobación Listado Maestro Clientes</a></li>
                    <li><a href="<?php echo APP_URI; ?>contactos/activar-contacto/"><i class="glyphicon glyphicon-ok-circle"></i> Aprobación Contactos</a></li>
                    
                  </ul>
                </li>
                /li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-comment"></i> Tickets <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo APP_URI; ?>tickets/index/"><i class="glyphicon glyphicon-pushpin"></i> Creados</a></li>
                    <li><a href="<?php echo APP_URI; ?>tickets/asignado/"><i class="glyphicon glyphicon-tags"></i> Asignados</a></li>
                    <li><a href="<?php echo APP_URI; ?>tickets/listado/"><i class="glyphicon glyphicon-tasks"></i> Informe tickets</a></li>
                    <li><a href="<?php echo APP_URI; ?>tickets/home/"><i class="glyphicon glyphicon-indent-right"></i> Resumen</a></li>
                    <li><a href="<?php echo APP_URI; ?>tickets/list-user-ticket/"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i> Tickets por usuarios</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-tasks"></i> Informe <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo APP_URI; ?>bsps/index/"><i class="glyphicon glyphicon-plane"></i> Consolidación BSP</a></li>
                    
                  </ul>
                </li>
                
                <?php 
                }
                    
                    //var_dump($rs_user); die;

                    if($rs_user[0]['role']=='admin'){
                ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i> Mantenedores <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo APP_URI; ?>users/index/"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
                    <li><a href="<?php echo APP_URI; ?>fichaPersonales/index/"><i class="glyphicon glyphicon-list-alt"></i> Ficha Personal</a></li>
                    <li><a href="<?php echo APP_URI; ?>areas/index/"><i class="glyphicon glyphicon-th-large"></i> Áreas</a></li>
                    <li><a href="<?php echo APP_URI; ?>jefe-areas/index"><i class="glyphicon glyphicon-th-large"></i> Jefe área</a></li>
                    <li><a href="<?php echo APP_URI; ?>cargos/index/"><i class="glyphicon glyphicon glyphicon-th"></i> Cargos</a></li>
                    <li><a href="<?php echo APP_URI; ?>empresas/index/"><i class="glyphicon glyphicon-tower"></i> Empresas</a></li>
                    <li><a href="<?php echo APP_URI; ?>sistemas/index/"><i class="glyphicon glyphicon-link"></i> Sistemas</a></li>
                  </ul>
                </li>
                <?php
                    }
                ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?php echo $rs_user[0]['username'] ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo APP_URI; ?>users/cambiar-clave/"><i class="glyphicon glyphicon glyphicon-refresh"></i> Cambiar Password</a></li>
                    <li><a href="<?php echo APP_URI; ?>users/logout/"><i class="glyphicon glyphicon-off"></i> Cerrar sesión</a></li>
                  </ul>
                </li>
              </ul>
            </div>
        </div>
    </nav>
    
   
    <div class="container-fluid">
    <!-- msj alerta -->
     <?= $this->Flash->render() ?>
        <div class="row">
            
            <div class="col-md-12 main">
                <div class="container-fluid">
                    <div class="row">
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
