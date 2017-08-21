<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoItems Controller
 *
 * @property \App\Model\Table\TipoItemsTable $TipoItems
 */
class TipoItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tipoItems = $this->paginate($this->TipoItems);

        $this->set(compact('tipoItems'));
        $this->set('_serialize', ['tipoItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoItem = $this->TipoItems->get($id, [
            'contain' => ['ItemCotizaciones']
        ]);

        $this->set('tipoItem', $tipoItem);
        $this->set('_serialize', ['tipoItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoItem = $this->TipoItems->newEntity();
        if ($this->request->is('post')) {
            $tipoItem = $this->TipoItems->patchEntity($tipoItem, $this->request->getData());
            if ($this->TipoItems->save($tipoItem)) {
                $this->Flash->success(__('The tipo item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo item could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoItem'));
        $this->set('_serialize', ['tipoItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoItem = $this->TipoItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoItem = $this->TipoItems->patchEntity($tipoItem, $this->request->getData());
            if ($this->TipoItems->save($tipoItem)) {
                $this->Flash->success(__('The tipo item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo item could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoItem'));
        $this->set('_serialize', ['tipoItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoItem = $this->TipoItems->get($id);
        if ($this->TipoItems->delete($tipoItem)) {
            $this->Flash->success(__('The tipo item has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
