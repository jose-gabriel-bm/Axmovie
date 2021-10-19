<?php
$cakeDescription = 'Axmovie';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-12 medium-10 columns">
            <!-- <li class="name">
                <h3><a href=""><?= $this->fetch('title') ?></a></h3>
                
            </li>  -->
            <li>
                <h3><a>
                <?php echo $this->Html->link(__(' Axmovie '), 
                ['controller' => 'Usuarios', 'action' => 'index', '_full' => true]);?>
                </a></h3>
            </li>
           
            
        </ul>
        <div class="top-bar-section">
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
