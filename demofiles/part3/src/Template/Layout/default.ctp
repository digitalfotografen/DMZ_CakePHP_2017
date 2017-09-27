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

$cakeDescription = __('Sverigeresan - a demo project for DatorMagazin');
$this->Html->script('//code.jquery.com/jquery.min.js', ['block' => true]);
$this->Html->script('topscore', ['block' => true]);
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a href="/"><?= __('Start') ?></a></li>
                <li><?= $this->AuthLink->link(__('Add visit'), ['controller' => 'Visits', 'action' => 'add']); ?></li>
                <?= $this->AuthLink->isAuthorized(['controller' => 'Visits', 'action' => 'add']) ? 
                    '<li><a href="/logout">' . __('Logout') .'</a></li>' : 
                    '<li><a href="/login">' . __('Login') .'</a></li>';
                ?>
            </ul>
        </div>
    </nav>
    <header class="row">
        <div class="header-image"><?= __('Sverigeresan - a DatorMagazin demo project') ?></div>
        <div class="header-title">
            <h1><?= __('Top 10 tourists') ?></h1>
            <div id="top10"></div>
        </div>
    </header>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
