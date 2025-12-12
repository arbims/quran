<?php
declare(strict_types=1);

namespace Swagger\Controller;

use App\Controller\AppController;
use Cake\View\JsonView;
use OpenApi\Attributes as OA;

#[OA\Info(version: "1.0", description: "Example swagger openApi", title: "Cakephp Api")]
#[OA\Server(url: "http://localhost:8765")]
#[OA\SecurityScheme(
    securityScheme: 'bearerAuth',
    type: 'http',
    name: 'bearerAuth',
    in: 'header',
    bearerFormat: 'JWT',
    scheme: 'bearer'
)]
class SwaggerDocController extends AppController
{

    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    public function initialize(): void
    {
        parent::initialize();
    }

    /**
     * Render Swagger UI
     */
    public function index()
    {
        $this->viewBuilder()->setTemplate('swagger');
        $this->viewBuilder()->setLayout('swagger');
        // Exemple de rendu d'une vue Swagger (si tu as une vue HTML pour Swagger UI)
        $this->render('/Swagger/index');
    }

    /**
     * Return swagger.json content
     */
    public function swagger()
    {
        $swaggerFile = WWW_ROOT . 'swagger.json';
        if (file_exists($swaggerFile)) {
            $swaggerContent = file_get_contents($swaggerFile);
            return $this->response
                ->withType('text/plain')
                ->withStringBody($swaggerContent);
        } else {
            $this->response = $this->response->withStatus(404);
            $this->set([
                'error' => 'Swagger file not found.',
                '_serialize' => ['error']
            ]);
        }
    }

    #[OA\Get(
        path: '/api/demo.json',
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: "List demo",
            ),
            new OA\Response(response: 401, description: 'Not allowed'),
        ],
    )]
    public function demo()
    {
        $message = 'Welcome to CakePHP Swagger API';
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

        #[OA\Get(
        path: '/api/csrf.json',
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: "Csrf token",
            ),
            new OA\Response(response: 401, description: 'Not allowed'),
        ],
    )]
    public function csrf()
    {
        $csrf = $this->request->getAttribute('csrfToken');
        $this->set(compact('csrf'));
        $this->viewBuilder()->setOption('serialize', ['csrf']);
    }
}
