<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Padres Controller
 *
 * @property \App\Model\Table\PadresTable $Padres
 */
class PadresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $padres = $this->paginate($this->Padres);

        $this->set(compact('padres'));
        $this->set('_serialize', ['padres']);
    }

    /**
     * View method
     *
     * @param string|null $id Padre id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $padre = $this->Padres->get($id, [
            'contain' => ['Permisos']
        ]);

        $this->set('padre', $padre);
        $this->set('_serialize', ['padre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $padre = $this->Padres->newEntity();
        if ($this->request->is('post')) {
            $padre = $this->Padres->patchEntity($padre, $this->request->getData());
            if ($this->Padres->save($padre)) {
                $this->Flash->success(__('The padre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The padre could not be saved. Please, try again.'));
        }
        $this->set(compact('padre'));
        $this->set('_serialize', ['padre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Padre id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $padre = $this->Padres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $padre = $this->Padres->patchEntity($padre, $this->request->getData());
            if ($this->Padres->save($padre)) {
                $this->Flash->success(__('The padre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The padre could not be saved. Please, try again.'));
        }
        $this->set(compact('padre'));
        $this->set('_serialize', ['padre']);
    }

      public function anular($id = null)
    {
        $rs_padre = $this->Padres->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_padre = $this->Padres->patchEntity($rs_padre, $rs_active);

                if ($this->Padres->save($rs_padre)) {
                    $this->Flash->success(__('La entidad fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
         {
            $rs_padre = $this->Padres->get($id,[
                'contain' => []
            ]);
            //var_dump($this->Users->get($id)); die;

            if(is_numeric($id))
            {
                $rs_active['active'] = 1; 

                $rs_padre = $this->Padres->patchEntity($rs_padre, $rs_active);

                    if ($this->Padres->save($rs_padre)) {
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
     * @param string|null $id Padre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $padre = $this->Padres->get($id);
        if ($this->Padres->delete($padre)) {
            $this->Flash->success(__('The padre has been deleted.'));
        } else {
            $this->Flash->error(__('The padre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
