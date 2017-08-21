<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sistemas Controller
 *
 * @property \App\Model\Table\SistemasTable $Sistemas
 */
class SistemasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sistemas = $this->paginate($this->Sistemas);

        $this->set(compact('sistemas'));
        $this->set('_serialize', ['sistemas']);
    }

    /**
     * View method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $sistema = $this->Sistemas->get($id, [
            'contain' => ['Tickets']
        ]);

        $sistema['created'] = isset($sistema['created']) && $sistema['created']!='' ?  $this->formatDateViewC($sistema['created']) : '';

        $sistema['modified'] = isset($sistema['modified']) && $sistema['modified']!='' ?  $this->formatDateViewC($sistema['modified']) : '';

        $this->set('sistema', $sistema);
        $this->set('_serialize', ['sistema']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sistema = $this->Sistemas->newEntity();
        if ($this->request->is('post')) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('The sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
        $this->set('_serialize', ['sistema']);
    }

     public function anular($id = null)
    {
        $rs_sistema = $this->Sistemas->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_sistema = $this->Sistemas->patchEntity($rs_sistema, $rs_active);

                if ($this->Sistemas->save($rs_sistema)) {
                    $this->Flash->success(__('El  sistema fue desactivado correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
         {
            $rs_sistema = $this->Sistemas->get($id,[
                'contain' => []
            ]);
            //var_dump($this->Users->get($id)); die;

            if(is_numeric($id))
            {
                $rs_active['active'] = 1; 

                $rs_sistema = $this->Sistemas->patchEntity($rs_sistema, $rs_active);

                    if ($this->Sistemas->save($rs_sistema)) {
                        $this->Flash->success(__('El sistema fue activado correctamente.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->success(__('Por favor intente nuevamente!.'));
             }
            return $this->redirect(['action' => 'index']);
        }


    /**
     * Edit method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('The sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
        $this->set('_serialize', ['sistema']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sistema = $this->Sistemas->get($id);
        if ($this->Sistemas->delete($sistema)) {
            $this->Flash->success(__('The sistema has been deleted.'));
        } else {
            $this->Flash->error(__('The sistema could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
