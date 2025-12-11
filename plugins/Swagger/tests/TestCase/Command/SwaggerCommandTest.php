<?php
declare(strict_types=1);

namespace Swagger\Test\TestCase\Command;

use Cake\TestSuite\ConsoleIntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Swagger\Command\SwaggerCommand;

/**
 * Swagger\Command\SwaggerCommand Test Case
 *
 * @uses \Swagger\Command\SwaggerCommand
 */
class SwaggerCommandTest extends TestCase
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
}
