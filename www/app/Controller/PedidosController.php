<?php

class PedidosController extends AppController {
    public $uses = array('Pedido'); // Carrega o model Contact
    
public function index() {
    // $this->set('pedidos', $this->Pedido->find('all'));
    
    // $consulta = "SELECT id, created FROM pedidos inner join clientes on nome";
    // Consulta SQL personalizada com JOIN
    
    $this->loadModel('Pedidos'); 
    $this->loadModel('Clientes');
     
         $query = "
            SELECT 
                pedidos.id,
                pedidos.created,
                clientes.nome
            FROM 
                pedidos
            INNER JOIN 
                clientes ON pedidos.cliente_id = nome
        ";
        
        $results = $this->Pedidos->query($query);

        // Passar os resultados para a view
        $this->set('results', $results);
        // Exemplo de debug no controller
        debug($results); // Exibe os resultados da consulta SQL no console ou na página

    }   
}

