<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\ContactForm;
use Cake\Event\EventInterface;

/**
 * Contact Controller
 *
 */
class ContactController extends AppController
{
   /**
   * beforeFilter
   *
   * @param  mixed $event
   * @return void
   */
  public function beforeFilter(EventInterface $event): void {
    $this->Authentication->allowUnauthenticated(['index', 'postcontact']);
  }

  /**
   * index
   *
   * @param  mixed $emailService
   * @return void
   */
  public function index(): void {
    $contact = new ContactForm();
    $this->set('contact', $contact);
    $this->render('/contact');
  }

  public function postcontact() {
    $contact = new ContactForm();
    $result = [];
    if ($this->request->is('post')) {
      $data = $this->request->getData();
      if ($contact->execute($data)) {
        $this->response = $this->response->withStatus(200);
        $result = ['data' => $data, 'message' => 'send with success', 'status' => 200];
      } else {
        $this->response = $this->response->withStatus(403);
        $result = ['message'=> 'data invalide', 'errors' => $contact->getErrors()];
      }
    }
    $this->set(compact('result'));
    $this->viewBuilder()->setOption('serialize', ['result']);
  }
}
