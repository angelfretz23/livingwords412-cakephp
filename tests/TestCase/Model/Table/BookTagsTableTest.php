<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookTagsTable Test Case
 */
class BookTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BookTagsTable
     */
    public $BookTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.book_tags',
        'app.books'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BookTags') ? [] : ['className' => 'App\Model\Table\BookTagsTable'];
        $this->BookTags = TableRegistry::get('BookTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BookTags);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
