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

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

/*if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;*/

$cakeDescription = 'Mitani Holding';


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <!-- css -->
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('login') ?>
    <?= $this->Html->css('alerta') ?>

    <!-- script -->
    <?= $this->Html->script('jquery-3.2.1.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('alerta') ?>
    
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container well">
    <?= $this->Flash->render() ?>
      <form class="form-horizontal form-signin" method="POST" action="<?php echo APP_URI; ?>users/login" >
        <?= $this->Form->create() ?>
        <div class="form-group text-center">
            <?php
                echo $this->Html->image('logos-holding.png', array('alt' => 'MITANI HOLDING', 'width' => '500px')); 
            ?>
        </div>
        <div class="form-group">
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-danger btn-block" type="submit">Entrar <i class="glyphicon glyphicon-log-in"></i></button>
        </div>
      </form>
    </div> <!-- /container -->
</body>
</html>
