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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title><?= $this->fetch('title') ?></title>
</head>
<body>
    <div class="page">
        <div class="page-inside">
            <header style="background-color: black; height: 63px;">
                <div class="container">
                    <h1 style="padding: 0px 20px 20px 20px;">
                        <img src="http://190.151.80.3/intranet/img/logo_black.jpg" alt="MITANI HOLDING" style="height: 80px;">
                    </h1>
                </div>
            </header>
            <br><br>
            <?= $this->Flash->render() ?>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <footer>
        <p>Saludos cordiales,<br>Equipo MITANI HOLDING</p>
    </footer>
</body>
</html>
