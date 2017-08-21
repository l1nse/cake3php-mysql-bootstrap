<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TicketControl Controller
 *
 * @property \App\Model\Table\TicketControlTable $TicketControl
 */
class TicketControlController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ticketControl = $this->paginate($this->TicketControl);

        $this->set(compact('ticketControl'));
        $this->set('_serialize', ['ticketControl']);
    }

    /**
     * View method
     *
     * @param string|null $id Ticket Control id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticketControl = $this->TicketControl->get($id, [
            'contain' => []
        ]);

        $this->set('ticketControl', $ticketControl);
        $this->set('_serialize', ['ticketControl']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticketControl = $this->TicketControl->newEntity();
        if ($this->request->is('post')) {
            $ticketControl = $this->TicketControl->patchEntity($ticketControl, $this->request->getData());
            if ($this->TicketControl->save($ticketControl)) {
                $this->Flash->success(__('The ticket control has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket control could not be saved. Please, try again.'));
        }
        $this->set(compact('ticketControl'));
        $this->set('_serialize', ['ticketControl']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket Control id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticketControl = $this->TicketControl->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticketControl = $this->TicketControl->patchEntity($ticketControl, $this->request->getData());
            if ($this->TicketControl->save($ticketControl)) {
                $this->Flash->success(__('The ticket control has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket control could not be saved. Please, try again.'));
        }
        $this->set(compact('ticketControl'));
        $this->set('_serialize', ['ticketControl']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket Control id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticketControl = $this->TicketControl->get($id);
        if ($this->TicketControl->delete($ticketControl)) {
            $this->Flash->success(__('The ticket control has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket control could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
