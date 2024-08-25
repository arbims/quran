<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\ForumsPostsTable;
use App\Model\Table\UsersTable;
use Cake\Cache\Cache;
use Cake\Event\Event;
use Cake\Http\Response;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;
use Cake\Routing\Route\RedirectRoute;
use Cake\Routing\Router;
use Cake\View\View;
use Google\Service\Bigquery\TableReference;

/**
 * Login Controller
 *
 * @property \App\Model\Table\LoginTable $Login
 */
class UsersController extends AppController {

	/**
	 * beforeFilter
	 *
	 * @param  mixed $event
	 * @return void
	 */
	public function beforeFilter(\Cake\Event\EventInterface $event): void {
		$this->Authentication->allowUnauthenticated(['signup', 'confirm', 'forget', 'passwordForget', 'login']);
	}


	/**
	 * login
	 *
	 * @return void
	 */
	public function login(){
		$this->set('title', 'Connexion');
		$user = $this->Authentication->getResult();
		// Si l'utilisateur est connecté, le renvoyer ailleurs
		if ($user->isValid()) {
			$this->set('user', $user);
			$this->set('_serialize', ['user']);
			$this->Flash->success('Vous ete bien conntée');
			return $this->redirect('/admin/posts');
		}
		if ($this->request->is('post') && !$user->isValid()) {
			$this->Flash->error('Login ou mot de passe invalide');
			return $this->redirect($this->referer());
		}
	}

	/**
	 * logout
	 *
	 * @return void
	 */
	public function logout() {
		$this->Authentication->logout();
		$this->Flash->success('vous ete deconnectée');
		return $this->redirect(Router::url(
			['controller' => 'Pages', 'action' => 'index', 'prefix' => false]
		));
	}

	/**
	 * signup
	 *
	 * @return void
	 */
	public function signup() {
		$this->set('title', 'Inscription');
		$user = $this->Users->newEmptyEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->newEntity($this->request->getData());
			$user->role = 'user';
			$user->confirmation_token = md5(uniqid(36));
			if ($this->Users->save($user)) {
				$email = new Mailer('default');
				$email
					->setEmailFormat('html')
					->setFrom(['codeart@domaine.com' => 'CodeArt'])
					->SetTo($this->request->getData()['email'])
					//->setTemplate('singup')
					->setViewVars(['user' => $user])
					->setSubject('Inscription')
					->viewBuilder()->setTemplate('singup');
				$email->deliver();
				$this->Flash->success('Vous ete bien inscrit confirmer votre Email');
				$this->redirect($this->referer());
			} else {
				$this->set('errors', $user->getErrors());
				$this->Flash->error('les donness ne sont pas valide');
			}
		}
		$this->set(compact('user'));
	}

}
