<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VideoLikesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VideoLikesTable Test Case
 */
class VideoLikesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VideoLikesTable
     */
    public $VideoLikes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.video_likes',
        'app.videos',
        'app.users',
        'app.comments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VideoLikes') ? [] : ['className' => 'App\Model\Table\VideoLikesTable'];
        $this->VideoLikes = TableRegistry::get('VideoLikes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VideoLikes);

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
