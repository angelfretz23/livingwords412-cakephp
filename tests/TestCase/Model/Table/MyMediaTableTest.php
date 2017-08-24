<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MyMediaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MyMediaTable Test Case
 */
class MyMediaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MyMediaTable
     */
    public $MyMedia;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.my_media',
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
        $config = TableRegistry::exists('MyMedia') ? [] : ['className' => 'App\Model\Table\MyMediaTable'];
        $this->MyMedia = TableRegistry::get('MyMedia', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MyMedia);

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
