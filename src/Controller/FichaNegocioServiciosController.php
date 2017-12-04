<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FichaNegocioServicios Controller
 *
 * @property \App\Model\Table\FichaNegocioServiciosTable $FichaNegocioServicios
 */
class FichaNegocioServiciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FichaNegocios', 'Servicios']
        ];
        $fichaNegocioServicios = $this->paginate($this->FichaNegocioServicios);

        $this->set(compact('fichaNegocioServicios'));
        $this->set('_serialize', ['fichaNegocioServicios']);
    }

    /**
     * View method
     *
     * @param string|null $id Ficha Negocio Servicio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fichaNegocioServicio = $this->FichaNegocioServicios->get($id, [
            'contain' => ['FichaNegocios', 'Servicios']
        ]);

        $this->set('fichaNegocioServicio', $fichaNegocioServicio);
        $this->set('_serialize', ['fichaNegocioServicio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fichaNegocioServicio = $this->FichaNegocioServicios->newEntity();
        if ($this->request->is('post')) {
            $fichaNegocioServicio = $this->FichaNegocioServicios->patchEntity($fichaNegocioServicio, $this->request->getData());
            if ($this->FichaNegocioServicios->save($fichaNegocioServicio)) {
                $this->Flash->success(__('The ficha negocio servicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficha negocio servicio could not be saved. Please, try again.'));
        }
        $fichaNegocios = $this->FichaNegocioServicios->FichaNegocios->find('list', ['limit' => 200]);
        $servicios = $this->FichaNegocioServicios->Servicios->find('list', ['limit' => 200]);
        $this->set(compact('fichaNegocioServicio', 'fichaNegocios', 'servicios'));
        $this->set('_serialize', ['fichaNegocioServicio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ficha Negocio Servicio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fichaNegocioServicio = $this->FichaNegocioServicios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fichaNegocioServicio = $this->FichaNegocioServicios->patchEntity($fichaNegocioServicio, $this->request->getData());
            if ($this->FichaNegocioServicios->save($fichaNegocioServicio)) {
                $this->Flash->success(__('The ficha negocio servicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficha negocio servicio could not be saved. Please, try again.'));
        }
        $fichaNegocios = $this->FichaNegocioServicios->FichaNegocios->find('list', ['limit' => 200]);
        $servicios = $this->FichaNegocioServicios->Servicios->find('list', ['limit' => 200]);
        $this->set(compact('fichaNegocioServicio', 'fichaNegocios', 'servicios'));
        $this->set('_serialize', ['fichaNegocioServicio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ficha Negocio Servicio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fichaNegocioServicio = $this->FichaNegocioServicios->get($id);
        if ($this->FichaNegocioServicios->delete($fichaNegocioServicio)) {
            $this->Flash->success(__('The ficha negocio servicio has been deleted.'));
        } else {
            $this->Flash->error(__('The ficha negocio servicio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
