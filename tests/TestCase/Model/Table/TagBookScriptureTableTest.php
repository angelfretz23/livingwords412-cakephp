<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TagBookScriptureTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TagBookScriptureTable Test Case
 */
class TagBookScriptureTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TagBookScriptureTable
     */
    public $TagBookScripture;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tag_book_scripture',
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
        $config = TableRegistry::exists('TagBookScripture') ? [] : ['className' => 'App\Model\Table\TagBookScriptureTable'];
        $this->TagBookScripture = TableRegistry::get('TagBookScripture', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TagBookScripture);

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
