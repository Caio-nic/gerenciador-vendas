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
                LEFT JOIN 
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
            LEFT JOIN
                clientes ON pedido.cliente_id = clientes.id
            LEFT JOIN
                produtos_pedidos ON pedido.id = produtos_pedidos.pedido_id
            LEFT JOIN
                produtos ON produtos_pedidos.produto_id = produtos.id
            WHERE 
                pedido.id = {$id}
                ";
            //nao entendi pq não esta funcionando o id
            // if ($id !== null) {
            //      $query .= "WHERE pede.id = {$id}";
            // }

            $detalhes = $this->Pedido->query($query);
            
            $this->set('detalhes', $detalhes);
            // debug($detalhes);
        }

        public function add() {
            //esses selects são para mostrar os dados nos inputs
            $this->set("clientes", $this->Pedido->query("
            select 
                nome 
            from 
                clientes"));
            $this->set("produtos", $this->Pedido->query("
            select 
                nome 
            from 
                produtos"));

            if ($this->request->is('post')) {
                // puxa os dados do formulário
                $data = $this->request->data;
                $clienteSelecionado = $data['Pedido']['cliente_id'];
                $produtosSelecionados = $data['Pedido']['ProdutosPedido'];
                $observacoes = $data['Pedido']['observacao'];
              
                // faz o pedido com esses dados
                $pedidoId = $this->inserirPedido($clienteSelecionado, $observacoes); 
                if ($pedidoId) {
                    foreach ($produtosSelecionados as $produtoId) {
                        $this->inserirProdutoPedido($pedidoId, $produtoId);
                    }
                }            
                return $this->redirect(['action' => 'add']);
            }
            // carrega dados para o dropdowns
                $this->loadModel('Cliente');
                $clientes = $this->Cliente->find('list', ['fields' => ['id', 'nome']]);
                $this->set(compact('clientes'));

                $this->loadModel('Produto');
                $produtos = $this->Produto->find('list', ['fields' => ['id', 'nome']]);
                $this->set(compact('produtos'));
            }

        // Método privado para inserir um pedido
        private function inserirPedido($clienteId, $observacao) {
            $this->loadModel('Pedido');
            $data = [
                'cliente_id' => $clienteId,
                'observacao' => $observacao,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
                ];
                
            $query = "INSERT INTO pedidos (cliente_id, observacao, created, modified) VALUES ";
            $query .= "(" . $clienteId . ", '" . $observacao . "', '" . $data['created'] . "', '" . $data['modified'] . "')";
          
            return $this->Pedido->query($query);
        }

        private function inserirProdutoPedido($pedidoId, $produtoId) {
            $this->loadModel('ProdutosPedido');
            $data = [
                'pedido_id' => $pedidoId,
                'produto_id' => $produtoId,
                'observacao' => "",
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
                ];
            $query = " INSERT INTO produtos_pedidos (pedido_id, produto_id, observacao) VALUES ";
            $query .= "(" . $pedidoId . ", '" . $produtoId . "', '" . "" . "', '" . $data['created'] . "', '" . $data['modified'] . "')";
            
            return $this->Pedido->query($query);                   
        }
}
