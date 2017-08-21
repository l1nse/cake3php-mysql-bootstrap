<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SubSistemas Controller
 *
 * @property \App\Model\Table\SubSistemasTable $SubSistemas
 */
class SubSistemasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sistemas']
        ];
        $subSistemas = $this->paginate($this->SubSistemas);

        $this->set(compact('subSistemas'));
        $this->set('_serialize', ['subSistemas']);
    }

    /**
     * View method
     *
     * @param string|null $id Sub Sistema id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subSistema = $this->SubSistemas->get($id, [
            'contain' => ['Sistemas', 'Tickets']
        ]);

        $this->set('subSistema', $subSistema);
        $this->set('_serialize', ['subSistema']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subSistema = $this->SubSistemas->newEntity();
        if ($this->request->is('post')) {
            $subSistema = $this->SubSistemas->patchEntity($subSistema, $this->request->getData());
            if ($this->SubSistemas->save($subSistema)) {
                $this->Flash->success(__('The sub sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sub sistema could not be saved. Please, try again.'));
        }
        $sistemas = $this->SubSistemas->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('subSistema', 'sistemas'));
        $this->set('_serialize', ['subSistema']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sub Sistema id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subSistema = $this->SubSistemas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subSistema = $this->SubSistemas->patchEntity($subSistema, $this->request->getData());
            if ($this->SubSistemas->save($subSistema)) {
                $this->Flash->success(__('The sub sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sub sistema could not be saved. Please, try again.'));
        }
        $sistemas = $this->SubSistemas->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('subSistema', 'sistemas'));
        $this->set('_serialize', ['subSistema']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sub Sistema id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subSistema = $this->SubSistemas->get($id);
        if ($this->SubSistemas->delete($subSistema)) {
            $this->Flash->success(__('The sub sistema has been deleted.'));
        } else {
            $this->Flash->error(__('The sub sistema could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
