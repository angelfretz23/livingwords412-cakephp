<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TagScriptureTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TagScriptureTable Test Case
 */
class TagScriptureTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TagScriptureTable
     */
    public $TagScripture;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tag_scripture',
        'app.musics'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TagScripture') ? [] : ['className' => 'App\Model\Table\TagScriptureTable'];
        $this->TagScripture = TableRegistry::get('TagScripture', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TagScripture);

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
