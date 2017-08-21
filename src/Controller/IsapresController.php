<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Isapres Controller
 *
 * @property \App\Model\Table\IsapresTable $Isapres
 */
class IsapresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $isapres = $this->paginate($this->Isapres);

        $this->set(compact('isapres'));
        $this->set('_serialize', ['isapres']);
    }

    /**
     * View method
     *
     * @param string|null $id Isapre id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $isapre = $this->Isapres->get($id, [
            'contain' => ['FichaPersonales']
        ]);

        $this->set('isapre', $isapre);
        $this->set('_serialize', ['isapre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $isapre = $this->Isapres->newEntity();
        if ($this->request->is('post')) {
            $isapre = $this->Isapres->patchEntity($isapre, $this->request->getData());
            if ($this->Isapres->save($isapre)) {
                $this->Flash->success(__('The isapre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The isapre could not be saved. Please, try again.'));
        }
        $this->set(compact('isapre'));
        $this->set('_serialize', ['isapre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Isapre id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $isapre = $this->Isapres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $isapre = $this->Isapres->patchEntity($isapre, $this->request->getData());
            if ($this->Isapres->save($isapre)) {
                $this->Flash->success(__('The isapre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The isapre could not be saved. Please, try again.'));
        }
        $this->set(compact('isapre'));
        $this->set('_serialize', ['isapre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Isapre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $isapre = $this->Isapres->get($id);
        if ($this->Isapres->delete($isapre)) {
            $this->Flash->success(__('The isapre has been deleted.'));
        } else {
            $this->Flash->error(__('The isapre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
