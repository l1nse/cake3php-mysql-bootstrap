<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MensajesAerolineas Controller
 *
 * @property \App\Model\Table\MensajesAerolineasTable $MensajesAerolineas
 */
class MensajesAerolineasController extends AppController
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
        $mensajesAerolineas = $this->paginate($this->MensajesAerolineas);

        $this->set(compact('mensajesAerolineas'));
        $this->set('_serialize', ['mensajesAerolineas']);
    }

    /**
     * View method
     *
     * @param string|null $id Mensajes Aerolinea id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mensajesAerolinea = $this->MensajesAerolineas->get($id, [
            'contain' => ['Reemisiones']
        ]);

        $this->set('mensajesAerolinea', $mensajesAerolinea);
        $this->set('_serialize', ['mensajesAerolinea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mensajesAerolinea = $this->MensajesAerolineas->newEntity();
        if ($this->request->is('post')) {
            $mensajesAerolinea = $this->MensajesAerolineas->patchEntity($mensajesAerolinea, $this->request->getData());
            if ($this->MensajesAerolineas->save($mensajesAerolinea)) {
                $this->Flash->success(__('The mensajes aerolinea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mensajes aerolinea could not be saved. Please, try again.'));
        }
        $reemisiones = $this->MensajesAerolineas->Reemisiones->find('list', ['limit' => 200]);
        $this->set(compact('mensajesAerolinea', 'reemisiones'));
        $this->set('_serialize', ['mensajesAerolinea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mensajes Aerolinea id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mensajesAerolinea = $this->MensajesAerolineas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mensajesAerolinea = $this->MensajesAerolineas->patchEntity($mensajesAerolinea, $this->request->getData());
            if ($this->MensajesAerolineas->save($mensajesAerolinea)) {
                $this->Flash->success(__('The mensajes aerolinea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mensajes aerolinea could not be saved. Please, try again.'));
        }
        $reemisiones = $this->MensajesAerolineas->Reemisiones->find('list', ['limit' => 200]);
        $this->set(compact('mensajesAerolinea', 'reemisiones'));
        $this->set('_serialize', ['mensajesAerolinea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mensajes Aerolinea id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mensajesAerolinea = $this->MensajesAerolineas->get($id);
        if ($this->MensajesAerolineas->delete($mensajesAerolinea)) {
            $this->Flash->success(__('The mensajes aerolinea has been deleted.'));
        } else {
            $this->Flash->error(__('The mensajes aerolinea could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
