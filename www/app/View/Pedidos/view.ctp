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
              echo $this->Html->link('Pedidos', array('controller' => '', 'action' => '/'), array('id' => 'menu'));
              echo $this->Html->link('Create', array('controller' => 'pedidos', 'action' => '/add'), array('id' => 'menu'));
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
                            <?php echo $detalhe['pedido']['pedido_id'] ; ?>
                        </td>
                        <td>
                            <?php echo $detalhe['clientes']['cliente_nome'] ; ?>
                        </td>
                        <td>
                            <?php echo $detalhe['produtos']['produto_nome'] ; ?>
                        </td>
                        <td>
                            <?php echo $detalhe['pedido']['observacao'] ; ?>
                        </td>
                        <td>
                            <?php echo $detalhe['pedido']['created']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
 </div>
</body>