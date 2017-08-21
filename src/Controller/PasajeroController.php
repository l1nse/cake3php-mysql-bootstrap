<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pasajero Controller
 *
 * @property \App\Model\Table\PasajeroTable $Pasajero
 */
class PasajeroController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cotizaciones']
        ];
        $pasajero = $this->paginate($this->Pasajero);

        $this->set(compact('pasajero'));
        $this->set('_serialize', ['pasajero']);
    }

    /**
     * View method
     *
     * @param string|null $id Pasajero id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pasajero = $this->Pasajero->get($id, [
            'contain' => ['Cotizaciones']
        ]);

        $this->set('pasajero', $pasajero);
        $this->set('_serialize', ['pasajero']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pasajero = $this->Pasajero->newEntity();
        if ($this->request->is('post')) {
            $pasajero = $this->Pasajero->patchEntity($pasajero, $this->request->getData());
            if ($this->Pasajero->save($pasajero)) {
                $this->Flash->success(__('The pasajero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pasajero could not be saved. Please, try again.'));
        }
        $cotizaciones = $this->Pasajero->Cotizaciones->find('list', ['limit' => 200]);
        $this->set(compact('pasajero', 'cotizaciones'));
        $this->set('_serialize', ['pasajero']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pasajero id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pasajero = $this->Pasajero->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pasajero = $this->Pasajero->patchEntity($pasajero, $this->request->getData());
            if ($this->Pasajero->save($pasajero)) {
                $this->Flash->success(__('The pasajero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pasajero could not be saved. Please, try again.'));
        }
        $cotizaciones = $this->Pasajero->Cotizaciones->find('list', ['limit' => 200]);
        $this->set(compact('pasajero', 'cotizaciones'));
        $this->set('_serialize', ['pasajero']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pasajero id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pasajero = $this->Pasajero->get($id);
        if ($this->Pasajero->delete($pasajero)) {
            $this->Flash->success(__('The pasajero has been deleted.'));
        } else {
            $this->Flash->error(__('The pasajero could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
