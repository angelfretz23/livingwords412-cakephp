<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VideoFavoritesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VideoFavoritesTable Test Case
 */
class VideoFavoritesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VideoFavoritesTable
     */
    public $VideoFavorites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.video_favorites',
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
        $config = TableRegistry::exists('VideoFavorites') ? [] : ['className' => 'App\Model\Table\VideoFavoritesTable'];
        $this->VideoFavorites = TableRegistry::get('VideoFavorites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VideoFavorites);

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
