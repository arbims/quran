<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use App\Model\Table\EpisodesTable;
use Cake\Event\EventInterface;
use Cake\View\JsonView;
use OpenApi\Attributes as OA;

/**
 * EpisodesController
 */
class EpisodesController extends AppController
{

	public function viewClasses(): array
	{
		return [JsonView::class];
	}

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

        #[OA\Get(
        path: '/api/episodes/{programId}.json',
        security: [['bearerAuth' => []]],
        parameters: [
            new OA\Parameter(
                name: "programId",
                description: "Program ID",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "list episodes of program ID",
                content: new OA\JsonContent(
                    ref: "#/components/schemas/EpisodesTable"
                )
            ),
            new OA\Response(response: 401, description: 'Not allowed'),
        ],
    )]
	public function index(EpisodesTable $episodesTable, int $id)
	{
		$episodes = $episodesTable->findEpisodesProgram($id);
        if (empty($episodes)) {
            $data = ['message' => 'episode not found'];
            $this->set('data', $data);
            $this->viewBuilder()->setOption('serialize', ['data']);
        } else {
            $this->set(compact('episodes'));
		    $this->viewBuilder()->setOption('serialize', ['episodes']);
        }
	}

    #[OA\Post(
        path: '/api/episodes.json',
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                ref: "#/components/schemas/FormEpisode",
                required: ['title', 'slug', 'youtube', 'online', 'description']
            )
        ),
        parameters: [
            new OA\Parameter(
                name: 'X-CSRF-Token',
                description: 'CSRF token for security',
                in: 'header',
                required: true,
                schema: new OA\Schema(type: 'string')
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "create episode",
                content: new OA\JsonContent(
                    ref: "#/components/schemas/EpisodesTable"
                )
            ),
            new OA\Response(response: 401, description: 'Not allowed'),
        ],
    )]
    public function add(EpisodesTable $episodesTable)
    {
        $episode = $episodesTable->newEmptyEntity();

		if ($this->request->is('post')) {

			$data = $this->request->getData();
			$episode = $episodesTable->patchEntity($episode, $data);
			if ($episodesTable->save($episode)) {
				$this->set(compact('episode'));
                $this->viewBuilder()->setOption('serialize', ['episode']);
			} else {
				$data = ['errors' => $episode->getErrors()];
                $this->set('data', $data);
                $this->viewBuilder()->setOption('serialize', ['data']);
			}
		} else {
            $data = ['errors' => 'Method not allowed', 'code' => 401];
            $this->set('data', $data);
            $this->viewBuilder()->setOption('serialize', ['data']);
        }


    }
}
