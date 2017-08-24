<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieTagsTable Test Case
 */
class MovieTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieTagsTable
     */
    public $MovieTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movie_tags',
        'app.movies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MovieTags') ? [] : ['className' => 'App\Model\Table\MovieTagsTable'];
        $this->MovieTags = TableRegistry::get('MovieTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MovieTags);

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
