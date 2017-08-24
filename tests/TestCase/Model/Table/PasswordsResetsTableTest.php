<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PasswordsResetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PasswordsResetsTable Test Case
 */
class PasswordsResetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PasswordsResetsTable
     */
    public $PasswordsResets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.passwords_resets',
        'app.users',
        'app.videos',
        'app.comments',
        'app.followers',
        'app.user_followers',
        'app.followings',
        'app.user',
        'app.video'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PasswordsResets') ? [] : ['className' => 'App\Model\Table\PasswordsResetsTable'];
        $this->PasswordsResets = TableRegistry::get('PasswordsResets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PasswordsResets);

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
