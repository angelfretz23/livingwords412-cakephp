<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HighLightsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HighLightsTable Test Case
 */
class HighLightsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HighLightsTable
     */
    public $HighLights;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.high_lights',
        'app.verses',
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
        $config = TableRegistry::exists('HighLights') ? [] : ['className' => 'App\Model\Table\HighLightsTable'];
        $this->HighLights = TableRegistry::get('HighLights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HighLights);

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
