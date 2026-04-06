<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Sistema Meteorológico - UPDS';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>UPDS</span> Meteorología</a>
        </div>
        <div class="top-nav-links">
            <?php if (isset($currentUser) && $currentUser): ?>
                <span style="font-weight: bold; margin-right: 20px; color: #d33c43;">
                    👤 Hola, <?= h($currentUser->nombre) ?> <?= h($currentUser->apellido) ?>
                </span>
                
                <?= $this->Html->link(__('Climas'), ['controller' => 'LecturasMeteorologicas', 'action' => 'index']) ?>
                <?= $this->Html->link(__('Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?>
                
                <?= $this->Html->link(__('Cerrar Sesión'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'button', 'style' => 'background-color: #d33c43; color: white; margin-left: 10px;']) ?>
            
            <?php else: ?>
                <?= $this->Html->link(__('Iniciar Sesión'), ['controller' => 'Users', 'action' => 'login']) ?>
                <?= $this->Html->link(__('Registrarse'), ['controller' => 'Users', 'action' => 'add']) ?>
            <?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
        <div style="text-align: center; padding: 20px;">
            <p>&copy; <?= date('Y') ?> - Proyecto Final Tecnología Web II</p>
        </div>
    </footer>
</body>
</html>