<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MusicVerseIdsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MusicVerseIdsTable Test Case
 */
class MusicVerseIdsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MusicVerseIdsTable
     */
    public $MusicVerseIds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.music_verse_ids',
        'app.musics'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MusicVerseIds') ? [] : ['className' => 'App\Model\Table\MusicVerseIdsTable'];
        $this->MusicVerseIds = TableRegistry::get('MusicVerseIds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MusicVerseIds);

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
