<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Digis Controller
 *
 * @property \App\Model\Table\DigisTable $Digis
 */
class DigisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $digis = $this->paginate($this->Digis);

        $this->set(compact('digis'));
        $this->set('_serialize', ['digis']);
    }

    /**
     * View method
     *
     * @param string|null $id Digi id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $digi = $this->Digis->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('digi', $digi);
        $this->set('_serialize', ['digi']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $digi = $this->Digis->newEntity();
        if ($this->request->is('post')) {
            $digi = $this->Digis->patchEntity($digi, $this->request->getData());
            if ($this->Digis->save($digi)) {
                $this->Flash->success(__('The digi has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The digi could not be saved. Please, try again.'));
        }
        $users = $this->Digis->Users->find('list', ['limit' => 200]);
        $this->set(compact('digi', 'users'));
        $this->set('_serialize', ['digi']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Digi id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $digi = $this->Digis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $digi = $this->Digis->patchEntity($digi, $this->request->getData());
            if ($this->Digis->save($digi)) {
                $this->Flash->success(__('The digi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The digi could not be saved. Please, try again.'));
        }
        $users = $this->Digis->Users->find('list', ['limit' => 200]);
        $this->set(compact('digi', 'users'));
        $this->set('_serialize', ['digi']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Digi id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $digi = $this->Digis->get($id);
        if ($this->Digis->delete($digi)) {
            $this->Flash->success(__('The digi has been deleted.'));
        } else {
            $this->Flash->error(__('The digi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
