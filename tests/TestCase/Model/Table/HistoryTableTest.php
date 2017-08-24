<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoryTable Test Case
 */
class HistoryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoryTable
     */
    public $History;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.history',
        'app.media',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('History') ? [] : ['className' => 'App\Model\Table\HistoryTable'];
        $this->History = TableRegistry::get('History', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->History);

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
