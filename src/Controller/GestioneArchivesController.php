<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GestioneArchives Controller
 *
 * @property \App\Model\Table\GestioneArchivesTable $GestioneArchives
 */
class GestioneArchivesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Gestiones', 'Archives']
        ];
        $gestioneArchives = $this->paginate($this->GestioneArchives);

        $this->set(compact('gestioneArchives'));
        $this->set('_serialize', ['gestioneArchives']);
    }

    /**
     * View method
     *
     * @param string|null $id Gestione Archive id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gestioneArchive = $this->GestioneArchives->get($id, [
            'contain' => ['Gestiones', 'Archives']
        ]);

        $this->set('gestioneArchive', $gestioneArchive);
        $this->set('_serialize', ['gestioneArchive']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gestioneArchive = $this->GestioneArchives->newEntity();
        if ($this->request->is('post')) {
            $gestioneArchive = $this->GestioneArchives->patchEntity($gestioneArchive, $this->request->getData());
            if ($this->GestioneArchives->save($gestioneArchive)) {
                $this->Flash->success(__('The gestione archive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gestione archive could not be saved. Please, try again.'));
        }
        $gestiones = $this->GestioneArchives->Gestiones->find('list', ['limit' => 200]);
        $archives = $this->GestioneArchives->Archives->find('list', ['limit' => 200]);
        $this->set(compact('gestioneArchive', 'gestiones', 'archives'));
        $this->set('_serialize', ['gestioneArchive']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gestione Archive id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gestioneArchive = $this->GestioneArchives->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gestioneArchive = $this->GestioneArchives->patchEntity($gestioneArchive, $this->request->getData());
            if ($this->GestioneArchives->save($gestioneArchive)) {
                $this->Flash->success(__('The gestione archive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gestione archive could not be saved. Please, try again.'));
        }
        $gestiones = $this->GestioneArchives->Gestiones->find('list', ['limit' => 200]);
        $archives = $this->GestioneArchives->Archives->find('list', ['limit' => 200]);
        $this->set(compact('gestioneArchive', 'gestiones', 'archives'));
        $this->set('_serialize', ['gestioneArchive']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gestione Archive id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gestioneArchive = $this->GestioneArchives->get($id);
        if ($this->GestioneArchives->delete($gestioneArchive)) {
            $this->Flash->success(__('The gestione archive has been deleted.'));
        } else {
            $this->Flash->error(__('The gestione archive could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
