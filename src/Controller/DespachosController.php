<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Despachos Controller
 *
 * @property \App\Model\Table\DespachosTable $Despachos
 */
class DespachosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tickets', 'Empresas', 'Ciudades', 'Comunas', 'Entidades', 'TipoDocumentos']
        ];
        $despachos = $this->paginate($this->Despachos);

        $this->set(compact('despachos'));
        $this->set('_serialize', ['despachos']);
    }

    /**
     * View method
     *
     * @param string|null $id Despacho id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $despacho = $this->Despachos->get($id, [
            'contain' => ['Tickets', 'Empresas', 'Ciudades', 'Regiones', 'Comunas', 'Entidades', 'TipoDocumentos']
        ]);

        $this->set('despacho', $despacho);
        $this->set('_serialize', ['despacho']);
    }


    public function view2($id = null)
    {
        $despacho = $this->Despachos->get($id, [
            'contain' => ['Tickets', 'Empresas', 'Ciudades', 'Regiones','Comunas', 'Entidades', 'TipoDocumentos']
        ]);

        $this->set('despacho', $despacho);
        $this->set('_serialize', ['despacho']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($ticket_id = null)
    {
        $despacho = $this->Despachos->newEntity();
        $session = $this->request->session();
        $ticket_id_s = $session->read('ticket_id');

        $this->loadModel('correos');
        $this->loadModel('Tickets');

        if(is_numeric($ticket_id)){
            $ticket = $this->Tickets->get($ticket_id, [
                'contain' => ['Sistemas', 'Users', 'UserAsignados', 'SubSistemas']
            ]);
            if ($this->request->is('post')) {
                
                $despacho = $this->Despachos->patchEntity($despacho, $this->request->getData());

                $despacho['fecha_solicitud']  = $this->formatDateTime($this->request->data['fecha_solicitud']).date("H:i:s");
                if ($this->Despachos->save($despacho)) {
                    $this->Flash->success(__('Su ticket fue creado correctamente!'));
                    $descripcion = "<b>Ticket N°: ".$ticket->id."</b><br><br><b>Asunto:</b> ".$ticket->asunto."<br><br><b>Descripción</b>: ".$ticket->descripcion;
                    $this->correos->enviarcorreo(1, $ticket->id,$this->_getUserNameAsig($ticket->user_asignado_id),$this->_getUserEmailAsig($ticket->user_asignado_id), $descripcion);
                    return $this->redirect('/tickets/index/');
                }/*else {
                         
                         $x = $despacho->errors();
                         if ($x) {
                          debug($despacho);
                          debug($x);
                          return false;
                         }                
                         die;
                         
                    }*/
                $this->Flash->error(__('The despacho could not be saved. Please, try again.'));
            }
            $tickets = $this->Despachos->Tickets->find('list', ['limit' => 200]);
            $empresas = $this->Despachos->Empresas->find('list', ['limit' => 200]);
            $regiones = $this->Despachos->Regiones->find('list', ['limit' => 200]);
            $ciudades = $this->Despachos->Ciudades->find('list', ['limit' => 200]);
            $comunas = $this->Despachos->Comunas->find('list', ['limit' => 200]);
            $entidades = $this->Despachos->Entidades->find('list');
            $tipoDocumentos = $this->Despachos->TipoDocumentos->find('list', ['limit' => 200]);
            
            $this->set('ticket', $ticket);
            $this->set(compact('despacho', 'tickets', 'empresas', 'regiones','ciudades', 'comunas', 'entidades', 'tipoDocumentos'));
            $this->set('_serialize', ['despacho']);
        }
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Despacho id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $despacho = $this->Despachos->get($id, [
            'contain' => ['Tickets', 'Empresas', 'Ciudades', 'Regiones','Comunas', 'Entidades', 'TipoDocumentos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['fecha_solicitud']  = $this->formatDateTime($this->request->data['fecha_solicitud']).date("H:i:s");
            $despacho = $this->Despachos->patchEntity($despacho, $this->request->getData());
            if ($this->Despachos->save($despacho)) {
                $this->Flash->success(__('The despacho has been saved.'));

                return $this->redirect('/tickets/index/');
            }
            $this->Flash->error(__('The despacho could not be saved. Please, try again.'));
        }
        $tickets = $this->Despachos->Tickets->find('list', ['limit' => 200]);
        $empresas = $this->Despachos->Empresas->find('list', ['limit' => 200]);
        $regiones = $this->Despachos->Regiones->find('list', ['limit' => 200]);
        $ciudades = $this->Despachos->Ciudades->find('list', ['limit' => 200]);
        $comunas = $this->Despachos->Comunas->find('list', ['limit' => 200]);
        $entidades = $this->Despachos->Entidades->find('list');
        $tipoDocumentos = $this->Despachos->TipoDocumentos->find('list', ['limit' => 200]);
        $this->set(compact('despacho', 'tickets', 'empresas', 'ciudades', 'regiones', 'comunas', 'entidades', 'tipoDocumentos'));
        $this->set('_serialize', ['despacho']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Despacho id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $despacho = $this->Despachos->get($id);
        if ($this->Despachos->delete($despacho)) {
            $this->Flash->success(__('The despacho has been deleted.'));
        } else {
            $this->Flash->error(__('The despacho could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //load ciudades
    public function loadCiudades(){
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        
        if($this->request->is('post')){
            $this->loadModel('Ciudades');
            $regione_id  = $this->request->data['regione_id'];
            $ciudade_id_hd  = $this->request->data['ciudade_id_hd'];
            $rs_sistemas = $this->Ciudades->find('all')->where(['regione_id' => $regione_id])->order(['name' => 'ASC'])->toarray();

            if(is_array($rs_sistemas) && count($rs_sistemas)>0){
                $result = true;
                $html .= '<option value=""></option>';
                foreach ($rs_sistemas as $row) {
                    if($ciudade_id_hd==$row['id']){
                        $html .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
                    }else{
                        $html .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                }
            }
        }

        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
    }

    //load comunas
    public function loadComunas(){
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        
        if($this->request->is('post')){
            $this->loadModel('Comunas');
            $ciudade_id  = $this->request->data['ciudade_id'];
            $comuna_id_hd  = $this->request->data['comuna_id_hd'];
            $ciudade_id_hd  = $this->request->data['ciudade_id_hd'];
            if(isset($comuna_id_hd) && is_numeric($comuna_id_hd)){
                $rs_sistemas = $this->Comunas->find('all')->where(['ciudade_id' => $ciudade_id_hd])->order(['name' => 'ASC'])->toarray();
            }else{
                $rs_sistemas = $this->Comunas->find('all')->where(['ciudade_id' => $ciudade_id])->order(['name' => 'ASC'])->toarray();
            }
            

            if(is_array($rs_sistemas) && count($rs_sistemas)>0){
                $result = true;
                $html .= '<option value=""></option>';
                foreach ($rs_sistemas as $row) {
                    if($comuna_id_hd==$row['id']){
                        $html .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
                    }else{
                        $html .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                }
            }
        }

        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
    }
}

