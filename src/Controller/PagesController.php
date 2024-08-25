<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Model\Table\ProgramsTable;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

	/**
	 * beforeFilter
	 *
	 * @param  mixed $event
	 * @return void
	 */
	public function beforeFilter(\Cake\Event\EventInterface $event): void {
		$this->Authentication->allowUnauthenticated(['index']);
	}

	/**
	 * index
	 *
	 * @param  mixed $programsTable
	 * @return void
	 */
	public function index(ProgramsTable $programsTable): void {
		$this->set('title', 'إذاعة القرآن الكريم');
		$PostsTable = TableRegistry::getTableLocator()->get('Posts');
		$posts = $PostsTable->find('all')->contain(['Users'])->toArray();
		$query = $programsTable->find();
		$programs =  $query
		->select([
				'title','slug','image','id',
				'count' => $query->func()->count('Episodes.id')
		])
		->leftJoinWith('Episodes')
		->group('programs.id');
		$this->set(compact('posts','programs'));
	}
}
