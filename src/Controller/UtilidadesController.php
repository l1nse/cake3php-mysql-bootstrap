<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Utilidades Controller
 *
 * @property \App\Model\Table\UtilidadesTable $Utilidades
 */
class UtilidadesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FichaNegocios']
        ];
        $utilidades = $this->paginate($this->Utilidades);

        $this->set(compact('utilidades'));
        $this->set('_serialize', ['utilidades']);
    }

    /**
     * View method
     *
     * @param string|null $id Utilidade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $utilidade = $this->Utilidades->get($id, [
            'contain' => ['FichaNegocios']
        ]);

        $this->set('utilidade', $utilidade);
        $this->set('_serialize', ['utilidade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $utilidade = $this->Utilidades->newEntity();
        if ($this->request->is('post')) {
            $utilidade = $this->Utilidades->patchEntity($utilidade, $this->request->getData());
            if ($this->Utilidades->save($utilidade)) {
                $this->Flash->success(__('The utilidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utilidade could not be saved. Please, try again.'));
        }
        $fichaNegocios = $this->Utilidades->FichaNegocios->find('list', ['limit' => 200]);
        $this->set(compact('utilidade', 'fichaNegocios'));
        $this->set('_serialize', ['utilidade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Utilidade id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $utilidade = $this->Utilidades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $utilidade = $this->Utilidades->patchEntity($utilidade, $this->request->getData());
            if ($this->Utilidades->save($utilidade)) {
                $this->Flash->success(__('The utilidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utilidade could not be saved. Please, try again.'));
        }
        $fichaNegocios = $this->Utilidades->FichaNegocios->find('list', ['limit' => 200]);
        $this->set(compact('utilidade', 'fichaNegocios'));
        $this->set('_serialize', ['utilidade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Utilidade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $utilidade = $this->Utilidades->get($id);
        if ($this->Utilidades->delete($utilidade)) {
            $this->Flash->success(__('The utilidade has been deleted.'));
        } else {
            $this->Flash->error(__('The utilidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
