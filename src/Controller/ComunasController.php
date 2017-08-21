<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comunas Controller
 *
 * @property \App\Model\Table\ComunasTable $Comunas
 */
class ComunasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ciudades']
        ];
        $comunas = $this->paginate($this->Comunas);

        $this->set(compact('comunas'));
        $this->set('_serialize', ['comunas']);
    }

    /**
     * View method
     *
     * @param string|null $id Comuna id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comuna = $this->Comunas->get($id, [
            'contain' => ['Ciudades', 'FichaPersonales']
        ]);

        $this->set('comuna', $comuna);
        $this->set('_serialize', ['comuna']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comuna = $this->Comunas->newEntity();
        if ($this->request->is('post')) {
            $comuna = $this->Comunas->patchEntity($comuna, $this->request->getData());
            if ($this->Comunas->save($comuna)) {
                $this->Flash->success(__('The comuna has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comuna could not be saved. Please, try again.'));
        }
        $ciudades = $this->Comunas->Ciudades->find('list', ['limit' => 200]);
        $this->set(compact('comuna', 'ciudades'));
        $this->set('_serialize', ['comuna']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comuna id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comuna = $this->Comunas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comuna = $this->Comunas->patchEntity($comuna, $this->request->getData());
            if ($this->Comunas->save($comuna)) {
                $this->Flash->success(__('The comuna has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comuna could not be saved. Please, try again.'));
        }
        $ciudades = $this->Comunas->Ciudades->find('list', ['limit' => 200]);
        $this->set(compact('comuna', 'ciudades'));
        $this->set('_serialize', ['comuna']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comuna id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comuna = $this->Comunas->get($id);
        if ($this->Comunas->delete($comuna)) {
            $this->Flash->success(__('The comuna has been deleted.'));
        } else {
            $this->Flash->error(__('The comuna could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
