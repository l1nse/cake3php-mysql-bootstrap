<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reemisiones Controller
 *
 * @property \App\Model\Table\ReemisionesTable $Reemisiones
 */
class ReemisionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $reemisiones = $this->Reemisiones->find('all')->toArray();

        $this->set(compact('reemisiones'));
        $this->set('_serialize', ['reemisiones']);
    }

    /**
     * View method
     *
     * @param string|null $id Reemisione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reemisione = $this->Reemisiones->get($id, [
            'contain' => ['DetallesTikets', 'MensajesAerolineas']
        ]);

        $this->set('reemisione', $reemisione);
        $this->set('_serialize', ['reemisione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($contadortkt = null, $contadoral = null)
    {
        
        $reemisione = $this->Reemisiones->newEntity();
        if ($this->request->is('post')) {


            //var_dump($this->request->getData()); die;
            
            $reemisione = $this->Reemisiones->patchEntity($reemisione, $this->request->getData());
            if ($this->Reemisiones->save($reemisione)) {
                $idreemision = $reemisione->id;
                
                if($this->request->getData('contadoral')>0)
                {
                    $this->loadModel('MensajesAerolineas');

                    //tipo mensaje
                    
                    

                    for ($i=0; $i < $contadoral ; $i++) {                         
                            
                        $mensajesAerolineas = $this->MensajesAerolineas->newEntity();
                        $tipomensaje = $this->request->getData('tipomensaje'.$i);
                        $comentario = $this->request->getData('comentario'.$i);
                        $rs_mensaje['SSR'] = $tipomensaje;
                        $rs_mensaje['Mensaje'] = $comentario;
                        $rs_mensaje['reemisione_id'] = $idreemision;
                        $mensajesAerolineas = $this->MensajesAerolineas->patchEntity($mensajesAerolineas, $rs_mensaje);

                        if ($this->MensajesAerolineas->save($mensajesAerolineas)) {
                            //var_dump($comentario);
                            var_dump(" comentario aerolinea guardado".$i."<br>");
                        }else
                        {
                            $this->Flash->error__('No fue posible guardar el air');
                            return $this->redirect(['action' => 'add']);
                        }

                    }
                    
                }

                if($this->request->getData('contadortkt')>0)
                {
                    $this->loadModel('DetallesTikets');
                    //var_dump($this->request->getData("tktida"."2")); die;
                    for ($i=0; $i < $contadortkt ; $i++) { 
                        $detallesTikets = $this->DetallesTikets->newEntity();
                        $tktida = $this->request->getData('tktida'.$i);                        
                        $rs_tiket['tiket'] = $tktida;
                        $rs_tiket['reemisione_id'] = $idreemision;
                        $detallesTikets = $this->DetallesTikets->patchEntity($detallesTikets, $rs_tiket);

                        if ($this->DetallesTikets->save($detallesTikets)) {
                            var_dump($tktida."<br>");
                            var_dump("tiket ida guardado".$i."<br>");

                        }else
                        {
                            $this->Flash->error__('No fue posible guardar el air');
                            return $this->redirect(['action' => 'add']);

                        }

                        $detallesTikets = $this->DetallesTikets->newEntity();
                        $tktvuelta = $this->request->getData('tktvuelta'.$i);
                        $rs_tiket['tiket'] = $tktvuelta;
                        $rs_tiket['reemisione_id'] = $idreemision;
                        $detallesTikets = $this->DetallesTikets->patchEntity($detallesTikets, $rs_tiket);

                        if ($this->DetallesTikets->save($detallesTikets)) {
                            var_dump($tktvuelta."<br>");
                            var_dump("tiket vuelta guardado.".$i."<br>");
                        }else
                        {
                            $this->Flash->error__('No fue posible guardar el air');
                            return $this->redirect(['action' => 'add']);
                        }

                    }
                }

                $this->Flash->success(__('The reemisione has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reemisione could not be saved. Please, try again.'));
        }
        $this->set(compact('reemisione','contadortkt','contadoral'));
        $this->set('_serialize', ['reemisione']);
    }

    public function agregarDetalleTiket($contadortkt = null , $contadoral = null)
    {
        $contadortkt = $contadortkt + 1 ;
        return $this->redirect(['action' => 'add/' ,$contadortkt, $contadoral]);  
    }
    public function agregarComentarioAerolinea($contadortkt=null ,$contadoral = null)
    {
        if(!isset($contadortkt))
        {
            $contadortkt = 0;
        }
        $contadoral = $contadoral + 1 ;
        return $this->redirect(['action' => 'add/' ,$contadortkt,$contadoral]);  
    }

    /**
     * Edit method
     *
     * @param string|null $id Reemisione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reemisione = $this->Reemisiones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reemisione = $this->Reemisiones->patchEntity($reemisione, $this->request->getData());
            if ($this->Reemisiones->save($reemisione)) {
                $this->Flash->success(__('The reemisione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reemisione could not be saved. Please, try again.'));
        }
        $this->set(compact('reemisione'));
        $this->set('_serialize', ['reemisione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reemisione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reemisione = $this->Reemisiones->get($id);
        if ($this->Reemisiones->delete($reemisione)) {
            $this->Flash->success(__('The reemisione has been deleted.'));
        } else {
            $this->Flash->error(__('The reemisione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
