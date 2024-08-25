<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CkeditorHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\CkeditorHelper Test Case
 */
class CkeditorHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\CkeditorHelper
     */
    protected $Ckeditor;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Ckeditor = new CkeditorHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ckeditor);

        parent::tearDown();
    }
}
