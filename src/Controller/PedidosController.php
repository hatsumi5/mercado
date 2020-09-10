<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Email;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $pedidos = $this->paginate($this->Pedidos);

        return $this->result(null, null, 'pedidos', $pedidos, false);
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => [],
        ]);

        return $this->result(null, null, 'pedido', $pedido, false);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedido = $this->Pedidos->newEmptyEntity();
        $isSuccess = null;
        $message = null;
        $changeData = false;

        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData(), ['associated' => ['Produtos.Pedidos']]);
            $pedido->data_pedido = date('Y-m-d H:i:s');
            $isSuccess = $this->Pedidos->save($pedido, ['associated' => 'Produtos._joinData']);
            $message = $isSuccess ? 'The pedido has been saved.' : 'The pedido could not be saved. Please, try again.';
            $changeData = true;
            if ($isSuccess) {
                if ($this->sendmail($pedido->codigo_pedido)) {
                    $message .= 'Send email.';
                } else {
                    $message .= 'Can\'t send email.';
                }
            }
        } else {
            $this->loadModel('Produtos');
            $this->loadModel('Clientes');
            $produtos = $this->paginate($this->Produtos);
            $clientes = $this->paginate($this->Clientes);
            $this->set(compact('produtos', 'clientes'));
        }
        return $this->result($message, $isSuccess, 'pedido', $pedido, $changeData);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => [],
        ]);
        $isSuccess = null;
        $message = null;
        $changeData = false;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            $isSuccess = $this->Pedidos->save($pedido);
            $message = $isSuccess ? 'The pedido has been saved.' : 'The pedido could not be saved. Please, try again.';
            $changeData = true;
        }
        return $this->result($message, $isSuccess, 'pedido', $pedido, $changeData);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        $isSuccess = $this->Pedidos->delete($pedido);
        $message = $isSuccess ? 'The pedido has been deleted.' : 'The pedido could not be deleted. Please, try again.';
        return $this->result($message, $isSuccess, 'pedido', $pedido, true);
    }

    public function sendmail($id = null)
    {
        try {
            $message = 'Pedido solicitado.';
            $message .= $this->allData($id, $email);
            Email::deliver($email, 'Pedido solicitado.', $message);
        } catch (\Throwable $th) {
            return 'Não foi possível enviar.' . $th->getMessage();
        }
    }

    public function report($id = null)
    {
    }

    private function allData($codigo_pedido, &$email = null)
    {
        /*
        -- dados do pedido e do cliente
        select pe.codigo_pedido, pe.data_pedido, pe.observacao, pe.forma_pagamento,
        cl.codigo_cliente, cl.nome cliente, cl.cpf, cl.sexo, cl.email
        from pedido pe
        inner join cliente cl using (codigo_cliente)
        where (pe.codigo_pedido = 1);

        -- valor total do pedido
        select count(*) as total_valor_pedido
        from pedido
        inner join pedido_produto using (codigo_pedido)
        inner join produto using (codigo_produto)
        where (codigo_pedido = 1);

        -- total do valor por produto
        select produto.nome, sum(valor * quantidade) as total_valor
        from pedido
        inner join pedido_produto using (codigo_pedido)
        inner join produto using (codigo_produto)
        where (codigo_pedido = 1)
        group by produto.codigo_produto;
        */
        // ainda não foi implementado corretamente.
        $pedido = $this->Pedidos->get($codigo_pedido, [
            'contain' => [],
        ]);
        $this->loadModel('Clientes');
        $cliente = $this->Clientes->get($pedido->codigo_cliente, [
            'contain' => [],
        ]);
        $email = $cliente->email;
        $this->loadModel('Produtos');
        $produto = $this->Produtos->get($pedido->codigo_produto, [
            'contain' => [],
        ]);
        $message = "<pre>";
        $message .= print_r($pedido, true);
        $message .= print_r($cliente, true);
        $message .= print_r($cliente, true);
        $message .= "</pre>";
        return $message;
    }
}
