<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\ProgramsTable;
use Authentication\Controller\Component\AuthenticationComponent;
use Cake\ORM\TableRegistry;

/**
 * Programs Controller
 *
 * @property \App\Model\Table\ProgramsTable $Programs
 * @property AuthenticationComponent $Authentication
 * @method \App\Model\Entity\Program[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProgramsController extends AppController
{

	/**
	 * beforeFilter
	 *
	 * @param  mixed $event
	 * @return void
	 */
	public function beforeFilter(\Cake\Event\EventInterface $event): void
	{
		$this->Authentication->allowUnauthenticated(['show','episode','index']);
	}

	public function index(ProgramsTable $programsTable) {
        $this->set('title', 'قائمة البرامج');
		$programs = $programsTable->find()->all();
		$this->set(compact('programs'));
	}

	/**
	 * show
	 *
	 * @param  mixed $slug
	 * @param  mixed $id
	 * @return void
	 */
	public function show(int $id, string $slug): void
	{
		$programTable = TableRegistry::getTableLocator()->get('Programs');
		$program = $programTable->get($id);
        $this->set('title', $program->title);
		$this->set('program',$program);
	}
}
