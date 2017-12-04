<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reemisions Controller
 *
 * @property \App\Model\Table\ReemisionsTable $Reemisions
 */
class ReemisionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $reemisions = $this->paginate($this->Reemisions);

        $this->set(compact('reemisions'));
        $this->set('_serialize', ['reemisions']);
    }

    /**
     * View method
     *
     * @param string|null $id Reemision id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reemision = $this->Reemisions->get($id, [
            'contain' => []
        ]);

        $this->set('reemision', $reemision);
        $this->set('_serialize', ['reemision']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reemision = $this->Reemisions->newEntity();
        if ($this->request->is('post')) {
            $reemision = $this->Reemisions->patchEntity($reemision, $this->request->getData());
            if ($this->Reemisions->save($reemision)) {
                $this->Flash->success(__('The reemision has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reemision could not be saved. Please, try again.'));
        }
        $this->set(compact('reemision'));
        $this->set('_serialize', ['reemision']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reemision id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reemision = $this->Reemisions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reemision = $this->Reemisions->patchEntity($reemision, $this->request->getData());
            if ($this->Reemisions->save($reemision)) {
                $this->Flash->success(__('The reemision has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reemision could not be saved. Please, try again.'));
        }
        $this->set(compact('reemision'));
        $this->set('_serialize', ['reemision']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reemision id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reemision = $this->Reemisions->get($id);
        if ($this->Reemisions->delete($reemision)) {
            $this->Flash->success(__('The reemision has been deleted.'));
        } else {
            $this->Flash->error(__('The reemision could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
