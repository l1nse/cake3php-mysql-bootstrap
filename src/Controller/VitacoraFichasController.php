<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VitacoraFichas Controller
 *
 * @property \App\Model\Table\VitacoraFichasTable $VitacoraFichas
 */
class VitacoraFichasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['EstadoFichas', 'FichaNegocios']
        ];
        $vitacoraFichas = $this->paginate($this->VitacoraFichas);

        $this->set(compact('vitacoraFichas'));
        $this->set('_serialize', ['vitacoraFichas']);
    }

    /**
     * View method
     *
     * @param string|null $id Vitacora Ficha id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vitacoraFicha = $this->VitacoraFichas->get($id, [
            'contain' => ['EstadoFichas', 'FichaNegocios']
        ]);

        $this->set('vitacoraFicha', $vitacoraFicha);
        $this->set('_serialize', ['vitacoraFicha']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vitacoraFicha = $this->VitacoraFichas->newEntity();
        if ($this->request->is('post')) {
            $vitacoraFicha = $this->VitacoraFichas->patchEntity($vitacoraFicha, $this->request->getData());
            if ($this->VitacoraFichas->save($vitacoraFicha)) {
                $this->Flash->success(__('The vitacora ficha has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vitacora ficha could not be saved. Please, try again.'));
        }
        $estadoFichas = $this->VitacoraFichas->EstadoFichas->find('list', ['limit' => 200]);
        $fichaNegocios = $this->VitacoraFichas->FichaNegocios->find('list', ['limit' => 200]);
        $this->set(compact('vitacoraFicha', 'estadoFichas', 'fichaNegocios'));
        $this->set('_serialize', ['vitacoraFicha']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vitacora Ficha id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vitacoraFicha = $this->VitacoraFichas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vitacoraFicha = $this->VitacoraFichas->patchEntity($vitacoraFicha, $this->request->getData());
            if ($this->VitacoraFichas->save($vitacoraFicha)) {
                $this->Flash->success(__('The vitacora ficha has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vitacora ficha could not be saved. Please, try again.'));
        }
        $estadoFichas = $this->VitacoraFichas->EstadoFichas->find('list', ['limit' => 200]);
        $fichaNegocios = $this->VitacoraFichas->FichaNegocios->find('list', ['limit' => 200]);
        $this->set(compact('vitacoraFicha', 'estadoFichas', 'fichaNegocios'));
        $this->set('_serialize', ['vitacoraFicha']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vitacora Ficha id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vitacoraFicha = $this->VitacoraFichas->get($id);
        if ($this->VitacoraFichas->delete($vitacoraFicha)) {
            $this->Flash->success(__('The vitacora ficha has been deleted.'));
        } else {
            $this->Flash->error(__('The vitacora ficha could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
