<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SermonTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SermonTable Test Case
 */
class SermonTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SermonTable
     */
    public $Sermon;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sermon',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sermon') ? [] : ['className' => 'App\Model\Table\SermonTable'];
        $this->Sermon = TableRegistry::get('Sermon', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sermon);

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
