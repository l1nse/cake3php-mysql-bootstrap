<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemCotizaciones Controller
 *
 * @property \App\Model\Table\ItemCotizacionesTable $ItemCotizaciones
 */
class ItemCotizacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cotizaciones', 'TipoItems', 'TipoCambios']
        ];
        $itemCotizaciones = $this->paginate($this->ItemCotizaciones);

        $this->set(compact('itemCotizaciones'));
        $this->set('_serialize', ['itemCotizaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Cotizacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemCotizacione = $this->ItemCotizaciones->get($id, [
            'contain' => ['Cotizaciones', 'TipoItems', 'TipoCambios']
        ]);

        $this->set('itemCotizacione', $itemCotizacione);
        $this->set('_serialize', ['itemCotizacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemCotizacione = $this->ItemCotizaciones->newEntity();
        if ($this->request->is('post')) {
            $itemCotizacione = $this->ItemCotizaciones->patchEntity($itemCotizacione, $this->request->getData());
            if ($this->ItemCotizaciones->save($itemCotizacione)) {
                $this->Flash->success(__('The item cotizacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item cotizacione could not be saved. Please, try again.'));
        }
        $cotizaciones = $this->ItemCotizaciones->Cotizaciones->find('list', ['limit' => 200]);
        $tipoItems = $this->ItemCotizaciones->TipoItems->find('list', ['limit' => 200]);
        $tipoCambios = $this->ItemCotizaciones->TipoCambios->find('list', ['limit' => 200]);
        $this->set(compact('itemCotizacione', 'cotizaciones', 'tipoItems', 'tipoCambios'));
        $this->set('_serialize', ['itemCotizacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Cotizacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemCotizacione = $this->ItemCotizaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemCotizacione = $this->ItemCotizaciones->patchEntity($itemCotizacione, $this->request->getData());
            if ($this->ItemCotizaciones->save($itemCotizacione)) {
                $this->Flash->success(__('The item cotizacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item cotizacione could not be saved. Please, try again.'));
        }
        $cotizaciones = $this->ItemCotizaciones->Cotizaciones->find('list', ['limit' => 200]);
        $tipoItems = $this->ItemCotizaciones->TipoItems->find('list', ['limit' => 200]);
        $tipoCambios = $this->ItemCotizaciones->TipoCambios->find('list', ['limit' => 200]);
        $this->set(compact('itemCotizacione', 'cotizaciones', 'tipoItems', 'tipoCambios'));
        $this->set('_serialize', ['itemCotizacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Cotizacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemCotizacione = $this->ItemCotizaciones->get($id);
        if ($this->ItemCotizaciones->delete($itemCotizacione)) {
            $this->Flash->success(__('The item cotizacione has been deleted.'));
        } else {
            $this->Flash->error(__('The item cotizacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
