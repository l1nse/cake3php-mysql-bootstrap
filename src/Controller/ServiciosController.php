<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servicios Controller
 *
 * @property \App\Model\Table\ServiciosTable $Servicios
 */
class ServiciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FichaNegocios']
        ];
        $servicios = $this->paginate($this->Servicios);

        $this->set(compact('servicios'));
        $this->set('_serialize', ['servicios']);
    }

    /**
     * View method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicio = $this->Servicios->find('all')->contain(['FichaNegocios', 'Proveedores', 'FichaNegocioServicios'])
        ->where(['Servicios.id' => $id])->toArray();
        

        $this->set('servicio', $servicio);
        $this->set('_serialize', ['servicio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $result = false;
        $debug  = false;
        $html = false;

        $servicio = $this->Servicios->newEntity();
        if ($this->request->is('post')) {
            $servicio = $this->Servicios->patchEntity($servicio, $this->request->getData());
            $servicio['active'] = 1;
            $servicio['ficha_negocio_id'] = $this->request->getData('ficha_id');            
            $servicio['tax'] = $this->request->getData('tax_clp');                        
            $servicio['iva_porcentaje'] = 19;
            $servicio['boleta_honorario_porcentaje'] = 19;
            $servicio['total_pesos'] = $this->request->getData('total_clp');
            $servicio['valor_neto_land'] = $this->request->getData('valor_neto_land_clp');
            $servicio['comag_iva_porcentaje'] = $this->request->getData('iva_porcentaje');
            $servicio['comag_iva_pesos'] = $this->request->getData('iva_pesos');
            $servicio['comag_iva_usd'] = $this->request->getData('iva_usd');

            
            //var_dump($this->request->getData('iva_land_pesos')); die;
            if ($this->Servicios->save($servicio)) {
                $result = true;
                $this->Flash->success(__('El servicio fue guardado.'));
            }else
            {
               $this->Flash->error(__('El servicio no se pudo guardar'));
                $this->Flash->error(__( $debug));
            }
            
        }
        $fichaNegocios = $this->Servicios->FichaNegocios->find('list', ['limit' => 200]);
        $this->loadModel('Proveedores');
        $proveedores = $this->Proveedores->find('all')->where(['Proveedores.tipo' =>1]); //Entidades tipo->1 = Proveedores


        $this->set(compact('servicio', 'fichaNegocios', 'proveedores'));
        $this->set('_serialize', ['servicio']);



         $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicio = $this->Servicios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicio = $this->Servicios->patchEntity($servicio, $this->request->getData());
            if ($this->Servicios->save($servicio)) {
                $this->Flash->success(__('The servicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The servicio could not be saved. Please, try again.'));
        }

        $fichaNegocios = $this->Servicios->FichaNegocios->find('list', ['limit' => 200]);
        $proveedores = $this->Servicios->Proveedores->find('list', ['limit' => 200]);
        $this->set(compact('servicio', 'fichaNegocios', 'proveedores'));
        $this->set('_serialize', ['servicio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicio = $this->Servicios->get($id);
        if ($this->Servicios->delete($servicio)) {
            $this->Flash->success(__('The servicio has been deleted.'));
        } else {
            $this->Flash->error(__('The servicio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    

}
