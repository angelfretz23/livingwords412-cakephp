<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UploadVerseIdsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UploadVerseIdsTable Test Case
 */
class UploadVerseIdsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UploadVerseIdsTable
     */
    public $UploadVerseIds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.upload_verse_ids',
        'app.sermons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UploadVerseIds') ? [] : ['className' => 'App\Model\Table\UploadVerseIdsTable'];
        $this->UploadVerseIds = TableRegistry::get('UploadVerseIds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UploadVerseIds);

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
