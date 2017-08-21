<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * Tickets Controller
 *
 * @property \App\Model\Table\TicketsTable $Tickets
 */
class TicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tickets = $this->Tickets->find('all')
                ->contain(['Sistemas', 'SubSistemas', 'Users', 'UserAsignados', 'Despachos'])
                ->where(['Tickets.user_id' => $this->_getUser()])
                ->order(['Tickets.id' => 'DESC']);



        //$this->Flash->default(__('Para crear un ticket debe hacer clic en el botón "+ Crear ticket".'));
          
        //$this->paginate->where(['Tickets.user_asignado_id' => $this->_getUser()]);

        //$tickets = $this->paginate($this->Tickets);


        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }

    public function indexExcel()
    {
        //$this->autoRender = 'ajax' ;
        $this->viewBuilder()->layout(false);

        $tickets = $this->Tickets->find('all')
                ->contain(['Sistemas', 'Users', 'UserAsignados', 'SubSistemas'])
                ->where(['Tickets.user_id' => $this->_getUser()])
                ->order(['Tickets.id' => 'DESC']);

        
          
        //$this->paginate->where(['Tickets.user_asignado_id' => $this->_getUser()]);

        //$tickets = $this->paginate($this->Tickets);


        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }

    public function asignado()
    {

        $tickets = $this->Tickets->find('all')
                ->contain(['Sistemas', 'Users', 'UserAsignados', 'SubSistemas', 'Despachos'])
                ->where(['Tickets.user_asignado_id' => $this->_getUser(), 'Tickets.active IN' => ['1','2','5', '4']])
                ->order(['Tickets.id' => 'DESC']);
        //$this->Flash->default(__('Para agregar gestión debe hacer clic en el botón "Gestión" '));

        /*$this->paginate = [
            'contain' => ['Sistemas', 'Users', 'UserAsignados'],
            'conditions' => ['Tickets.user_asignado_id' => $this->_getUser(), 'OR' => array( array('Tickets.active' => 1), array('Tickets.active' => 2), array('Tickets.active' => 4) )],
            'order' => ['id' => 'DESC']
        ];*/
        //$this->paginate->where(['Tickets.user_asignado_id' => $this->_getUser()]);

        //$tickets = $this->paginate($this->Tickets);


        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }


    public function asignadoExcel()
    {
        $this->viewBuilder()->layout(false);

        $tickets = $this->Tickets->find('all')
                ->contain(['Sistemas', 'Users', 'UserAsignados', 'SubSistemas'])
                ->where(['Tickets.user_asignado_id' => $this->_getUser(), 'Tickets.active IN' => ['1','2','5', '4']])
                
                ->order(['Tickets.id' => 'DESC']);

        /*$this->paginate = [
            'contain' => ['Sistemas', 'Users', 'UserAsignados'],
            'conditions' => ['Tickets.user_asignado_id' => $this->_getUser(), 'OR' => array( array('Tickets.active' => 1), array('Tickets.active' => 2), array('Tickets.active' => 4) )],
            'order' => ['id' => 'DESC']
        ];*/
        //$this->paginate->where(['Tickets.user_asignado_id' => $this->_getUser()]);

        //$tickets = $this->paginate($this->Tickets);


        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }

    public function listado($id = null)
    {

        $tickets = $this->Tickets->find('all')
                ->contain(['Sistemas', 'Users', 'UserAsignados', 'SubSistemas', 'Despachos'])
                ->order(['Tickets.id' => 'DESC']);
        if(is_numeric($id)){
            $tickets->where(['user_asignado_id' => $id]);
            $this->set('user_asignado_id', $id);
        }else{
            $this->set('user_asignado_id', '');
        }
        
        $this->loadModel('Users');

        $rs_user = $this->Users->find('all')->where(['active' => 1])->order(['name' => 'ASC'])->toArray();

        $this->set(compact('tickets'));
        $this->set('rs_user', $rs_user);

        $this->set('_serialize', ['tickets']);
    }

    public function listadoExcel()
    {
        $this->viewBuilder()->layout(false);

        $tickets = $this->Tickets->find('all')
                ->contain(['Sistemas', 'Users', 'UserAsignados', 'SubSistemas'])
                
                ->order(['Tickets.id' => 'DESC']);


        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }

    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Sistemas', 'Users', 'UserAsignados', 'SubSistemas', 'Despachos']
        ]);

        $this->loadModel('TicketArchives');
        $this->loadModel('Archives');
        $this->loadModel('Gestiones');
        $this->loadModel('GestioneArchives');

        $archive = array();
        $ticketArchive = array();

        $ticketArchive = $this->TicketArchives->find('all')->where(['ticket_id' => $ticket->id ])->toArray();
        if(is_array($ticketArchive) && count($ticketArchive)>0){
            $archive = $this->Archives->find('all')->where(['id' => $ticketArchive[0]->archive_id ])->toArray();
        }
        $ticket['created'] = isset($ticket['created']) && $ticket['created']!='' ?  $this->formatDateViewC($ticket['created']) : '';

        $ticket['modified'] = isset($ticket['modified']) && $ticket['modified']!='' ?  $this->formatDateViewC($ticket['modified']) : '';



        //gestiones
        $rs_gestiones = $this->Gestiones->find('all')->where(['ticket_id' => $id])->order(['id' => 'asc'])->toArray();
        $rs_lis_gestiones = array();
        $rs_all_gestiones = array();
        if(is_array($rs_gestiones) && count($rs_gestiones)>0){
            foreach ($rs_gestiones as $value) {
                //var_dump($value->id); die;
                $rs_lis_gestiones['id'] = $value->id;
                $rs_lis_gestiones['comentarios'] = $value->comentarios;
                $rs_lis_gestiones['created'] = $value->created;
                $rs_gestiones_archive = $this->GestioneArchives->find('all')->where(['gestione_id' => $value->id])->toArray();
                if(is_array($rs_gestiones_archive) && count($rs_gestiones_archive)>0){
                    $rs_list_archive = $this->Archives->find('all')->where(['id' => $rs_gestiones_archive[0]->archive_id])->toArray();
                    $rs_lis_gestiones['file_name']  = $rs_list_archive[0]->name;
                    $rs_lis_gestiones['file_path']  = $rs_list_archive[0]->url;
                }else{
                    $rs_lis_gestiones['file_name']  = '';
                    $rs_lis_gestiones['file_path']  = '';
                }
                array_push($rs_all_gestiones, $rs_lis_gestiones);
            }
        }
        $this->set('rs_gestiones', $rs_all_gestiones);

        $this->set('ticket', $ticket);
        $this->set('ticketArchive', $ticketArchive);
        $this->set('archive', $archive);
        $this->set('_serialize', ['ticket']);
    }

    public function view2($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Sistemas', 'Users', 'UserAsignados', 'SubSistemas', 'Despachos']
        ]);

        $this->loadModel('TicketArchives');
        $this->loadModel('Archives');
        $this->loadModel('Gestiones');
        $this->loadModel('GestioneArchives');

        $archive = array();
        $ticketArchive = array();

        $ticketArchive = $this->TicketArchives->find('all')->where(['ticket_id' => $ticket->id ])->toArray();
        if(is_array($ticketArchive) && count($ticketArchive)>0){
            $archive = $this->Archives->find('all')->where(['id' => $ticketArchive[0]->archive_id ])->toArray();
        }

        $ticket['created'] = isset($ticket['created']) && $ticket['created']!='' ?  $this->formatDateViewC($ticket['created']) : '';

        $ticket['modified'] = isset($ticket['modified']) && $ticket['modified']!='' ?  $this->formatDateViewC($ticket['modified']) : '';


        //gestiones
        $rs_gestiones = $this->Gestiones->find('all')->where(['ticket_id' => $id])->order(['id' => 'asc'])->toArray();
        $rs_lis_gestiones = array();
        $rs_all_gestiones = array();
        if(is_array($rs_gestiones) && count($rs_gestiones)>0){
            foreach ($rs_gestiones as $value) {
                //var_dump($value->id); die;
                $rs_lis_gestiones['id'] = $value->id;
                $rs_lis_gestiones['comentarios'] = $value->comentarios;
                $rs_lis_gestiones['created'] = $value->created;
                $rs_gestiones_archive = $this->GestioneArchives->find('all')->where(['gestione_id' => $value->id])->toArray();
                if(is_array($rs_gestiones_archive) && count($rs_gestiones_archive)>0){
                    $rs_list_archive = $this->Archives->find('all')->where(['id' => $rs_gestiones_archive[0]->archive_id])->toArray();
                    $rs_lis_gestiones['file_name']  = $rs_list_archive[0]->name;
                    $rs_lis_gestiones['file_path']  = $rs_list_archive[0]->url;
                }else{
                    $rs_lis_gestiones['file_name']  = '';
                    $rs_lis_gestiones['file_path']  = '';
                }
                array_push($rs_all_gestiones, $rs_lis_gestiones);
            }
        }
        $this->set('rs_gestiones', $rs_all_gestiones);

        $this->set('ticket', $ticket);
        $this->set('ticketArchive', $ticketArchive);
        $this->set('archive', $archive);
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      
        $ticket = $this->Tickets->newEntity();
        $this->loadModel('correos');
        $this->loadModel('Users');
        $session = $this->request->session();        
        
        //carga controlador uploads
        $Uploads = new UploadsController;
        $this->loadModel('TicketArchives');
        $this->loadModel('Archives');
        $getTicketArchives = array();
        $getArchives = array();
        
        if ($this->request->is('post')) {    
                  
            $this->request->data['user_id']  = $this->_getUser();
            
            //var_dump($this->request->getData()); die;
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());

            if ($this->Tickets->save($ticket)) {
                //echo '<script> alert("guardar ticket") </script>'; 
                //subida de archivo
                if (isset($this->request['data']['adjunto']) && $this->request['data']['adjunto']['name']!="") {
                    $adjunto  = $this->request['data']['adjunto'];
                    $resultadoSubida = $Uploads->compruebaFichero($adjunto);

                    if ($resultadoSubida[0]){
                        //upload archive
                        $adjunto_ticket  = $Uploads->subidaArchivo($ticket->id,'adjunto_ticket',$adjunto);
                        //save tabla Archive
                        $getArchives['name']  = $adjunto_ticket['name_file'];
                        $getArchives['url']  = $adjunto_ticket['path_file'];
                        $getArchives['active']  = 1;

                        $archive = $this->Archives->newEntity();
                        $archive = $this->Archives->patchEntity($archive, $getArchives);
                        if($this->Archives->save($archive)){
                            //guardar relacion archivo ticket
                            $getTicketArchives['ticket_id'] = $ticket->id;
                            $getTicketArchives['archive_id'] = $archive->id;
                            $ticketArchive = $this->TicketArchives->newEntity();
                            $ticketArchive = $this->TicketArchives->patchEntity($ticketArchive, $getTicketArchives);
                            $this->TicketArchives->save($ticketArchive);
                        }
                    }
                }
                
               

                //$this->Flash->success(__('The ticket has been saved.'));
                $sub_sistema_id = isset($this->request->data['sub_sistema_id']) && $this->request->data['sub_sistema_id']!='' ? $this->request->data['sub_sistema_id'] : '';
                //var_dump($sub_sistema_id); die;
               ;    
                if($sub_sistema_id=='18'){
                    $this->Flash->default(__('Favor completar la información asociada al despacho!'));
                    $session->write('ticket_id', $ticket->id); 
                    return $this->redirect('/despachos/add/'.$ticket->id);
                }else{
                    //correo envio
                         echo '<script> alert("MANDO  EL CORREO") </script>';  
                    $descripcion = "<b>Ticket N°: ".$ticket->id."</b><br><br><b>Asunto:</b> ".$this->request->data['asunto']."<br><br><b>Descripción</b>: ".$this->request->data['descripcion'];
                    $this->correos->enviarcorreo(1, $ticket->id,$this->_getUserNameAsig($this->request->data['user_asignado_id']),$this->_getUserEmailAsig($this->request->data['user_asignado_id']), $descripcion);

                    var_dump($this->_getUserEmailAsig($this->request->data['user_asignado_id'])); die;
                     
                    $this->Flash->success(__('Su ticket fue creado correctamente!'));
                    return $this->redirect(['action' => 'index']);
                    
                }
                
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        
        $sistemas = $this->Tickets->Sistemas->find('list', ['limit' => 200]);
        $subSistemas = $this->Tickets->subSistemas->find('list', ['limit' => 200]);

        $users = $this->Users->find('list', ['limit' => 200]);
        $userAsignados = $this->Users->find('all')->where(['active' => 1])->order(['name' => 'ASC'])->toArray();
        
        $this->set(compact('ticket', 'sistemas', 'users', 'userAsignados', 'subSistemas'));
        //$this->set('userAsignados', $userAsignados);
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Users');
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Despachos']
        ]);
        $session = $this->request->session();   

        //var_dump($ticket->user_asignado_id); die;

        if(is_numeric($id)){
            //$ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            //var_dump($ticket->active); die;
            if($ticket->active=='1'){
                $ticket->active  = 2;
                $this->Tickets->save($ticket);
                
            }elseif($ticket->active=='0' || $ticket->active=='3'){
                return $this->redirect(['action' => 'index']);
            }
        }
        //carga controlador uploads
        $Uploads = new UploadsController;
        $this->loadModel('TicketArchives');
        $this->loadModel('Archives');
        $this->loadModel('correos');

        $getTicketArchives = array();
        $getArchives = array();


        //listar archivos

        $rs_archive = array();
        $rs_ticketArchive = array();

        $rs_ticketArchive = $this->TicketArchives->find('all')->where(['ticket_id' => $ticket->id ])->toArray();
        if(is_array($rs_ticketArchive) && count($rs_ticketArchive)>0){
            $rs_archive = $this->Archives->find('all')->where(['id' => $rs_ticketArchive[0]->archive_id ])->toArray();
        }

        if ($this->request->is(['patch', 'post', 'put'])) {

            //var_dump($ticket->user_asignado_id.' - '.$this->request->data['user_asignado_id']); die;
            if($ticket->user_asignado_id!=$this->request->data['user_asignado_id']){
                
                $ticket->active  = 4;

                //correo envio
                $descripcion = "<b>Ticket N°: ".$id."</b><br><br><b>Descripción: </b>: ".$this->request->data['descripcion'];
                //var_dump($this->Tickets); die;
                $this->correos->enviarcorreo(4, $id,$this->_getUserNameAsig($this->request->data['user_asignado_id']),$this->_getUserEmailAsig($this->request->data['user_asignado_id']), $descripcion);
            }
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());

            if ($this->Tickets->save($ticket)) {
                //subida de archivo
                if (isset($this->request['data']['adjunto']) && $this->request['data']['adjunto']['name']!="") {
                    $adjunto  = $this->request['data']['adjunto'];
                    $resultadoSubida = $Uploads->compruebaFichero($adjunto);

                    if ($resultadoSubida[0]){
                        //upload archive
                        $adjunto_ticket  = $Uploads->subidaArchivo($ticket->id,'adjunto_ticket',$adjunto);
                        //save tabla Archive
                        $getArchives['name']  = $adjunto_ticket['name_file'];
                        $getArchives['url']  = $adjunto_ticket['path_file'];
                        $getArchives['active']  = 1;

                        $rs_ticketArchive = $this->TicketArchives->find('all')->where(['ticket_id' => $id])->toArray();
                        
                        if(is_array($rs_ticketArchive) && count($rs_ticketArchive)>0){
                            $archive = $this->Archives->get($rs_ticketArchive[0]['id']);
                            $archive->name = $getArchives['name'];
                            $archive->url  = $getArchives['url'];
                            $this->Archives->save($archive);
                        }else{
                            $archive = $this->Archives->newEntity();
                            $archive = $this->Archives->patchEntity($archive, $getArchives);
                            if($this->Archives->save($archive)){
                                //guardar relacion archivo ticket
                                $getTicketArchives['ticket_id'] = $ticket->id;
                                $getTicketArchives['archive_id'] = $archive->id;
                                $ticketArchive = $this->TicketArchives->newEntity();
                                $ticketArchive = $this->TicketArchives->patchEntity($ticketArchive, $getTicketArchives);
                                $this->TicketArchives->save($ticketArchive);
                            }
                        }

                    }
                }
                
                
                //$this->Flash->success(__('The ticket has been saved.'));
                $sub_sistema_id = isset($this->request->data['sub_sistema_id']) && $this->request->data['sub_sistema_id']!='' ? $this->request->data['sub_sistema_id'] : '';
                //var_dump($sub_sistema_id); die;
                if($sub_sistema_id=='18'){
                    $this->Flash->default(__('Favor completar la información asociada al despacho!'));
                    $session->write('ticket_id', $ticket->id); 
                    if(isset($ticket->despachos[0]->id) && $ticket->despachos[0]->id!=''){
                        return $this->redirect('/despachos/edit/'.$ticket->despachos[0]->id);
                    }else{
                        return $this->redirect('/despachos/add/'.$ticket->id);
                    }
                    
                }else{
                    
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $sistemas = $this->Tickets->Sistemas->find('list', ['limit' => 200]);
        $users = $this->Tickets->Users->find('list', [ 'keyField' => 'id', 'valueField' => 'username']);
        $userAsignados = $this->Users->find('all')->where(['active' => 1])->order(['name' => 'ASC'])->toArray();
        $subSistemas = $this->Tickets->subSistemas->find('list', ['limit' => 200]);

        $this->set(compact('ticket', 'sistemas', 'users', 'userAsignados', 'subSistemas'));
        $this->set('rs_archive', $rs_archive);
        $this->set('rs_ticketArchive', $rs_ticketArchive);
        $this->set('_serialize', ['ticket']);
    }


    public function gestion($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => []
        ]);



        $this->loadModel('Gestiones');

        $gestione = $this->Gestiones->newEntity();

        $Uploads = new UploadsController;
        $this->loadModel('Gestiones');
        $this->loadModel('GestioneArchives');
        $this->loadModel('TicketArchives');
        $this->loadModel('Archives');
        $this->loadModel('Users');
        $this->loadModel('correos');

        $rs_archive = array();
        $ticketArchive = array();

        $ticketArchive = $this->TicketArchives->find('all')->where(['ticket_id' => $id ])->toArray();
        if(is_array($ticketArchive) && count($ticketArchive)>0){
            $rs_archive = $this->Archives->find('all')->where(['id' => $ticketArchive[0]->archive_id ])->toArray();
        }

        

        if(is_numeric($id)){
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            //var_dump($ticket->active); die;
            if($ticket->active=='1'){
                $ticket->active  = 2;
                $this->Tickets->save($ticket);
            }elseif($ticket->active=='0' || $ticket->active=='3'){
                $this->Flash->error(__('No puede tener acceso al ticket!'));
                return $this->redirect(['action' => 'index']);
            }/*elseif($ticket->user_asignado_id!=$this->_getUser()){
                $this->Flash->error(__('No puede tener acceso al ticket!'));
                return $this->redirect(['action' => 'index']);
            }*/
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            //agrego el comentario de gestiones
            $rs_datos = $this->request->data;
            $getGestiones['ticket_id'] = $id;
            $getGestiones['comentarios'] = $rs_datos['comentarios'];

            $gestione = $this->Gestiones->patchEntity($gestione, $getGestiones);
            $this->Gestiones->save($gestione);
            //subida de archivos
            if (isset($this->request['data']['adjunto']) && $this->request['data']['adjunto']['name']!="") {
                $adjunto  = $this->request['data']['adjunto'];
                $resultadoSubida = $Uploads->compruebaFichero($adjunto);

                if ($resultadoSubida[0]){
                    //upload archive
                    $adjunto_ticket  = $Uploads->subidaArchivo($gestione->id,'adjunto_gestion',$adjunto);
                    //save tabla Archive
                    $getArchives['name']  = $adjunto_ticket['name_file'];
                    $getArchives['url']  = $adjunto_ticket['path_file'];
                    $getArchives['active']  = 1;

                    $archive = $this->Archives->newEntity();
                    $archive = $this->Archives->patchEntity($archive, $getArchives);
                    if($this->Archives->save($archive)){
                        //guardar relacion archivo ticket
                        $getGestioneArchives['gestione_id'] = $gestione->id;
                        $getGestioneArchives['archive_id'] = $archive->id;
                        $gestioneArchive = $this->GestioneArchives->newEntity();
                        $gestioneArchive = $this->GestioneArchives->patchEntity($gestioneArchive, $getGestioneArchives);
                        $this->GestioneArchives->save($gestioneArchive);
                    }
                }
            }

            $descripcion = "<b>Ticket N°: ".$id."</b><br><br><b>Comentarios: </b>: ".$this->request->data['comentarios'];
            $this->correos->enviarcorreo(7, $id,$this->_getUserNameAsig($ticket->user_id),$this->_getUserEmailAsig($ticket->user_id), $descripcion);
        }
        $sistemas = $this->Tickets->Sistemas->find('list', ['limit' => 200]);
        $users = $this->Tickets->Users->find('list', [ 'keyField' => 'id', 'valueField' => 'username']);
        $userAsignados = $this->Users->find('list' , [ 'keyField' => 'id', 'valueField' => 'username']);
        $subSistemas = $this->Tickets->SubSistemas->find('list', ['limit' => 200]);

        //gestiones
        $rs_gestiones = $this->Gestiones->find('all')->where(['ticket_id' => $id])->order(['id' => 'asc'])->toArray();
        $rs_lis_gestiones = array();
        $rs_all_gestiones = array();
        if(is_array($rs_gestiones) && count($rs_gestiones)>0){
            foreach ($rs_gestiones as $value) {
                //var_dump($value->id); die;
                $rs_lis_gestiones['id'] = $value->id;
                $rs_lis_gestiones['comentarios'] = $value->comentarios;
                $rs_lis_gestiones['created'] = $value->created;
                $rs_gestiones_archive = $this->GestioneArchives->find('all')->where(['gestione_id' => $value->id])->toArray();
                if(is_array($rs_gestiones_archive) && count($rs_gestiones_archive)>0){
                    $rs_list_archive = $this->Archives->find('all')->where(['id' => $rs_gestiones_archive[0]->archive_id])->toArray();
                    $rs_lis_gestiones['file_name']  = $rs_list_archive[0]->name;
                    $rs_lis_gestiones['file_path']  = $rs_list_archive[0]->url;
                }else{
                    $rs_lis_gestiones['file_name']  = '';
                    $rs_lis_gestiones['file_path']  = '';
                }
                array_push($rs_all_gestiones, $rs_lis_gestiones);
            }
        }
        $this->set('rs_gestiones', $rs_all_gestiones);

        ///demas rs

        $this->set(compact('ticket', 'sistemas', 'users', 'userAsignados', 'subSistemas'));
        $this->set(compact('gestione'));
        $this->set('ticketArchive', $ticketArchive);
        $this->set('rs_archive', $rs_archive);
        $this->set('_serialize', ['ticket']);
    }


    public function anular($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => []
        ]);

        $this->loadModel('Gestiones');

        $gestione = $this->Gestiones->newEntity();

        $Uploads = new UploadsController;
        $this->loadModel('Gestiones');
        $this->loadModel('GestioneArchives');
        $this->loadModel('TicketArchives');
        $this->loadModel('Archives');
        $this->loadModel('Users');

        

        $rs_archive = array();
        $ticketArchive = array();

        $ticketArchive = $this->TicketArchives->find('all')->where(['ticket_id' => $id ])->toArray();
        if(is_array($ticketArchive) && count($ticketArchive)>0){
            $rs_archive = $this->Archives->find('all')->where(['id' => $ticketArchive[0]->archive_id ])->toArray();
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            //agrego el comentario de gestiones
            $rs_datos = $this->request->data;
            $getGestiones['ticket_id'] = $id;
            $getGestiones['comentarios'] = $rs_datos['comentarios'];

            $gestione = $this->Gestiones->patchEntity($gestione, $getGestiones);
            $this->Gestiones->save($gestione);
            //subida de archivos
            if (isset($this->request['data']['adjunto']) && $this->request['data']['adjunto']['name']!="") {
                $adjunto  = $this->request['data']['adjunto'];
                $resultadoSubida = $Uploads->compruebaFichero($adjunto);

                if ($resultadoSubida[0]){
                    //upload archive
                    $adjunto_ticket  = $Uploads->subidaArchivo($gestione->id,'adjunto_gestion',$adjunto);
                    //save tabla Archive
                    $getArchives['name']  = $adjunto_ticket['name_file'];
                    $getArchives['url']  = $adjunto_ticket['path_file'];
                    $getArchives['active']  = 1;

                    $archive = $this->Archives->newEntity();
                    $archive = $this->Archives->patchEntity($archive, $getArchives);
                    if($this->Archives->save($archive)){
                        //guardar relacion archivo ticket
                        $getGestioneArchives['gestione_id'] = $gestione->id;
                        $getGestioneArchives['archive_id'] = $archive->id;
                        $gestioneArchive = $this->GestioneArchives->newEntity();
                        $gestioneArchive = $this->GestioneArchives->patchEntity($gestioneArchive, $getGestioneArchives);
                        $this->GestioneArchives->save($gestioneArchive);
                    }
                }
            }
        }
        $sistemas = $this->Tickets->Sistemas->find('list', ['limit' => 200]);
        $subSistemas = $this->Tickets->SubSistemas->find('list', ['limit' => 200]);
        $users = $this->Tickets->Users->find('list', [ 'keyField' => 'id', 'valueField' => 'username']);
        $userAsignados = $this->Users->find('list' , [ 'keyField' => 'id', 'valueField' => 'username']);

        //gestiones
        $rs_gestiones = $this->Gestiones->find('all')->where(['ticket_id' => $id])->order(['id' => 'asc'])->toArray();
        $rs_lis_gestiones = array();
        $rs_all_gestiones = array();
        if(is_array($rs_gestiones) && count($rs_gestiones)>0){
            foreach ($rs_gestiones as $value) {
                //var_dump($value->id); die;
                $rs_lis_gestiones['id'] = $value->id;
                $rs_lis_gestiones['comentarios'] = $value->comentarios;
                $rs_lis_gestiones['created'] = $value->created;
                $rs_gestiones_archive = $this->GestioneArchives->find('all')->where(['gestione_id' => $value->id])->toArray();
                if(is_array($rs_gestiones_archive) && count($rs_gestiones_archive)>0){
                    $rs_list_archive = $this->Archives->find('all')->where(['id' => $rs_gestiones_archive[0]->archive_id])->toArray();
                    $rs_lis_gestiones['file_name']  = $rs_list_archive[0]->name;
                    $rs_lis_gestiones['file_path']  = $rs_list_archive[0]->url;
                }else{
                    $rs_lis_gestiones['file_name']  = '';
                    $rs_lis_gestiones['file_path']  = '';
                }
                array_push($rs_all_gestiones, $rs_lis_gestiones);
            }
        }
        $this->set('rs_gestiones', $rs_all_gestiones);

        ///demas rs

        $this->set(compact('ticket', 'sistemas', 'users', 'userAsignados', 'subSistemas'));
        $this->set(compact('gestione'));
        $this->set('ticketArchive', $ticketArchive);
        $this->set('rs_archive', $rs_archive);
        $this->set('_serialize', ['ticket']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    //funcion que cambia el estado del ticket
    public function delete($id = null, $estado  = null)
    {
        if(is_numeric($estado) && is_numeric($id)){
            //$this->request->allowMethod(['post', 'delete']);
            $ticket = $this->Tickets->get($id);
           // var_dump($ticket); die;
            $ticket->active = $estado;
            //var_dump($ticket); die;
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been deleted.'));
            } else {
                $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }
        
    }

    //funcion que cambia el estado del ticket
    public function cerrar($id = null, $estado  = null)
    {   
        $this->loadModel('Gestiones');

        $gestione = $this->Gestiones->newEntity();

        $Uploads = new UploadsController;
        $this->loadModel('Gestiones');
        $this->loadModel('GestioneArchives');
        $this->loadModel('TicketArchives');
        $this->loadModel('Archives');
        $this->loadModel('Users');
        $this->loadModel('correos');

        if(is_numeric($estado) && is_numeric($id)){
            //$this->request->allowMethod(['post', 'delete']);
            $ticket = $this->Tickets->get($id);
           // var_dump($ticket); die;
            $ticket->active = $estado;
            //var_dump($ticket); die;
            if ($this->Tickets->save($ticket)) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    //agrego el comentario de gestiones
                    $rs_datos = $this->request->data;
                    $getGestiones['ticket_id'] = $id;
                    $getGestiones['comentarios'] = $rs_datos['comentarios'];

                    $gestione = $this->Gestiones->patchEntity($gestione, $getGestiones);
                    $this->Gestiones->save($gestione);
                    //subida de archivos
                    if (isset($this->request['data']['adjunto']) && $this->request['data']['adjunto']['name']!="") {
                        $adjunto  = $this->request['data']['adjunto'];
                        $resultadoSubida = $Uploads->compruebaFichero($adjunto);

                        if ($resultadoSubida[0]){
                            //upload archive
                            $adjunto_ticket  = $Uploads->subidaArchivo($gestione->id,'adjunto_gestion',$adjunto);
                            //save tabla Archive
                            $getArchives['name']  = $adjunto_ticket['name_file'];
                            $getArchives['url']  = $adjunto_ticket['path_file'];
                            $getArchives['active']  = 1;

                            $archive = $this->Archives->newEntity();
                            $archive = $this->Archives->patchEntity($archive, $getArchives);
                            if($this->Archives->save($archive)){
                                //guardar relacion archivo ticket
                                $getGestioneArchives['gestione_id'] = $gestione->id;
                                $getGestioneArchives['archive_id'] = $archive->id;
                                $gestioneArchive = $this->GestioneArchives->newEntity();
                                $gestioneArchive = $this->GestioneArchives->patchEntity($gestioneArchive, $getGestioneArchives);
                                $this->GestioneArchives->save($gestioneArchive);
                            }
                        }
                    }

                    //correo envio
                    $descripcion = "<b>Ticket N°: ".$id."</b><br><br><b>Comentarios: </b>: ".$this->request->data['comentarios'];
                    //var_dump($this->Tickets); die;
                    $this->correos->enviarcorreo(2, $id,$this->_getUserNameAsig($ticket->user_id),$this->_getUserEmailAsig($ticket->user_id), $descripcion);
                }
            } else {
                $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'asignado']);
        }
        
    }

    //funcion que cambia de estado el ticket
    public function anularTicket($id = null, $estado  = null)
    {   
        $this->loadModel('Gestiones');

        $gestione = $this->Gestiones->newEntity();

        $Uploads = new UploadsController;
        $this->loadModel('Gestiones');
        $this->loadModel('GestioneArchives');
        $this->loadModel('TicketArchives');
        $this->loadModel('Archives');
        $this->loadModel('Users');
        $this->loadModel('correos');

        if(is_numeric($estado) && is_numeric($id)){
            //$this->request->allowMethod(['post', 'delete']);
            $ticket = $this->Tickets->get($id);
           // var_dump($ticket); die;
            $ticket->active = $estado;
            //var_dump($ticket); die;
            if ($this->Tickets->save($ticket)) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    //agrego el comentario de gestiones
                    $rs_datos = $this->request->data;
                    $getGestiones['ticket_id'] = $id;
                    $getGestiones['comentarios'] = $rs_datos['comentarios'];

                    $gestione = $this->Gestiones->patchEntity($gestione, $getGestiones);
                    $this->Gestiones->save($gestione);
                    //subida de archivos
                    if (isset($this->request['data']['adjunto']) && $this->request['data']['adjunto']['name']!="") {
                        $adjunto  = $this->request['data']['adjunto'];
                        $resultadoSubida = $Uploads->compruebaFichero($adjunto);

                        if ($resultadoSubida[0]){
                            //upload archive
                            $adjunto_ticket  = $Uploads->subidaArchivo($gestione->id,'adjunto_gestion',$adjunto);
                            //save tabla Archive
                            $getArchives['name']  = $adjunto_ticket['name_file'];
                            $getArchives['url']  = $adjunto_ticket['path_file'];
                            $getArchives['active']  = 1;

                            $archive = $this->Archives->newEntity();
                            $archive = $this->Archives->patchEntity($archive, $getArchives);
                            if($this->Archives->save($archive)){
                                //guardar relacion archivo ticket
                                $getGestioneArchives['gestione_id'] = $gestione->id;
                                $getGestioneArchives['archive_id'] = $archive->id;
                                $gestioneArchive = $this->GestioneArchives->newEntity();
                                $gestioneArchive = $this->GestioneArchives->patchEntity($gestioneArchive, $getGestioneArchives);
                                $this->GestioneArchives->save($gestioneArchive);
                            }
                        }
                    }
                    //correo envio
                    $descripcion = "<b>Ticket N°: ".$id."</b><br><br><b>Comentarios: </b>: ".$this->request->data['comentarios'];
                    //var_dump($this->Tickets); die;
                    if($estado=='0'){
                        $this->correos->enviarcorreo(3, $id,$this->_getUserNameAsig($ticket->user_asignado_id),$this->_getUserEmailAsig($ticket->user_asignado_id), $descripcion);
                    }elseif($estado=='5'){
                        $this->correos->enviarcorreo(5, $id,$this->_getUserNameAsig($ticket->user_asignado_id),$this->_getUserEmailAsig($ticket->user_asignado_id), $descripcion);
                    }elseif($estado=='6'){
                        $this->correos->enviarcorreo(6, $id,$this->_getUserNameAsig($ticket->user_asignado_id),$this->_getUserEmailAsig($ticket->user_asignado_id), $descripcion);
                    }
                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
            }
            
        }
        
    }

    //funcion que muestra el resumen de los tickets 
    public function home(){
        $rs_all = $this->Tickets->find('all')->where(['user_asignado_id' => $this->_getUser()])->toArray();
        $rs_abierto = $this->Tickets->find('all')->where(['active' => 1, 'user_asignado_id' => $this->_getUser()])->toArray();
        $rs_anulado = $this->Tickets->find('all')->where(['active' => 0, 'user_asignado_id' => $this->_getUser()])->toArray();
        $rs_cerrado = $this->Tickets->find('all')->where(['active' => 3, 'user_asignado_id' => $this->_getUser()])->toArray();
        $rs_cursado = $this->Tickets->find('all')->where(['active' => 2, 'user_asignado_id' => $this->_getUser()])->toArray();
        $rs_asignado = $this->Tickets->find('all')->where(['active' => 4, 'user_asignado_id' => $this->_getUser()])->toArray();
        $rs_rechazado = $this->Tickets->find('all')->where(['active' => 5, 'user_asignado_id' => $this->_getUser()])->toArray();
        $rs_aprobado = $this->Tickets->find('all')->where(['active' => 6, 'user_asignado_id' => $this->_getUser()])->toArray();
        
        $this->set('rs_all', count($rs_all));
        $this->set('rs_abierto', count($rs_abierto));
        $this->set('rs_anulado', count($rs_anulado));
        $this->set('rs_cerrado', count($rs_cerrado));
        $this->set('rs_cursado', count($rs_cursado));
        $this->set('rs_asignado', count($rs_asignado));
        $this->set('rs_rechazado', count($rs_rechazado));
        $this->set('rs_aprobado', count($rs_aprobado));

        $rs_all1 = $this->Tickets->find('all')->where(['user_id' => $this->_getUser()])->toArray();
        $rs_abierto1 = $this->Tickets->find('all')->where(['active' => 1, 'user_id' => $this->_getUser()])->toArray();
        $rs_anulado1 = $this->Tickets->find('all')->where(['active' => 0, 'user_id' => $this->_getUser()])->toArray();
        $rs_cerrado1 = $this->Tickets->find('all')->where(['active' => 3, 'user_id' => $this->_getUser()])->toArray();
        $rs_cursado1 = $this->Tickets->find('all')->where(['active' => 2, 'user_id' => $this->_getUser()])->toArray();
        $rs_asignado1 = $this->Tickets->find('all')->where(['active' => 4, 'user_id' => $this->_getUser()])->toArray();
        $rs_rechazado1 = $this->Tickets->find('all')->where(['active' => 5, 'user_id' => $this->_getUser()])->toArray();
        $rs_aprobado1  = $this->Tickets->find('all')->where(['active' => 6, 'user_id' => $this->_getUser()])->toArray();
        
        $this->set('rs_all1', count($rs_all1));
        $this->set('rs_abierto1', count($rs_abierto1));
        $this->set('rs_anulado1', count($rs_anulado1));
        $this->set('rs_cerrado1', count($rs_cerrado1));
        $this->set('rs_cursado1', count($rs_cursado1));
        $this->set('rs_asignado1', count($rs_asignado1));
        $this->set('rs_rechazado1', count($rs_rechazado1));
        $this->set('rs_aprobado1', count($rs_aprobado1));

    }

    public function listUserTicket(){

        $this->loadModel('Tickets');


        $conn = ConnectionManager::get('default');
        //anulados
        $sql_0 = "
            SELECT 
                name, 
                sum(nulo) as nulo, 
                sum(abierto) as abierto,  
                sum(pendiente) as pendiente,
                sum(reasignado) as reasignado,
                sum(cerrados) as cerrados,
                sum(rechazado) as rechazado,
                sum(aprobado) as aprobado

            FROM `vw_resumen_ticket`
            group by name
        ";

        $stmt_0 = $conn->execute($sql_0);
        $rs_0 = $stmt_0->fetchAll('assoc');

        $this->set('rs_0', $rs_0);

    }

    public function loadSubSistema(){
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        
        if($this->request->is('post')){
            $this->loadModel('SubSistemas');
            $sistema_id  = $this->request->data['sistema_id'];
            $sub_sistema_id_hd  = $this->request->data['sub_sistema_id_hd'];
            $rs_sistemas = $this->SubSistemas->find('all')->where(['sistema_id' => $sistema_id])->order(['name' => 'ASC'])->toarray();

            if(is_array($rs_sistemas) && count($rs_sistemas)>0){
                $result = true;
                $html .= '<option value=""></option>';
                foreach ($rs_sistemas as $row) {
                    if($sub_sistema_id_hd==$row['id']){
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
