<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoCambios Controller
 *
 * @property \App\Model\Table\TipoCambiosTable $TipoCambios
 */
class TipoCambiosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tipoCambios = $this->paginate($this->TipoCambios);

        $this->set(compact('tipoCambios'));
        $this->set('_serialize', ['tipoCambios']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Cambio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoCambio = $this->TipoCambios->get($id, [
            'contain' => ['ItemCotizaciones']
        ]);

        $this->set('tipoCambio', $tipoCambio);
        $this->set('_serialize', ['tipoCambio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoCambio = $this->TipoCambios->newEntity();
        if ($this->request->is('post')) {
            $tipoCambio = $this->TipoCambios->patchEntity($tipoCambio, $this->request->getData());
            if ($this->TipoCambios->save($tipoCambio)) {
                $this->Flash->success(__('The tipo cambio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo cambio could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoCambio'));
        $this->set('_serialize', ['tipoCambio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Cambio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoCambio = $this->TipoCambios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoCambio = $this->TipoCambios->patchEntity($tipoCambio, $this->request->getData());
            if ($this->TipoCambios->save($tipoCambio)) {
                $this->Flash->success(__('The tipo cambio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo cambio could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoCambio'));
        $this->set('_serialize', ['tipoCambio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Cambio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoCambio = $this->TipoCambios->get($id);
        if ($this->TipoCambios->delete($tipoCambio)) {
            $this->Flash->success(__('The tipo cambio has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo cambio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
