<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Configuraciones Controller
 *
 * @property \App\Model\Table\ConfiguracionesTable $Configuraciones
 */
class ConfiguracionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $configuraciones = $this->Configuraciones->find('all')->order(['tipo_descripcion' => 'ASC'])->toArray();
        $this->set(compact('configuraciones'));
        $this->set('_serialize', ['configuraciones']);
    }

    public function comprobar()
    {
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        $urlair = null;
        $bdsoftland = null;


        //var_dump($this->request->data['parametroBD']); die;

        $air = $this->Configuraciones->find('all')->toArray();

        if($this->request->data()!= null)
        {
            

            $air = $this->Configuraciones->find('all')->where(['Configuraciones.tipo_descripcion' => 1])->toArray();
            
            $urlair = $this->request->data['urlair'];

            if(isset($urlair) && $urlair != '')
            {   
                //var_dump(isset($urlair) && $urlair != ''); die;
                if(isset($air) && count($air) > 0)
                {
                    //var_dump($air[0]['id']); die;
                    $configuracione = $this->Configuraciones->get($air[0]['id'], [
                    'contain' => []]);
                    $configuracion['parametro'] = $urlair;   
                    //var_dump($configuracion); die;
                    $configuracione = $this->Configuraciones->patchEntity($configuracione, $configuracion);
                    if ($this->Configuraciones->save($configuracione)) {  
                        $result = true; 
                        $this->Flash->success(__('La configuración fue modificada.'));                         
                        //var_dump("guardo");        
                    }else
                    {
                        $this->Flash->error(__('La configuración no pudo ser modificada.'));                         
                       // var_dump("no guardo");        
                    }
                }else
                {
                    $configuracione = $this->Configuraciones->newEntity();            
                    $configuracion['parametro'] = $urlair;
                    $configuracion['tipo_descripcion'] = 1;
                    $configuracion['active'] = 1;
                    $configuracione = $this->Configuraciones->patchEntity($configuracione, $configuracion);
                    if ($this->Configuraciones->save($configuracione)) {  
                        $result = true;
                        $this->Flash->success(__('La configuración fue modificada.'));                                                   
                     //   var_dump("guardo");        
                    }else
                    {
                        $this->Flash->error(__('La configuración no pudo ser  modificada.'));                         
                        /*$x = $configuracione->errors();
                         if ($x) {
                          debug($configuracione);
                          debug($x);
                          return false;
                         }                
                         die;*/
                   //     var_dump("no guardo");        
                    }
                }
                
            }else
            {
                
                //var_dump("urlair vacio");
            }



            $air = $this->Configuraciones->find('all')->where(['Configuraciones.tipo_descripcion' => 2])->toArray();

            $bdsoftland = $this->request->data['parametroBD'];

            if(isset($bdsoftland) && $bdsoftland != '')
            {   
                if(isset($air) && count($air) > 0){
                    //var_dump($air[0]['id']); die;
                    $configuracione = $this->Configuraciones->get($air[0]['id'], [
                    'contain' => []]);
                    $configuracion['parametro'] = $bdsoftland;  
                    $configuracion['tipo_descripcion'] = 2;
                    //var_dump($configuracion); die;
                    $configuracione = $this->Configuraciones->patchEntity($configuracione, $configuracion);
                    if ($this->Configuraciones->save($configuracione)) {                            
                        $result = true;
                        $this->Flash->success(__('La configuración fue modificada.'));                         
                        //var_dump("guardo");        
                    }else
                    {
                        $this->Flash->error(__('La configuración no pudo ser.'));                         
                        //var_dump("no guardo");        
                    }
                }else
                {
                    $configuracione = $this->Configuraciones->newEntity();            
                    $configuracion['parametro'] = $bdsoftland;
                    $configuracion['tipo_descripcion'] = 2;
                    $configuracion['active'] = 1;
                    $configuracione = $this->Configuraciones->patchEntity($configuracione, $configuracion);
                    if ($this->Configuraciones->save($configuracione)) {    
                        $result = true;
                        $this->Flash->success(__('La configuración fue modificada.'));                         
                        //var_dump("guardo");        
                    }else
                    {
                        $this->Flash->error(__('La configuración no pudo ser modificada.'));                         
                        /*$x = $configuracione->errors();
                         if ($x) {
                          debug($configuracione);
                          debug($x);
                          return false;
                         }                
                         die;*/
                        //var_dump("no guardo");        
                    }
                }
                
            }else
            {
                var_dump("bd softland vacio");
            }

        }
    echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

    }

    /**
     * View method
     *
     * @param string|null $id Configuracione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $configuracione = $this->Configuraciones->get($id, [
            'contain' => []
        ]);

        $this->set('configuracione', $configuracione);
        $this->set('_serialize', ['configuracione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $configuracione = $this->Configuraciones->newEntity();
        if ($this->request->is('post')) {
            $configuracione = $this->Configuraciones->patchEntity($configuracione, $this->request->getData());
            if ($this->Configuraciones->save($configuracione)) {
                $this->Flash->success(__('The configuracione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The configuracione could not be saved. Please, try again.'));
        }
        $this->set(compact('configuracione'));
        $this->set('_serialize', ['configuracione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Configuracione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $configuracione = $this->Configuraciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $configuracione = $this->Configuraciones->patchEntity($configuracione, $this->request->getData());
            if ($this->Configuraciones->save($configuracione)) {
                $this->Flash->success(__('The configuracione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The configuracione could not be saved. Please, try again.'));
        }
        $this->set(compact('configuracione'));
        $this->set('_serialize', ['configuracione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Configuracione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $configuracione = $this->Configuraciones->get($id);
        if ($this->Configuraciones->delete($configuracione)) {
            $this->Flash->success(__('The configuracione has been deleted.'));
        } else {
            $this->Flash->error(__('The configuracione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
