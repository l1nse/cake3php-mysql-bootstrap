<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CanalVentas Controller
 *
 * @property \App\Model\Table\CanalVentasTable $CanalVentas
 */
class CanalVentasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $canalVentas = $this->paginate($this->CanalVentas);

        $this->set(compact('canalVentas'));
        $this->set('_serialize', ['canalVentas']);
    }

    /**
     * View method
     *
     * @param string|null $id Canal Venta id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $canalVenta = $this->CanalVentas->get($id, [
            'contain' => ['Cotizaciones']
        ]);

        $this->set('canalVenta', $canalVenta);
        $this->set('_serialize', ['canalVenta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $canalVenta = $this->CanalVentas->newEntity();
        if ($this->request->is('post')) {
            $canalVenta = $this->CanalVentas->patchEntity($canalVenta, $this->request->getData());
            if ($this->CanalVentas->save($canalVenta)) {
                $this->Flash->success(__('The canal venta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The canal venta could not be saved. Please, try again.'));
        }
        $this->set(compact('canalVenta'));
        $this->set('_serialize', ['canalVenta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Canal Venta id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $canalVenta = $this->CanalVentas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $canalVenta = $this->CanalVentas->patchEntity($canalVenta, $this->request->getData());
            if ($this->CanalVentas->save($canalVenta)) {
                $this->Flash->success(__('The canal venta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The canal venta could not be saved. Please, try again.'));
        }
        $this->set(compact('canalVenta'));
        $this->set('_serialize', ['canalVenta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Canal Venta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $canalVenta = $this->CanalVentas->get($id);
        if ($this->CanalVentas->delete($canalVenta)) {
            $this->Flash->success(__('The canal venta has been deleted.'));
        } else {
            $this->Flash->error(__('The canal venta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
