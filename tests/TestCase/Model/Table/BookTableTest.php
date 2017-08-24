<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookTable Test Case
 */
class BookTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BookTable
     */
    public $Book;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.book'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Book') ? [] : ['className' => 'App\Model\Table\BookTable'];
        $this->Book = TableRegistry::get('Book', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Book);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
