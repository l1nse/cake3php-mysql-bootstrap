<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetallesTikets Controller
 *
 * @property \App\Model\Table\DetallesTiketsTable $DetallesTikets
 */
class DetallesTiketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Reemisiones']
        ];
        $detallesTikets = $this->paginate($this->DetallesTikets);

        $this->set(compact('detallesTikets'));
        $this->set('_serialize', ['detallesTikets']);
    }

    /**
     * View method
     *
     * @param string|null $id Detalles Tiket id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detallesTiket = $this->DetallesTikets->get($id, [
            'contain' => ['Reemisiones']
        ]);

        $this->set('detallesTiket', $detallesTiket);
        $this->set('_serialize', ['detallesTiket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detallesTiket = $this->DetallesTikets->newEntity();
        if ($this->request->is('post')) {
            $detallesTiket = $this->DetallesTikets->patchEntity($detallesTiket, $this->request->getData());
            if ($this->DetallesTikets->save($detallesTiket)) {
                $this->Flash->success(__('The detalles tiket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalles tiket could not be saved. Please, try again.'));
        }
        $reemisiones = $this->DetallesTikets->Reemisiones->find('list', ['limit' => 200]);
        $this->set(compact('detallesTiket', 'reemisiones'));
        $this->set('_serialize', ['detallesTiket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalles Tiket id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detallesTiket = $this->DetallesTikets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detallesTiket = $this->DetallesTikets->patchEntity($detallesTiket, $this->request->getData());
            if ($this->DetallesTikets->save($detallesTiket)) {
                $this->Flash->success(__('The detalles tiket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalles tiket could not be saved. Please, try again.'));
        }
        $reemisiones = $this->DetallesTikets->Reemisiones->find('list', ['limit' => 200]);
        $this->set(compact('detallesTiket', 'reemisiones'));
        $this->set('_serialize', ['detallesTiket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalles Tiket id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detallesTiket = $this->DetallesTikets->get($id);
        if ($this->DetallesTikets->delete($detallesTiket)) {
            $this->Flash->success(__('The detalles tiket has been deleted.'));
        } else {
            $this->Flash->error(__('The detalles tiket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
