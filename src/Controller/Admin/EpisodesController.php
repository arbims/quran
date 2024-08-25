<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Episodes Controller
 *
 * @property \App\Model\Table\EpisodesTable $Episodes
 * @method \App\Model\Entity\Episode[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Programs'],
        ];
        $episodes = $this->paginate($this->Episodes);

        $this->set(compact('episodes'));
    }

    /**
     * View method
     *
     * @param string|null $id Episode id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $episode = $this->Episodes->get($id, [
            'contain' => ['Programs'],
        ]);

        $this->set(compact('episode'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on adminsuccessful add, renders view otherwise.
     */
    public function add()
    {
        $episode = $this->Episodes->newEmptyEntity();
        if ($this->request->is('post')) {
            $episode = $this->Episodes->patchEntity($episode, $this->request->getData());
            if ($this->Episodes->save($episode)) {
                $this->Flash->adminsuccess(__('The episode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode could not be saved. Please, try again.'));
            dump(($episode)); die;
        }
        $programs = $this->Episodes->Programs->find('list', ['limit' => 200])->all();
        $this->set(compact('episode', 'programs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episode id.
     * @return \Cake\Http\Response|null|void Redirects on adminsuccessful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $episode = $this->Episodes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episode = $this->Episodes->patchEntity($episode, $this->request->getData());
            if ($this->Episodes->save($episode)) {
                $this->Flash->adminsuccess(__('The episode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode could not be saved. Please, try again.'));
        }
        $programs = $this->Episodes->Programs->find('list', ['limit' => 200])->all();
        $this->set(compact('episode', 'programs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episode id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(int $id)
    {
        $episode = $this->Episodes->get($id);
        if ($this->Episodes->delete($episode)) {
            $this->Flash->adminsuccess(__('The episode has been deleted.'));
        } else {
            $this->Flash->error(__('The episode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
