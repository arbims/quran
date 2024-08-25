<?php
declare(strict_types=1);

namespace App\Test\TestCase\Form;

use App\Form\ContactForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\ContactForm Test Case
 */
class ContactFormTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Form\ContactForm
     */
    protected $Contact;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->Contact = new ContactForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Contact);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Form\ContactForm::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
