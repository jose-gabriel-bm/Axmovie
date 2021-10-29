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
