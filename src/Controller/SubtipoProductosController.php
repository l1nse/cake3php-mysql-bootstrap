<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SubtipoProductos Controller
 *
 * @property \App\Model\Table\SubtipoProductosTable $SubtipoProductos
 */
class SubtipoProductosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TipoProductos']
        ];
        $subtipoProductos = $this->paginate($this->SubtipoProductos);

        $this->set(compact('subtipoProductos'));
        $this->set('_serialize', ['subtipoProductos']);
    }

    /**
     * View method
     *
     * @param string|null $id Subtipo Producto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subtipoProducto = $this->SubtipoProductos->get($id, [
            'contain' => ['TipoProductos', 'DetalleAsignaciones']
        ]);

        $this->set('subtipoProducto', $subtipoProducto);
        $this->set('_serialize', ['subtipoProducto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subtipoProducto = $this->SubtipoProductos->newEntity();
        if ($this->request->is('post')) {
            $subtipoProducto = $this->SubtipoProductos->patchEntity($subtipoProducto, $this->request->getData());
            if ($this->SubtipoProductos->save($subtipoProducto)) {
                $this->Flash->success(__('The subtipo producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subtipo producto could not be saved. Please, try again.'));
        }
        $tipoProductos = $this->SubtipoProductos->TipoProductos->find('list', ['limit' => 200]);
        $this->set(compact('subtipoProducto', 'tipoProductos'));
        $this->set('_serialize', ['subtipoProducto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subtipo Producto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subtipoProducto = $this->SubtipoProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subtipoProducto = $this->SubtipoProductos->patchEntity($subtipoProducto, $this->request->getData());
            if ($this->SubtipoProductos->save($subtipoProducto)) {
                $this->Flash->success(__('The subtipo producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subtipo producto could not be saved. Please, try again.'));
        }
        $tipoProductos = $this->SubtipoProductos->TipoProductos->find('list', ['limit' => 200]);
        $this->set(compact('subtipoProducto', 'tipoProductos'));
        $this->set('_serialize', ['subtipoProducto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subtipo Producto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subtipoProducto = $this->SubtipoProductos->get($id);
        if ($this->SubtipoProductos->delete($subtipoProducto)) {
            $this->Flash->success(__('The subtipo producto has been deleted.'));
        } else {
            $this->Flash->error(__('The subtipo producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
