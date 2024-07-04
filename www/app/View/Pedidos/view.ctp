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
              echo $this->Html->link('Create', array('controller' => 'creates', 'action' => '/'));
              ?>        
          </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Id do Pedido</th>
                    <th>Comprador</th>
                    <th>Produtos</th>
                    <th>Data de Emissão</th>
                    <th>Observações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalhes as $detalhe) : ?>
                    <tr>
                    <td>
                        <?php echo $detalhe['pedidos']['id']; ?>
                    </td>
                    <td>
                        <?php echo $detalhe['clientes']['nome']; ?>
                    </td>
                    <td>
                        <?php echo $detalhe['produtos']['nome']; ?>
                    </td>
                    <td>
                        <?php echo $detalhe['pedidos']['created']; ?>
                    </td>
                    <td>
                        <?php echo $detalhe['pedidos']['observacao']; ?>
                    </td>
                    </tr>
                <?php endforeach; ?>
                    <?php echo ($detalhe['pedidos']['id']); ?>
                    <?php echo ($detalhe['clientes']['nome']); ?>
                    <?php echo ($detalhe['produtos']['nome']); ?> 
                    <?php echo ($detalhe['pedidos']['created']); ?> 
                    <?php echo ($detalhe['pedidos']['observacao']); ?> 
            </tbody>
        </table>
    </div>
 </div>
</body>