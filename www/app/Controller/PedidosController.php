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
            $this->set('pedidos', $pedidos);

            debug($pedidos);    
        }   
        
    public function view($id=null) {
        $this->loadModel('Pedido');      
        $query = "
            (SELECT
                pedidos.id AS pedido_id,
                pedidos.created,
                pedidos.observacao,
                clientes.nome AS cliente_nome,
                NULL AS produto_nome
            FROM
                pedidos
            INNER JOIN
                clientes ON pedidos.cliente_id = clientes.id)
            UNION ALL
            (SELECT
                pedidos.id AS pedido_id,
                produtos.nome AS produto_nome,
                NULL AS created,
                NULL AS observacao,
                NULL AS cliente_nome
            FROM
                pedidos
            INNER JOIN
                produtos_pedidos ON pedidos.id = produtos_pedidos.pedido_id
            INNER JOIN
                produtos ON produtos_pedidos.produto_id = produtos.id) 
                ";

            if ($id !== null) {
                 $query .= "WHERE pedidos.id = {$id}";
            }

            $detalhes = $this->Pedido->query($query);
            $this->set('detalhes', $detalhes);

            debug($detalhes);
        }
        public function add(){
            $this->set("clientes", $this->Pedido->query("select nome from clientes"));
            $this->set("produtos", $this->Pedido->query("select nome from produtos"));
        }
    }

