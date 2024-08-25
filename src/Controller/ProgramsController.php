<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\ProgramsTable;
use Cake\ORM\TableRegistry;

/**
 * Programs Controller
 *
 * @property \App\Model\Table\ProgramsTable $Programs
 * @method \App\Model\Entity\Program[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProgramsController extends AppController
{

	public function initialize(): void
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}

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
	public function show(string $slug, int $id): void
	{
		$programTable = TableRegistry::getTableLocator()->get('Programs');
		$program = $programTable->get($id);
		$this->set('program',$program);
	}
}
