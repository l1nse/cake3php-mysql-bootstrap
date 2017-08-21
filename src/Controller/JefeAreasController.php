<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JefeAreas Controller
 *
 * @property \App\Model\Table\JefeAreasTable $JefeAreas
 */
class JefeAreasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Areas', 'FichaPersonales']
        ];
        $jefeAreas = $this->paginate($this->JefeAreas);

        $this->set(compact('jefeAreas'));
        $this->set('_serialize', ['jefeAreas']);
    }

    /**
     * View method
     *
     * @param string|null $id Jefe Area id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jefeArea = $this->JefeAreas->get($id, [
            'contain' => ['Areas', 'FichaPersonales']
        ]);

        $this->set('jefeArea', $jefeArea);
        $this->set('_serialize', ['jefeArea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jefeArea = $this->JefeAreas->newEntity();
        if ($this->request->is('post')) {
            $jefeArea = $this->JefeAreas->patchEntity($jefeArea, $this->request->getData());
            if ($this->JefeAreas->save($jefeArea)) {
                $this->Flash->success(__('The jefe area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jefe area could not be saved. Please, try again.'));
        }
        $areas = $this->JefeAreas->Areas->find('list', ['limit' => 200]);
        $fichaPersonales = $this->JefeAreas->FichaPersonales->find('list', ['limit' => 200]);
        $this->set(compact('jefeArea', 'areas', 'fichaPersonales'));
        $this->set('_serialize', ['jefeArea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jefe Area id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jefeArea = $this->JefeAreas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jefeArea = $this->JefeAreas->patchEntity($jefeArea, $this->request->getData());
            if ($this->JefeAreas->save($jefeArea)) {
                $this->Flash->success(__('The jefe area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jefe area could not be saved. Please, try again.'));
        }
        $areas = $this->JefeAreas->Areas->find('list', ['limit' => 200]);
        $fichaPersonales = $this->JefeAreas->FichaPersonales->find('list', ['limit' => 200]);
        $this->set(compact('jefeArea', 'areas', 'fichaPersonales'));
        $this->set('_serialize', ['jefeArea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jefe Area id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jefeArea = $this->JefeAreas->get($id);
        if ($this->JefeAreas->delete($jefeArea)) {
            $this->Flash->success(__('The jefe area has been deleted.'));
        } else {
            $this->Flash->error(__('The jefe area could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
