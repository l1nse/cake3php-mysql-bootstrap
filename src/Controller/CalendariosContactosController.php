<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * CalendariosContactos Controller
 *
 * @property \App\Model\Table\CalendariosContactosTable $CalendariosContactos
 */
class CalendariosContactosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contactos']
        ];
        $calendariosContactos = $this->paginate($this->CalendariosContactos);

        $this->set(compact('calendariosContactos'));
        $this->set('_serialize', ['calendariosContactos']);
    }

    /**
     * View method
     *
     * @param string|null $id Calendarios Contacto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calendariosContacto = $this->CalendariosContactos->get($id, [
            'contain' => ['Contactos', 'Reunions']
        ]);

        $this->set('calendariosContacto', $calendariosContacto);
        $this->set('_serialize', ['calendariosContacto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $calendariosContacto = $this->CalendariosContactos->newEntity();
        if ($this->request->is('post')) {
            $calendariosContacto = $this->CalendariosContactos->patchEntity($calendariosContacto, $this->request->getData());
            if ($this->CalendariosContactos->save($calendariosContacto)) {
                $this->Flash->success(__('The calendarios contacto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calendarios contacto could not be saved. Please, try again.'));
        }
        $contactos = $this->CalendariosContactos->Contactos->find('list', ['limit' => 200]);
        $reunions = $this->CalendariosContactos->Reunions->find('list', ['limit' => 200]);
        $this->set(compact('calendariosContacto', 'contactos', 'reunions'));
        $this->set('_serialize', ['calendariosContacto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calendarios Contacto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $calendariosContacto = $this->CalendariosContactos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calendariosContacto = $this->CalendariosContactos->patchEntity($calendariosContacto, $this->request->getData());
            if ($this->CalendariosContactos->save($calendariosContacto)) {
                $this->Flash->success(__('The calendarios contacto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calendarios contacto could not be saved. Please, try again.'));
        }
        $contactos = $this->CalendariosContactos->Contactos->find('list', ['limit' => 200]);
        $reunions = $this->CalendariosContactos->Reunions->find('list', ['limit' => 200]);
        $this->set(compact('calendariosContacto', 'contactos', 'reunions'));
        $this->set('_serialize', ['calendariosContacto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calendarios Contacto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null , $idcalendario = null, $idempresa = null)
    {
        //$contacto = $this->CalendariosContactos->find('all')->where(['CalendariosContactos.contacto_id' => $id]);
        //$this->request->allowMethod(['post', 'delete']);
        if(is_numeric($id) && is_numeric($idcalendario) && is_numeric($idempresa))
        {
            $calendariosContacto = $this->CalendariosContactos->get($id);
            //var_dump($contacto); die;
            if ($this->CalendariosContactos->delete($calendariosContacto)) {
                $this->Flash->success(__('se borro el contacto correctamente.'));
            } else {
                $this->Flash->error(__('No se pudo borrar el contacto.'));
            }

            return $this->redirect(['controller' => 'calendarios' ,'action' => 'edit' , $idcalendario ,$idempresa]);    
        }else
        {
           return $this->redirect(['controller' => 'Users' , 'action' => 'home']);   
        }
        
    }

    
}
