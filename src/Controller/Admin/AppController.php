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

use App\Controller\AppController as ControllerAppController;
use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Laminas\Diactoros\Response\RedirectResponse;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends ControllerAppController
{
    use \Crud\Controller\ControllerTrait;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
      parent::initialize();
    }


    /**
	 *
	 * @param EventInterface $event
	 * @return RedirectResponse
	 */
	public function beforeFilter(EventInterface $event) {

		if ($this->Authentication->getIdentity() !== null && $this->request->getParam('prefix') != null && $this->request->getParam('prefix') == 'Admin') {
			if ($this->Authentication->getIdentity()->get('role') !== 'admin') {
				return new RedirectResponse('/');
			}
			$this->viewBuilder()->setLayout('admin');
		}
	}
}
