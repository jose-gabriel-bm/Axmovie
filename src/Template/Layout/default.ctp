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

<table class="title-area large-12 medium-10 columns">
    <tr>
        <td>
            <h4><a>
                <?php echo $this->Html->link(__(' Axmovie '), 
                ['controller' => 'Users', 'action' => 'index', '_full' => true]);?>
            </a></h4> 
        </td>
        <td style="text-align: right;">
             <h4><a> <?php echo $usuarioLogado?> </a></h4> 
        </td>
    </tr>
</table>
</nav>
   
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
