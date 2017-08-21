<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoProductos Controller
 *
 * @property \App\Model\Table\TipoProductosTable $TipoProductos
 */
class TipoProductosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tipoProductos = $this->paginate($this->TipoProductos);

        $this->set(compact('tipoProductos'));
        $this->set('_serialize', ['tipoProductos']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Producto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoProducto = $this->TipoProductos->get($id, [
            'contain' => ['Asignaciones', 'SubtipoProductos']
        ]);

        $this->set('tipoProducto', $tipoProducto);
        $this->set('_serialize', ['tipoProducto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoProducto = $this->TipoProductos->newEntity();
        if ($this->request->is('post')) {
            $tipoProducto = $this->TipoProductos->patchEntity($tipoProducto, $this->request->getData());
            if ($this->TipoProductos->save($tipoProducto)) {
                $this->Flash->success(__('The tipo producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo producto could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoProducto'));
        $this->set('_serialize', ['tipoProducto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Producto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoProducto = $this->TipoProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoProducto = $this->TipoProductos->patchEntity($tipoProducto, $this->request->getData());
            if ($this->TipoProductos->save($tipoProducto)) {
                $this->Flash->success(__('The tipo producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo producto could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoProducto'));
        $this->set('_serialize', ['tipoProducto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Producto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoProducto = $this->TipoProductos->get($id);
        if ($this->TipoProductos->delete($tipoProducto)) {
            $this->Flash->success(__('The tipo producto has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
