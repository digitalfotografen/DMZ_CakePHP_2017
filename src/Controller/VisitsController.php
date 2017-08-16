<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Visits Controller
 *
 * @property \App\Model\Table\VisitsTable $Visits
 *
 * @method \App\Model\Entity\Visit[] paginate($object = null, array $settings = [])
 */
class VisitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Cities']
        ];
        $visits = $this->paginate($this->Visits);

        $this->set(compact('visits'));
        $this->set('_serialize', ['visits']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visit = $this->Visits->get($id, [
            'contain' => ['Users', 'Cities']
        ]);

        $this->set('visit', $visit);
        $this->set('_serialize', ['visit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visit = $this->Visits->newEntity();
        if ($this->request->is('post')) {
            $visit = $this->Visits->patchEntity($visit, $this->request->getData());
            if ($this->Visits->save($visit)) {
                $this->Flash->success(__('The visit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The visit could not be saved. Please, try again.'));
        }
        $users = $this->Visits->Users->find('list', ['limit' => 200]);
        $cities = $this->Visits->Cities->find('list', ['limit' => 200]);
        $this->set(compact('visit', 'users', 'cities'));
        $this->set('_serialize', ['visit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visit = $this->Visits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visit = $this->Visits->patchEntity($visit, $this->request->getData());
            if ($this->Visits->save($visit)) {
                $this->Flash->success(__('The visit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The visit could not be saved. Please, try again.'));
        }
        $users = $this->Visits->Users->find('list', ['limit' => 200]);
        $cities = $this->Visits->Cities->find('list', ['limit' => 200]);
        $this->set(compact('visit', 'users', 'cities'));
        $this->set('_serialize', ['visit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visit = $this->Visits->get($id);
        if ($this->Visits->delete($visit)) {
            $this->Flash->success(__('The visit has been deleted.'));
        } else {
            $this->Flash->error(__('The visit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
