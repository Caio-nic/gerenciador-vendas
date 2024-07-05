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
                    clientes ON pedidos.cliente_id = clientes.id";
            $pedidos = $this->Pedidos->query($query);
            $this->set('pedidos', $pedidos);

            // debug($pedidos);    
        }   
        
    public function view($id=null) {
        $query = "
            SELECT
                pedido.id AS pedido_id,
                pedido.created,
                pedido.observacao,
                clientes.nome AS cliente_nome,
                pedido.id AS pedido_id,
                produtos.nome AS produto_nome
            FROM
                pedidos as pedido
            INNER JOIN
                clientes ON pedido.cliente_id = clientes.id
            INNER JOIN
                produtos_pedidos ON pedido.id = produtos_pedidos.pedido_id
            INNER JOIN
                produtos ON produtos_pedidos.produto_id = produtos.id
                ";
                // WHERE 
                //     pedido.id = {$id}
            //nao entendi pq não esta funcionando o id
            // if ($id !== null) {
            //      $query .= "WHERE pede.id = {$id}";
            // }

            $detalhes = $this->Pedido->query($query, array (
                'conditions' => array('Pedido.id' => $id)
            )
        
        );
            $this->set('detalhes', $detalhes);

            // debug($detalhes);
        }
        public function add(){
            $this->set("clientes", $this->Pedido->query("select nome from clientes"));
            $this->set("produtos", $this->Pedido->query("select nome from produtos"));
        }
    }

