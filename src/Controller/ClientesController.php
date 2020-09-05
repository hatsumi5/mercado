<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $clientes = $this->paginate($this->Clientes);

        return $this->result(null, null, 'clientes', $clientes, false);
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => [],
        ]);

        return $this->result(null, null, 'cliente', $cliente, false);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEmptyEntity();
        $isSuccess = null;
        $message = null;
        $changeData = false;

        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            $isSuccess = $this->Clientes->save($cliente);
            $message = $isSuccess ? 'The cliente has been saved.' : 'The cliente could not be saved. Please, try again.';
            $changeData = true;
        }
        return $this->result($message, $isSuccess, 'cliente', $cliente, $changeData);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => [],
        ]);
        $isSuccess = null;
        $message = null;
        $changeData = false;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            $isSuccess = $this->Clientes->save($cliente);
            $message = $isSuccess ? 'The cliente has been saved.' : 'The cliente could not be saved. Please, try again.';
            $changeData = true;
        }
        return $this->result($message, $isSuccess, 'cliente', $cliente, $changeData);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        $isSuccess = $this->Clientes->delete($cliente);
        $message = $isSuccess ? 'The cliente has been deleted.' : 'The cliente could not be deleted. Please, try again.';
        return $this->result($message, $isSuccess, 'cliente', $cliente, true);
    }
}
