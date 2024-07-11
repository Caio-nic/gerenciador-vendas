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

        public function add() {

            //ve se a req eh um post
            if ($this->request->is('post')) {

                // puxa os dados do formulário
                $data = $this->request->data;
                $clienteSelecionado = $data['Pedido']['cliente_id'];
                $produtosSelecionados = $data['Pedido']['produtos'];
                $observacoes = $data['Pedido']['observacao'];

                // faz o pedido   
                $pedidoId = $this->inserirPedido($clienteSelecionado, $observacoes);
   
                // se deu certo o pedido insere os produtos 
                if ($pedidoId) {
                    foreach ($produtosSelecionados as $produtoId) {
                        $this->inserirProdutoPedido($pedidoId, $produtoId);
                    }
                }            
                return $this->redirect(['action' => 'add']);
            }
            // Carregar dados para dropdowns
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

        $this->Pedido->create();
        if ($this->Pedido->save($data)) {
            return $this->Pedido->id;
        }

        return false;
    }

    private function inserirProdutoPedido($pedidoId, $produtoId) {
        $this->loadModel('ProdutosPedido');

        $data = [
            'pedido_id' => $pedidoId,
            'produto_id' => $produtoId,
            'vl_unitario' => 0,   // Valor unitário (ajuste conforme necessário)
            'qt_produto' => 1,    // Quantidade do produto (ajuste conforme necessário)
            'unidade' => '',      // Unidade do produto (ajuste conforme necessário)
            'observacao' => '',   // Observação (ajuste conforme necessário)
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
        ];

        $this->ProdutosPedido->create();
        $this->ProdutosPedido->save($data);
    }
}
