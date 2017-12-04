<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoItems Controller
 *
 * @property \App\Model\Table\TipoItemsTable $TipoItems
 */
class TipoItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tipoItems = $this->paginate($this->TipoItems);

        $this->set(compact('tipoItems'));
        $this->set('_serialize', ['tipoItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoItem = $this->TipoItems->get($id, [
            'contain' => ['ItemCotizaciones']
        ]);

        $this->set('tipoItem', $tipoItem);
        $this->set('_serialize', ['tipoItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoItem = $this->TipoItems->newEntity();

        if ($this->request->is('post')) {
            $tipoItem = $this->TipoItems->patchEntity($tipoItem, $this->request->getData());
            //var_dump($this->request->getData()); die;
            if ($this->TipoItems->save($tipoItem)) {
                $this->Flash->success(__('The tipo item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo item could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoItem'));
        $this->set('_serialize', ['tipoItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoItem = $this->TipoItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoItem = $this->TipoItems->patchEntity($tipoItem, $this->request->getData());
            if ($this->TipoItems->save($tipoItem)) {
                $this->Flash->success(__('The tipo item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo item could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoItem'));
        $this->set('_serialize', ['tipoItem']);
    }

     public function anular($id = null)
    {
        $rs_item = $this->TipoItems->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_item = $this->TipoItems->patchEntity($rs_item, $rs_active);

                if ($this->TipoItems->save($rs_item)) {
                    $this->Flash->success(__('La entidad fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
         {
            $rs_item = $this->TipoItems->get($id,[
                'contain' => []
            ]);
            //var_dump($this->Users->get($id)); die;

            if(is_numeric($id))
            {
                $rs_active['active'] = 1; 

                $rs_item = $this->TipoItems->patchEntity($rs_item, $rs_active);

                    if ($this->TipoItems->save($rs_item)) {
                        $this->Flash->success(__('La entidad fue activada correctamente.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->success(__('Por favor intente nuevamente!.'));
             }
            return $this->redirect(['action' => 'index']);
        }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoItem = $this->TipoItems->get($id);
        if ($this->TipoItems->delete($tipoItem)) {
            $this->Flash->success(__('The tipo item has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
