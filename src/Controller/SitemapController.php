<?php

namespace App\Controller;

use App\Model\Table\EpisodesTable;
use App\Model\Table\PostsTable;
use App\Model\Table\ProgramsTable;
use Cake\Routing\Router;
use Cake\View\XmlView;
use Cake\I18n\DateTime;

class SitemapController extends AppController
{

	public function viewClasses(): array
	{
		return [XmlView::class];
	}
	/**
	 * beforeFilter
	 *
	 * @param  mixed $event
	 * @return void
	 */
	public function beforeFilter(\Cake\Event\EventInterface $event): void
	{
		$this->Authentication->allowUnauthenticated(['index']);
	}

	public function index(PostsTable $postsTable, ProgramsTable $programsTable)
	{
		$posts = $postsTable->find()->all();
		$urls = [];
		$urls[] = [
			'loc' => Router::url(['controller' => 'Pages', 'action' => 'index', '_full' => true]),
			'lastmod' => new DateTime(),
			'changefreq' => 'daily',
			'priority' => '0.5'
		];
		$urls[] = [
			'loc' => Router::url(['controller' => 'Posts', 'action' => 'index', '_full' => true]),
			'lastmod' => new DateTime(),
			'changefreq' => 'daily',
			'priority' => '0.5'
		];
		$urls[] = [
			'loc' => Router::url(['controller' => 'Programs', 'action' => 'index', '_full' => true]),
			'lastmod' => new DateTime(),
			'changefreq' => 'daily',
			'priority' => '0.5'
		];
		$urls[] = [
			'loc' => Router::url(['controller' => 'Contact', 'action' => 'index', '_full' => true]),
			'changefreq' => 'daily',
			'priority' => '0.5'
		];
		$urls[] = [
			'loc' => Router::url(['controller' => 'Contact', 'action' => 'index', '_full' => true]),
			'changefreq' => 'daily',
			'priority' => '0.5'
		];
        foreach ($posts as $post) {
			$urls[] = [
				'loc' => Router::url(['controller' => 'Posts', 'action' => 'detail', $post->id, rawurlencode($post->slug), '_full' => true, '_escape' => true]),
				'lastmod' => $post->modified->format('Y-m-d'),
				'changefreq' => 'daily',
				'priority' => '0.5'
			];
		}
		$programs = $programsTable->find()->all();
		foreach ($programs as $program) {
			$urls[] = [
				'loc' => Router::url(['controller' => 'Programs', 'action' => 'show', $program->id, rawurlencode($program->slug), '_full' => true, '_escape' => true]),
				'lastmod' => $program->modified->format('Y-m-d'),
				'changefreq' => 'daily',
				'priority' => '0.5'
			];
		}

		// Define a custom root node in the generated document.
		$this->viewBuilder()
			->setOption('rootNode', 'urlset')
			->setOption('serialize', ['@xmlns', 'url']);
		$this->set([
			// Define an attribute on the root node.
			'@xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9',
			'url' => $urls
		]);
	}
}
