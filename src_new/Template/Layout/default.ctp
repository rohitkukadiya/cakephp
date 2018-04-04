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
$cakeDescription = '';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $this->Html->meta(
            'favicon.ico',
            '/favicon.ico',
            ['type' => 'icon']
        );
        ?>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>
            PSD to HTML & CSS services - PSD4HTML.COM
        </title>

        <!-- Bootstrap -->
        <?php
        echo $this->Html->css('/assets/css/bootstrap.min.css');
        echo $this->Html->css('/assets/css/font-awesome.min.css');
        echo $this->Html->css('/assets/css/custom.css');
        echo $this->Html->css('/assets/css/prettyCheckable.css');
        ?>
        <?php
        echo $this->Html->script(array('/assets/js/jquery.min.js'));
        echo $this->Html->script(array('/assets/js/bootstrap.min.js'));
        echo $this->Html->script(array('/assets/js/jquery.ddslick.min.js'));
        echo $this->Html->script(array('/assets/js/prettyCheckable.min.js'));
        echo $this->Html->script(array('/assets/js/custom.js'));
        ?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="">
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>

