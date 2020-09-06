<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $produtos = $this->paginate($this->Produtos);

        return $this->result(null, null, 'produtos', $produtos, false);
    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => [],
        ]);

        return $this->result(null, null, 'produto', $produto, false);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produto = $this->Produtos->newEmptyEntity();
        $isSuccess = null;
        $message = null;
        $changeData = false;

        if ($this->request->is('post')) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->getData());
            $isSuccess = $this->Produtos->save($produto);
            $message = $isSuccess ? 'The produto has been saved.' : 'The produto could not be saved. Please, try again.';
            $changeData = true;
        }
        return $this->result($message, $isSuccess, 'produto', $produto, $changeData);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => [],
        ]);
        $isSuccess = null;
        $message = null;
        $changeData = false;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->getData());
            $isSuccess = $this->Produtos->save($produto);
            $message = $isSuccess ? 'The produto has been saved.' : 'The produto could not be saved. Please, try again.';
            $changeData = true;
        }
        return $this->result($message, $isSuccess, 'produto', $produto, $changeData);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        $isSuccess = $this->Produtos->delete($produto);
        $message = $isSuccess ? 'The produto has been deleted.' : 'The produto could not be deleted. Please, try again.';
        return $this->result($message, $isSuccess, 'produto', $produto, true);
    }
}
