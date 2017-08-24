<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BooksOfBibleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BooksOfBibleTable Test Case
 */
class BooksOfBibleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BooksOfBibleTable
     */
    public $BooksOfBible;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.books_of_bible',
        'app.bible_types',
        'app.chapter_number_of_book'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BooksOfBible') ? [] : ['className' => 'App\Model\Table\BooksOfBibleTable'];
        $this->BooksOfBible = TableRegistry::get('BooksOfBible', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BooksOfBible);

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
