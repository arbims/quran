<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use App\Model\Table\EpisodesTable;
use Cake\Event\EventInterface;

/**
 * EpisodesController
 */
class EpisodesController extends AppController {

  /**
     * beforeFilter
     *
     * @param  mixed $event
     * @return void
     */
    public function beforeFilter(EventInterface $event)
    {
        $this->Authentication->allowUnauthenticated(['index']);
    }
  /**
   * index
   *
   * @param  mixed $episodesTable
   * @param  mixed $id
   * @return void
   */
  public function index(EpisodesTable $episodesTable, int $id) {
    $episodes = $episodesTable->findEpisodesProgram($id);
    $this->set(compact('episodes'));
    $this->viewBuilder()->setOption('serialize', ['episodes']);
  }
}
