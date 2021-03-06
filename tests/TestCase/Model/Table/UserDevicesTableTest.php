<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserDevicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserDevicesTable Test Case
 */
class UserDevicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserDevicesTable
     */
    public $UserDevices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_devices',
        'app.users',
        'app.videos',
        'app.comments',
        'app.followers',
        'app.user_followers',
        'app.followings',
        'app.user',
        'app.follower',
        'app.video'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserDevices') ? [] : ['className' => 'App\Model\Table\UserDevicesTable'];
        $this->UserDevices = TableRegistry::get('UserDevices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserDevices);

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
