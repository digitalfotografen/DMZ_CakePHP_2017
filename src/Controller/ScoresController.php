<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\BadRequestException;

/**
 * Scores Controller
 *
 * @property \App\Model\Table\ScoresTable $Scores
 *
 * @method \App\Model\Entity\Score[] paginate($object = null, array $settings = [])
 */
class ScoresController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index', 'top']);
    }

    /**
     * Top method returns the top Scores
     * Only used for json calls
     *
     * @return \Cake\Http\Response|void
     */
    public function top($limit = 10){
        // Chec if request is json type, otherwise send 400 error
        if (!$this->request->is('json')){
            throw new BadRequestException(__('Only Json Requests allowed'));
        }

        // get the top scores
        $scores = $this->Scores->find()
            ->contain(['MyUsers'])
            ->order(['Scores.points' => 'DESC'])
            ->limit($limit);

        // use Collections::map to transform result array
        $scores = $scores->map(
            function($value, $key){
                return [
                    'points' => $value['points'],
                    'username' => $value['my_user']['username'],
                    'name' => $value['my_user']['first_name'] . ' ' . $value['my_user']['last_name']
                ];
            }
        );
        $this->set(compact('scores'));
        $this->set('_serialize', ['scores']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $scores = $this->paginate($this->Scores);

        $this->set(compact('scores'));
        $this->set('_serialize', ['scores']);
    }

    /**
     * View method
     *
     * @param string|null $id Score id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $score = $this->Scores->get($id, [
            'contain' => []
        ]);

        $this->set('score', $score);
        $this->set('_serialize', ['score']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $score = $this->Scores->newEntity();
        if ($this->request->is('post')) {
            $score = $this->Scores->patchEntity($score, $this->request->getData());
            if ($this->Scores->save($score)) {
                $this->Flash->success(__('The score has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The score could not be saved. Please, try again.'));
        }
        $this->set(compact('score'));
        $this->set('_serialize', ['score']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Score id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $score = $this->Scores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $score = $this->Scores->patchEntity($score, $this->request->getData());
            if ($this->Scores->save($score)) {
                $this->Flash->success(__('The score has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The score could not be saved. Please, try again.'));
        }
        $this->set(compact('score'));
        $this->set('_serialize', ['score']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Score id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $score = $this->Scores->get($id);
        if ($this->Scores->delete($score)) {
            $this->Flash->success(__('The score has been deleted.'));
        } else {
            $this->Flash->error(__('The score could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
