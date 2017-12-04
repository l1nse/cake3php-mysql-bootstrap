<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Gestiones Controller
 *
 * @property \App\Model\Table\GestionesTable $Gestiones
 */
class GestionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tickets']
        ];
        $gestiones = $this->paginate($this->Gestiones);

        $this->set(compact('gestiones'));
        $this->set('_serialize', ['gestiones']);
    }

    /**
     * View method
     *
     * @param string|null $id Gestione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gestione = $this->Gestiones->get($id, [
            'contain' => ['Tickets', 'GestioneArchives']
        ]);

        $this->set('gestione', $gestione);
        $this->set('_serialize', ['gestione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        var_dump("estoy en el add"); die;
        $gestione = $this->Gestiones->newEntity();
        if ($this->request->is('post')) {

            $gestione = $this->Gestiones->patchEntity($gestione, $this->request->getData());

            if ($this->Gestiones->save($gestione)) {
                $this->Flash->success(__('The gestione has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The gestione could not be saved. Please, try again.'));
        }
        $tickets = $this->Gestiones->Tickets->find('list', ['limit' => 200]);
        $this->set(compact('gestione', 'tickets'));
        $this->set('_serialize', ['gestione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gestione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gestione = $this->Gestiones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $gestione = $this->Gestiones->patchEntity($gestione, $this->request->getData());
            if ($this->Gestiones->save($gestione)) {
                $this->Flash->success(__('The gestione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gestione could not be saved. Please, try again.'));
        }
        $tickets = $this->Gestiones->Tickets->find('list', ['limit' => 200]);
        $this->set(compact('gestione', 'tickets'));
        $this->set('_serialize', ['gestione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gestione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gestione = $this->Gestiones->get($id);
        if ($this->Gestiones->delete($gestione)) {
            $this->Flash->success(__('The gestione has been deleted.'));
        } else {
            $this->Flash->error(__('The gestione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
