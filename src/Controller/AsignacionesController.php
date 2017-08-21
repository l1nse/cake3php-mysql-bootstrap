<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Asignaciones Controller
 *
 * @property \App\Model\Table\AsignacionesTable $Asignaciones
 */
class AsignacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'TipoProductos']
        ];
        $asignaciones = $this->paginate($this->Asignaciones);

        $this->set(compact('asignaciones'));
        $this->set('_serialize', ['asignaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Asignacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asignacione = $this->Asignaciones->get($id, [
            'contain' => ['Users', 'TipoProductos', 'DetalleAsignaciones']
        ]);

        $this->set('asignacione', $asignacione);
        $this->set('_serialize', ['asignacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asignacione = $this->Asignaciones->newEntity();
        if ($this->request->is('post')) {
            $asignacione = $this->Asignaciones->patchEntity($asignacione, $this->request->getData());
            if ($this->Asignaciones->save($asignacione)) {
                $this->Flash->success(__('The asignacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asignacione could not be saved. Please, try again.'));
        }
        $users = $this->Asignaciones->Users->find('list', ['limit' => 200]);
        $tipoProductos = $this->Asignaciones->TipoProductos->find('list', ['limit' => 200]);
        $this->set(compact('asignacione', 'users', 'tipoProductos'));
        $this->set('_serialize', ['asignacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asignacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asignacione = $this->Asignaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asignacione = $this->Asignaciones->patchEntity($asignacione, $this->request->getData());
            if ($this->Asignaciones->save($asignacione)) {
                $this->Flash->success(__('The asignacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asignacione could not be saved. Please, try again.'));
        }
        $users = $this->Asignaciones->Users->find('list', ['limit' => 200]);
        $tipoProductos = $this->Asignaciones->TipoProductos->find('list', ['limit' => 200]);
        $this->set(compact('asignacione', 'users', 'tipoProductos'));
        $this->set('_serialize', ['asignacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Asignacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asignacione = $this->Asignaciones->get($id);
        if ($this->Asignaciones->delete($asignacione)) {
            $this->Flash->success(__('The asignacione has been deleted.'));
        } else {
            $this->Flash->error(__('The asignacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
