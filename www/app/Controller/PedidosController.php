<?php

class PedidosController extends AppController {
    
    public function index() {
        $this->loadModel('Pedidos');      
        // $this->set('pedidos', $this->Pedido->find('all'));  
            $query = "
                SELECT 
                    pedidos.id,
                    pedidos.created,
                    clientes.nome
                FROM 
                    pedidos
                INNER JOIN 
                    clientes ON pedidos.cliente_id = clientes.id
            ";
            $pedidos = $this->Pedidos->query($query);

            // Passar os resultados para a view
            $this->set('pedidos', $pedidos);

            debug($pedidos);
        }   
        // Detalhes do pedido ( exibe os produtos selecionados, OK
        // e um resumo de quem pediu, ok
        //quando pediu, 
        // qual o id, OK se for id do pedido
        //e as observações )
    public function view() {
        $this->loadModel('Pedidos');      
        $query = "
            SELECT
                produtos_pedidos.pedido_id,
                produtos_pedidos.produto_id,
                produtos.id,
                produtos.nome
            FROM
                produtos_pedidos
            INNER JOIN
                produtos ON produtos_pedidos.produto_id = produtos.id
                ";
        $query = "
            SELECT
                pedidos.cliente_id,
                clientes.id,
                clientes.nome,
                pedidos.created,
                pedidos.observacao
            FROM
                pedidos
            INNER JOIN
                clientes ON pedidos.cliente_id = clientes.id
                ";

                $detalhes = $this->Pedidos->query($query);
                // clientes.id
                // clientes.nome
            
            // Passar os resultados para a view
            $this->set('detalhes', $detalhes);
            debug($detalhes);
        }
    }

