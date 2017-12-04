<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FichaCotizaciones Controller
 *
 * @property \App\Model\Table\FichaCotizacionesTable $FichaCotizaciones
 */
class FichaCotizacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $fichaCotizaciones = $this->paginate($this->FichaCotizaciones);

        $this->set(compact('fichaCotizaciones'));
        $this->set('_serialize', ['fichaCotizaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Ficha Cotizacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fichaCotizacione = $this->FichaCotizaciones->get($id, [
            'contain' => []
        ]);

        $this->set('fichaCotizacione', $fichaCotizacione);
        $this->set('_serialize', ['fichaCotizacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fichaCotizacione = $this->FichaCotizaciones->newEntity();
        if ($this->request->is('post')) {
            $fichaCotizacione = $this->FichaCotizaciones->patchEntity($fichaCotizacione, $this->request->getData());
            if ($this->FichaCotizaciones->save($fichaCotizacione)) {
                $this->Flash->success(__('The ficha cotizacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficha cotizacione could not be saved. Please, try again.'));
        }
        $this->set(compact('fichaCotizacione'));
        $this->set('_serialize', ['fichaCotizacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ficha Cotizacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fichaCotizacione = $this->FichaCotizaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fichaCotizacione = $this->FichaCotizaciones->patchEntity($fichaCotizacione, $this->request->getData());
            if ($this->FichaCotizaciones->save($fichaCotizacione)) {
                $this->Flash->success(__('The ficha cotizacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficha cotizacione could not be saved. Please, try again.'));
        }
        $this->set(compact('fichaCotizacione'));
        $this->set('_serialize', ['fichaCotizacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ficha Cotizacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fichaCotizacione = $this->FichaCotizaciones->get($id);
        if ($this->FichaCotizaciones->delete($fichaCotizacione)) {
            $this->Flash->success(__('The ficha cotizacione has been deleted.'));
        } else {
            $this->Flash->error(__('The ficha cotizacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
