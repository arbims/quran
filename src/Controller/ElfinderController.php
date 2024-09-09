<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class ElfinderController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->disableAutoLayout();
    }


    public function connect() {
        $this->autoRender = false;
        require dirname(__DIR__) . '/lib/elfinder/connector.php';
    }
}
