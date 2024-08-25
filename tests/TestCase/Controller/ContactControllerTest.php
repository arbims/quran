<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ContactController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ContactController Test Case
 *
 * @uses \App\Controller\ContactController
 */
class ContactControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
    ];


    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\EpisodesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
