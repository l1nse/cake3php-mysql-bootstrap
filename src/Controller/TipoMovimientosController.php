<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoMovimientos Controller
 *
 * @property \App\Model\Table\TipoMovimientosTable $TipoMovimientos
 */
class TipoMovimientosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tipoMovimientos = $this->paginate($this->TipoMovimientos);

        $this->set(compact('tipoMovimientos'));
        $this->set('_serialize', ['tipoMovimientos']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Movimiento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoMovimiento = $this->TipoMovimientos->get($id, [
            'contain' => ['FichaPersonales']
        ]);

        $this->set('tipoMovimiento', $tipoMovimiento);
        $this->set('_serialize', ['tipoMovimiento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoMovimiento = $this->TipoMovimientos->newEntity();
        if ($this->request->is('post')) {
            $tipoMovimiento = $this->TipoMovimientos->patchEntity($tipoMovimiento, $this->request->getData());
            if ($this->TipoMovimientos->save($tipoMovimiento)) {
                $this->Flash->success(__('The tipo movimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo movimiento could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoMovimiento'));
        $this->set('_serialize', ['tipoMovimiento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Movimiento id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoMovimiento = $this->TipoMovimientos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoMovimiento = $this->TipoMovimientos->patchEntity($tipoMovimiento, $this->request->getData());
            if ($this->TipoMovimientos->save($tipoMovimiento)) {
                $this->Flash->success(__('The tipo movimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo movimiento could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoMovimiento'));
        $this->set('_serialize', ['tipoMovimiento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Movimiento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoMovimiento = $this->TipoMovimientos->get($id);
        if ($this->TipoMovimientos->delete($tipoMovimiento)) {
            $this->Flash->success(__('The tipo movimiento has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo movimiento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
