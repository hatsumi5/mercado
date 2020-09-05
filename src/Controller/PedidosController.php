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

        $this->set([
            'pedidos' => $pedidos,
            '_serialize' => ['pedidos']
        ]);
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

        return $this->execute(null, null, 'pedido', $pedido, false);
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
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            $isSuccess = $this->Pedidos->save($pedido);
            $message = $isSuccess ? 'The pedido has been saved.' : 'The pedido could not be saved. Please, try again.';
            $changeData = true;
            if ($isSuccess) {
                $this->loadModel('Clientes');
                $cliente = $this->Clientes->get($pedido->codigo_cliente, [
                    'contain' => [],
                ]);
                try {
                    Email::deliver($cliente->email, 'Pedido solicitado.', $message . "\n\n{print_r($pedido)}");
                } catch (\Throwable $th) {
                    $message .= '\n\nCan\'t send email.';
                }
            }
        }
        return $this->execute($message, $isSuccess, 'pedido', $pedido, $changeData);
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
        return $this->execute($message, $isSuccess, 'pedido', $pedido, $changeData);
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
        return $this->execute($message, $isSuccess, 'pedido', $pedido, true);
    }
}
