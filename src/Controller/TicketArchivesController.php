<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TicketArchives Controller
 *
 * @property \App\Model\Table\TicketArchivesTable $TicketArchives
 */
class TicketArchivesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tickets', 'Archives']
        ];
        $ticketArchives = $this->paginate($this->TicketArchives);

        $this->set(compact('ticketArchives'));
        $this->set('_serialize', ['ticketArchives']);
    }

    /**
     * View method
     *
     * @param string|null $id Ticket Archive id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticketArchive = $this->TicketArchives->get($id, [
            'contain' => ['Tickets', 'Archives']
        ]);

        $this->set('ticketArchive', $ticketArchive);
        $this->set('_serialize', ['ticketArchive']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticketArchive = $this->TicketArchives->newEntity();
        if ($this->request->is('post')) {
            $ticketArchive = $this->TicketArchives->patchEntity($ticketArchive, $this->request->getData());
            if ($this->TicketArchives->save($ticketArchive)) {
                $this->Flash->success(__('The ticket archive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket archive could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketArchives->Tickets->find('list', ['limit' => 200]);
        $archives = $this->TicketArchives->Archives->find('list', ['limit' => 200]);
        $this->set(compact('ticketArchive', 'tickets', 'archives'));
        $this->set('_serialize', ['ticketArchive']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket Archive id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticketArchive = $this->TicketArchives->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticketArchive = $this->TicketArchives->patchEntity($ticketArchive, $this->request->getData());
            if ($this->TicketArchives->save($ticketArchive)) {
                $this->Flash->success(__('The ticket archive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket archive could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketArchives->Tickets->find('list', ['limit' => 200]);
        $archives = $this->TicketArchives->Archives->find('list', ['limit' => 200]);
        $this->set(compact('ticketArchive', 'tickets', 'archives'));
        $this->set('_serialize', ['ticketArchive']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket Archive id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticketArchive = $this->TicketArchives->get($id);
        if ($this->TicketArchives->delete($ticketArchive)) {
            $this->Flash->success(__('The ticket archive has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket archive could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
