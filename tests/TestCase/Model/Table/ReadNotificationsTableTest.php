<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReadNotificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReadNotificationsTable Test Case
 */
class ReadNotificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReadNotificationsTable
     */
    public $ReadNotifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.read_notifications',
        'app.notifications',
        'app.users',
        'app.videos',
        'app.comments',
        'app.followers',
        'app.user_followers',
        'app.followings',
        'app.user',
        'app.follower',
        'app.video',
        'app.author',
        'app.following'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReadNotifications') ? [] : ['className' => 'App\Model\Table\ReadNotificationsTable'];
        $this->ReadNotifications = TableRegistry::get('ReadNotifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReadNotifications);

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
