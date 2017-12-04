<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JefeAreas Controller
 *
 * @property \App\Model\Table\JefeAreasTable $JefeAreas
 */
class JefeAreasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Areas', 'FichaPersonales' => array('Users')]
        ];

        


        

        $jefeAreas = $this->paginate($this->JefeAreas);

        $this->set(compact('jefeAreas'));
        $this->set('_serialize', ['jefeAreas']);
    }

    /**
     * View method
     *
     * @param string|null $id Jefe Area id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jefeArea = $this->JefeAreas->get($id, [
            'contain' => ['Areas' =>  array('Empresas'), 'FichaPersonales' => array('Users'),]
        ]);

        $this->set('jefeArea', $jefeArea);
        $this->set('_serialize', ['jefeArea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jefeArea = $this->JefeAreas->newEntity();
        if ($this->request->is('post')) {

            $jefeArea = $this->JefeAreas->patchEntity($jefeArea, $this->request->getData());

            $ficha =  $this->_getFichaFull($this->request->getData('users'));
            //var_dump($ficha); die;

            $usuario = $this->_getUserNameAsig($ficha->user_id);
             //var_dump($usuario); die;

              $name['name'] = $usuario; 
              $id_ficha['ficha_personale_id'] = $ficha->id;


                //Le pasamos los datos recogidos a ficha personal
                $jefeArea = $this->JefeAreas->patchEntity($jefeArea, $name);    
                $jefeArea = $this->JefeAreas->patchEntity($jefeArea, $id_ficha);



            if ($this->JefeAreas->save($jefeArea)) {
                $this->Flash->success(__('The jefe area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jefe area could not be saved. Please, try again.'));
        }
        $this->loadModel('Cargos');
        $areas = $this->Cargos->Areas->find('all')->contain(['Empresas'])->where(['Areas.active' => 1])->toArray();
        
        $fichaPersonales = $this->JefeAreas->FichaPersonales->find('list', ['limit' => 200]);

        $this->loadModel('Users');
        $users = $this->Users->find('all')->contain(['FichaPersonales'])->where(['active' => 1])->order(['name' => 'ASC'])->toArray();
        $this->set(compact('jefeArea', 'areas', 'fichaPersonales','users'));
        $this->set('_serialize', ['jefeArea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jefe Area id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jefeArea = $this->JefeAreas->get($id, [
            'contain' => [ 'Areas' , 'FichaPersonales' => array('Users')]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            //var_dump($this->request->getData()); die;

            $jefeArea = $this->JefeAreas->patchEntity($jefeArea, $this->request->getData());

            //$this->loadModel('FichaPersonales');
            //$fichaPersonales = $this->FichaPersonales->find('all')->where([$this->request->getData('users') == $fichaPersonales->user_id ]);
            //var_dump($fichaPersonales[''] ); die;
                

            if ($this->JefeAreas->save($jefeArea)) {
                $this->Flash->success(__('The jefe area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jefe area could not be saved. Please, try again.'));
        }
        // $areas = $this->JefeAreas->Areas->find('list', ['limit' => 200]);

        $this->loadModel('Cargos');
        $empresas = $this->Cargos->Areas->Empresas->find('all')
                        ->contain([])->toArray();

        $areas = $this->Cargos->Areas->find('all')->contain(['Empresas'])->where(['Areas.active' => 1])->toArray();

        //$fichaPersonales = $this->JefeAreas->FichaPersonales->find('all');

        $this->loadModel('Users');
        $users = $this->Users->find('all')->where(['active' => 1])->order(['name' => 'ASC'])->toArray();
         

        $this->set(compact('jefeArea', 'areas', 'users' , 'empresas'));
        $this->set('_serialize', ['jefeArea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jefe Area id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jefeArea = $this->JefeAreas->get($id);
        if ($this->JefeAreas->delete($jefeArea)) {
            $this->Flash->success(__('The jefe area has been deleted.'));
        } else {
            $this->Flash->error(__('The jefe area could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
