<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Afps Controller
 *
 * @property \App\Model\Table\AfpsTable $Afps
 */
class AfpsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $afps = $this->paginate($this->Afps);

        $this->set(compact('afps'));
        $this->set('_serialize', ['afps']);
    }

    /**
     * View method
     *
     * @param string|null $id Afp id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $afp = $this->Afps->get($id, [
            'contain' => ['FichaPersonales']
        ]);

        $this->set('afp', $afp);
        $this->set('_serialize', ['afp']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $afp = $this->Afps->newEntity();
        if ($this->request->is('post')) {
            $afp = $this->Afps->patchEntity($afp, $this->request->getData());
            if ($this->Afps->save($afp)) {
                $this->Flash->success(__('The afp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The afp could not be saved. Please, try again.'));
        }
        $this->set(compact('afp'));
        $this->set('_serialize', ['afp']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Afp id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $afp = $this->Afps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $afp = $this->Afps->patchEntity($afp, $this->request->getData());
            if ($this->Afps->save($afp)) {
                $this->Flash->success(__('The afp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The afp could not be saved. Please, try again.'));
        }
        $this->set(compact('afp'));
        $this->set('_serialize', ['afp']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Afp id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $afp = $this->Afps->get($id);
        if ($this->Afps->delete($afp)) {
            $this->Flash->success(__('The afp has been deleted.'));
        } else {
            $this->Flash->error(__('The afp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
