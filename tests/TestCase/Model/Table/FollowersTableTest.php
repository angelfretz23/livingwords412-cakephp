<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FollowersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FollowersTable Test Case
 */
class FollowersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FollowersTable
     */
    public $Followers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.followers',
        'app.users',
        'app.videos',
        'app.comments',
        'app.video_likes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Followers') ? [] : ['className' => 'App\Model\Table\FollowersTable'];
        $this->Followers = TableRegistry::get('Followers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Followers);

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
