<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ciudades Controller
 *
 * @property \App\Model\Table\CiudadesTable $Ciudades
 */
class CiudadesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Paises']
        ];
        $ciudades = $this->paginate($this->Ciudades);

        $this->set(compact('ciudades'));
        $this->set('_serialize', ['ciudades']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciudade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciudade = $this->Ciudades->get($id, [
            'contain' => ['Paises', 'Comunas', 'FichaPersonales']
        ]);

        $this->set('ciudade', $ciudade);
        $this->set('_serialize', ['ciudade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciudade = $this->Ciudades->newEntity();
        if ($this->request->is('post')) {
            $ciudade = $this->Ciudades->patchEntity($ciudade, $this->request->getData());
            if ($this->Ciudades->save($ciudade)) {
                $this->Flash->success(__('The ciudade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciudade could not be saved. Please, try again.'));
        }
        $paises = $this->Ciudades->Paises->find('list', ['limit' => 200]);
        $this->set(compact('ciudade', 'paises'));
        $this->set('_serialize', ['ciudade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciudade id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciudade = $this->Ciudades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciudade = $this->Ciudades->patchEntity($ciudade, $this->request->getData());
            if ($this->Ciudades->save($ciudade)) {
                $this->Flash->success(__('The ciudade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciudade could not be saved. Please, try again.'));
        }
        $paises = $this->Ciudades->Paises->find('list', ['limit' => 200]);
        $this->set(compact('ciudade', 'paises'));
        $this->set('_serialize', ['ciudade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciudade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciudade = $this->Ciudades->get($id);
        if ($this->Ciudades->delete($ciudade)) {
            $this->Flash->success(__('The ciudade has been deleted.'));
        } else {
            $this->Flash->error(__('The ciudade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
