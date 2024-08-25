<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\PostsTable;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{

  public $paginate = [
    'limit' => 10,
  ];

  public function initialize(): void
  {
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Paginator');
  }


  /**
   * beforeFilter
   *
   * @param  mixed $event
   * @return void
   */
  public function beforeFilter(\Cake\Event\EventInterface $event): void
  {
    $this->Authentication->allowUnauthenticated(['detail', 'index']);
  }

  /**
   * index
   *
   * @param  PostsTable $postsTable
   * @return void
   */
  public function index(PostsTable $postsTable): void {
    $this->set('title', 'Liste des Articles');
    $posts = $this->paginate($postsTable->find('all')->contain(['Users']))->toArray();
    $this->set(compact('posts'));
  }

  /**
   * detail
   *
   * @param  mixed $slug
   * @param  mixed $id
   * @return void
   */
  public function detail(string $slug, int $id): void
  {
    $post = $this->Posts->get($id, ['contain' => ['Users']]);
    $this->set(compact('post'));
    $this->viewBuilder()->setOption('serialize', 'post');
  }

}
