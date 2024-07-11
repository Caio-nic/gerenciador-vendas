<?php
echo $this->Html->css('index');
echo $this->Html->css('card');
?>
<div class='container'>
    <div class='card'>
    <div class="headerCard">
       <?php
            echo $this->Html->tag('h1','Criar pedido');
        ?>
        <div class="menu">
              <?php
              echo $this->Html->link('Pedidos', array('controller' => '', 'action' => '/'), array('id' => 'menu'));
              echo $this->Html->link('Create', array('controller' => 'pedidos', 'action' => '/add'), array('id' => 'menu'));
              ?>        
          </div>
    </div>
        <div class='form'>
            <div class='inputs'>
                <?php
                    echo $this->Form->create('Pedido', ['url' => ['controller' => 'pedidos', 'action' => 'add']]);
                    echo $this->Form->input('cliente_id', 
                     [
                         'id' => 'cliente',
                         'options' => $clientes,
                         'label' => 'Selecione o cliente'
                    ]); 
                    echo $this->Form->input('ProdutosPedido',
                    [
                        'class' => 'produto',
                        'type' => 'select',
                        'label' => 'Selecione o(s) produtos',
                        'multiple' => 'checkbox',
                        'options' => $produtos, 
                        'hiddenField' => false
                    ]); 

                    echo $this->Form->input('observacao', 
                    array(
                        'id'=>'obs',
                        'placeholder' => 'Observação', 
                        'rows'=>'2',
                        'label' => false 
                    ));
                    echo $this->Form->button('Criar',array('id' => 'button'));
                    echo $this->Form->end();
                ?>
            </div>
    </div>
</div>