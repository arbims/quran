<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Table\UsersTable;

class UsersController extends AppController {

  
  /**
   * index
   *
   * @param  mixed $usersTable
   * @return void
   */
  public function index(UsersTable $usersTable):void {
    $users = $usersTable->find()->toArray();
    $this->set(compact('users'));
  }
}