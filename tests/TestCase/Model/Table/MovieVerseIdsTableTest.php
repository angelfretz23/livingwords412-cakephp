<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieVerseIdsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieVerseIdsTable Test Case
 */
class MovieVerseIdsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieVerseIdsTable
     */
    public $MovieVerseIds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movie_verse_ids',
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
        $config = TableRegistry::exists('MovieVerseIds') ? [] : ['className' => 'App\Model\Table\MovieVerseIdsTable'];
        $this->MovieVerseIds = TableRegistry::get('MovieVerseIds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MovieVerseIds);

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
