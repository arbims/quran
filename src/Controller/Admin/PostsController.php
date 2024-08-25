<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Service\SlugGenerator;
use Cake\Cache\Cache;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class PostsController extends AppController {

	/**
	 * @return void
	 */
	public function index() {
		$posts = $this->Posts->find('all')->where(['online' => 1]);
		$this->set(compact('posts'));
	}

	/**
	 * @return void
	 */
	public function add() {
		$post = $this->Posts->newEmptyEntity();

		if ($this->request->is('post')) {

			$data = $this->request->getData();
			$data['user_id'] = $this->Authentication->getIdentity()->get('id');
			$post = $this->Posts->patchEntity($post, $data);
			if ($this->Posts->save($post)) {
				$this->Flash->adminsuccess(__('تحديث بنجاح '));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->adminerror(__('لا يمكن القيام بالتحديث '));
				$this->set('errors', $post->getErrors());
			}
		}

		$this->set(compact('post'));
	}

	/**
	 * @param int $id
	 *
	 * @return void
	 */
	public function edit(int $id) {

		$post = $this->Posts->get($id);
		if ($this->request->is('put')) {
			$data = $this->request->getData();
			$data['user_id'] = $this->Authentication->getIdentity()->get('id');
			if (empty($data['image_file']->getClientFilename())) {
				unset($data['image_file']);
			} else {
				$data['image'] = $post->image;
			}
			$post = $this->Posts->patchEntity($post, $data);
			if ($this->Posts->save($post)) {
				$this->Flash->adminsuccess(__('تحديث بنجاح '));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->adminerror(__('لا يمكن القيام بالتحديث '));
				$this->set('errors', $post->getErrors());
			}
		}
		$this->set(compact('post'));
	}

	/**
	 * @param int $id
	 *
	 * @return void
	 */
	public function delete(int $id) {
		$post = $this->Posts->get($id);
		$this->Posts->delete($post);
		$this->Flash->adminsuccess(__('تم المحو بنجاح '));
		return $this->redirect($this->referer());
	}

}
