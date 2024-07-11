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
                    echo $this->Form->create('Pedido'); 
                 echo $this->Form->input('Selecione o cliente', 
                     [
                         'id' => 'cliente',
                        'options' => $clientes,
                         'label' => 'Selecione o cliente'

                    ]); 
                 echo $this->Form->input('Produtos',
                  [
                    'type' => 'select',
                    'options' => $produtos, 
                    'multiple' => 'checkbox',
                    'label' => 'Selecione o(s) produtos',
                    'hiddenField' => false,
                    'class' => 'produto',
                    ]); 

                    echo $this->Form->input('observacao ', 
                    array(
                        'id'=>'obs',
                        'placeholder' => 'Observação', 
                        'label' => false, 
                        'rows'=>'2'
                    ));
                ?>
            </div>
            <?php
                echo $this->Html->link('Criar', array('controller' => 'pedidos', 'action' => '/view' ), array('id' => 'button'));

            ?>
    </div>
</div>