<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersLikesFavouritesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersLikesFavouritesTable Test Case
 */
class UsersLikesFavouritesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersLikesFavouritesTable
     */
    public $UsersLikesFavourites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_likes_favourites',
        'app.users',
        'app.videos',
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
        $config = TableRegistry::exists('UsersLikesFavourites') ? [] : ['className' => 'App\Model\Table\UsersLikesFavouritesTable'];
        $this->UsersLikesFavourites = TableRegistry::get('UsersLikesFavourites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersLikesFavourites);

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
