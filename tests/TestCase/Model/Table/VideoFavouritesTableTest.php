<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VideoFavouritesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VideoFavouritesTable Test Case
 */
class VideoFavouritesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VideoFavouritesTable
     */
    public $VideoFavourites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.video_favourites',
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
        $config = TableRegistry::exists('VideoFavourites') ? [] : ['className' => 'App\Model\Table\VideoFavouritesTable'];
        $this->VideoFavourites = TableRegistry::get('VideoFavourites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VideoFavourites);

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
