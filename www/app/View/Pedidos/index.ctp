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
		    echo $this->Html->tag('h1','Lista de Pedidos');
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
                    <th>Id</th>
                    <th>Comprador</th>
                    <th>Data de Emissão</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result) : ?>
                    <tr>
                        <td>
                            <?php echo $result['pedidos']['id']; ?>
                        </td>
                        <td>
                            <?php echo $result['clientes']['nome']; ?>
                        </td> 
                        <td>
                            <?php echo $result['pedidos']['created']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>    
            </tbody>
        </table>
    </div>
 </div>
</body>