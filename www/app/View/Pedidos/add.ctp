<?php
echo $this->Html->css('index');
echo $this->Html->css('card');
?>
<div class='container'>
    <div class='card'>
    <div class="headerCard">
       <?php
            echo $this->Html->tag('h1','Faça o pedido');
        ?>
        <div class="menu">
              <?php
                echo $this->Html->link('Pedidos', array('controller' => '', 'action' => '/'));
              ?>
        </div>
    </div>
        <div class='inputsForm'>
            <div class='firstInputs'>
                <?php
                    echo $this->Form->create('Post');
                    echo $this->Form->select(
                    'Cliente', 
                    Hash::combine($clientes, '{n}.clientes.nome', '{n}.clientes.nome'),
                    [
                        'empty' => 'Selecione o cliente', 
                        'label' => 'Selecione o cliente',
                        'id' => 'cliente'
                    ]
                    );?>
                    <?php
                        echo $this->Form->select(
                            'Produtos', 
                            Hash::combine($produtos, '{n}.produtos.nome', '{n}.produtos.nome'),
                            [
                                'empty' => 'Selecione o produto',
                                'label' => 'Selecione o produto', 
                                'id' => 'produto'
                            ]
                        );
                    ?>
            </div>
                    <?php
                    echo $this->Form->input('Observações', array('id'=>'obs','placeholder' => 'Observações', 'label' => false, 'rows'=>'2'));
                    echo $this->Form->end(
                        'Criar', 
                        array('id'=>'button')) ;
                    ?>
        </div>
    </div>
</div>