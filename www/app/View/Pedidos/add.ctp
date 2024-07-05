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
                    echo $this->Form->create('Post');
                    echo $this->Form->select(
                        'Cliente', 
                        Hash::combine($clientes, '{n}.clientes.nome', '{n}.clientes.nome', ),
                        [
                            'empty' => 'Selecione o cliente', 
                            'label' => 'Selecione o cliente',
                            'id' => 'cliente'
                        ]
                );
                    echo $this->Form->input('Produtos', [
                        'type' => 'select',
                        'multiple' => 'checkbox',
                        'options' => Hash::combine($produtos, '{n}.produtos.nome', '{n}.produtos.nome'),
                        'label' => 'Selecione o(s) produtos',
                        'hiddenField' => false,
                        'class' => 'produto',
                ]);
                    echo $this->Form->input('Observações', array('id'=>'obs','placeholder' => 'Observações', 'label' => false, 'rows'=>'2'));
                ?>
            </div>
            <?php
                echo $this->Html->link('Criar', array('controller' => 'pedidos', 'action' => '/view' ), array('id' => 'button'));
            ?>
    </div>
</div>