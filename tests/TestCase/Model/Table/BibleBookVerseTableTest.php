<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BibleBookVerseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BibleBookVerseTable Test Case
 */
class BibleBookVerseTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BibleBookVerseTable
     */
    public $BibleBookVerse;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bible_book_verse',
        'app.chapters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BibleBookVerse') ? [] : ['className' => 'App\Model\Table\BibleBookVerseTable'];
        $this->BibleBookVerse = TableRegistry::get('BibleBookVerse', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BibleBookVerse);

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
