<?php
declare(strict_types=1);

namespace Swagger\Test\TestCase\Command;

use Cake\TestSuite\ConsoleIntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Swagger\Command\AssetsSwaggerCommand;

/**
 * Swagger\Command\AssetsSwaggerCommand Test Case
 *
 * @uses \Swagger\Command\AssetsSwaggerCommand
 */
class AssetsSwaggerCommandTest extends TestCase
{
    use ConsoleIntegrationTestTrait;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->useCommandRunner();
    }
    /**
     * Test buildOptionParser method
     *
     * @return void
     * @uses \Swagger\Command\AssetsSwaggerCommand::buildOptionParser()
     */
    public function testBuildOptionParser(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test execute method
     *
     * @return void
     * @uses \Swagger\Command\AssetsSwaggerCommand::execute()
     */
    public function testExecute(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
