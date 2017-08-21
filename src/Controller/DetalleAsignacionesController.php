<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetalleAsignaciones Controller
 *
 * @property \App\Model\Table\DetalleAsignacionesTable $DetalleAsignaciones
 */
class DetalleAsignacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SubtipoProductos', 'Asignaciones']
        ];
        $detalleAsignaciones = $this->paginate($this->DetalleAsignaciones);

        $this->set(compact('detalleAsignaciones'));
        $this->set('_serialize', ['detalleAsignaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Detalle Asignacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalleAsignacione = $this->DetalleAsignaciones->get($id, [
            'contain' => ['SubtipoProductos', 'Asignaciones']
        ]);

        $this->set('detalleAsignacione', $detalleAsignacione);
        $this->set('_serialize', ['detalleAsignacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detalleAsignacione = $this->DetalleAsignaciones->newEntity();
        if ($this->request->is('post')) {
            $detalleAsignacione = $this->DetalleAsignaciones->patchEntity($detalleAsignacione, $this->request->getData());
            if ($this->DetalleAsignaciones->save($detalleAsignacione)) {
                $this->Flash->success(__('The detalle asignacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle asignacione could not be saved. Please, try again.'));
        }
        $subtipoProductos = $this->DetalleAsignaciones->SubtipoProductos->find('list', ['limit' => 200]);
        $asignaciones = $this->DetalleAsignaciones->Asignaciones->find('list', ['limit' => 200]);
        $this->set(compact('detalleAsignacione', 'subtipoProductos', 'asignaciones'));
        $this->set('_serialize', ['detalleAsignacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalle Asignacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detalleAsignacione = $this->DetalleAsignaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalleAsignacione = $this->DetalleAsignaciones->patchEntity($detalleAsignacione, $this->request->getData());
            if ($this->DetalleAsignaciones->save($detalleAsignacione)) {
                $this->Flash->success(__('The detalle asignacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle asignacione could not be saved. Please, try again.'));
        }
        $subtipoProductos = $this->DetalleAsignaciones->SubtipoProductos->find('list', ['limit' => 200]);
        $asignaciones = $this->DetalleAsignaciones->Asignaciones->find('list', ['limit' => 200]);
        $this->set(compact('detalleAsignacione', 'subtipoProductos', 'asignaciones'));
        $this->set('_serialize', ['detalleAsignacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalle Asignacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detalleAsignacione = $this->DetalleAsignaciones->get($id);
        if ($this->DetalleAsignaciones->delete($detalleAsignacione)) {
            $this->Flash->success(__('The detalle asignacione has been deleted.'));
        } else {
            $this->Flash->error(__('The detalle asignacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
