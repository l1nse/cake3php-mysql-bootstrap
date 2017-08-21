<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Archives Controller
 *
 * @property \App\Model\Table\ArchivesTable $Archives
 */
class ArchivesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $archives = $this->paginate($this->Archives);

        $this->set(compact('archives'));
        $this->set('_serialize', ['archives']);
    }

    /**
     * View method
     *
     * @param string|null $id Archive id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $archive = $this->Archives->get($id, [
            'contain' => ['GestioneArchives', 'TicketArchives']
        ]);

        $this->set('archive', $archive);
        $this->set('_serialize', ['archive']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $archive = $this->Archives->newEntity();
        if ($this->request->is('post')) {
            $archive = $this->Archives->patchEntity($archive, $this->request->getData());
            if ($this->Archives->save($archive)) {
                $this->Flash->success(__('The archive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The archive could not be saved. Please, try again.'));
        }
        $this->set(compact('archive'));
        $this->set('_serialize', ['archive']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Archive id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $archive = $this->Archives->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $archive = $this->Archives->patchEntity($archive, $this->request->getData());
            if ($this->Archives->save($archive)) {
                $this->Flash->success(__('The archive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The archive could not be saved. Please, try again.'));
        }
        $this->set(compact('archive'));
        $this->set('_serialize', ['archive']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Archive id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $archive = $this->Archives->get($id);
        if ($this->Archives->delete($archive)) {
            $this->Flash->success(__('The archive has been deleted.'));
        } else {
            $this->Flash->error(__('The archive could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
