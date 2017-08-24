<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VideoReportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VideoReportsTable Test Case
 */
class VideoReportsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VideoReportsTable
     */
    public $VideoReports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.video_reports',
        'app.videos',
        'app.users',
        'app.video_likes',
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
        $config = TableRegistry::exists('VideoReports') ? [] : ['className' => 'App\Model\Table\VideoReportsTable'];
        $this->VideoReports = TableRegistry::get('VideoReports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VideoReports);

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
