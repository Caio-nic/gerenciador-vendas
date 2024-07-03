<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->fetch('css');
    	echo $this->Html->css('card');
	?>
</head>
<body>
<div class="container"> 
    <div class="card">
        <div class="headerCard">
            <?php
		    echo $this->Html->tag('h1','Detalhes');
            ?>
          <div class="menu">
              <?php
              echo $this->Html->link('Pedidos', array('controller' => '', 'action' => '/'));
              echo $this->Html->link('Detalhes', array('controller' => 'detalhes', 'action' => '/'));
              echo $this->Html->link('Create', array('controller' => 'creates', 'action' => '/'));
              ?>
          </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Coluna 1</th>
                    <th>Coluna 2</th>
                    <th>Coluna 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dado 1</td>
                    <td>Dado 2</td>
                    <td>Dado 3</td>
                </tr>
                <tr>
                    <td>Dado 4</td>
                    <td>Dado 5</td>
                    <td>Dado 6</td>
                </tr>
            </tbody>
        </table>
    </div>
 </div>
</body>