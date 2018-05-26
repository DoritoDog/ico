<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepliesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepliesTable Test Case
 */
class RepliesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RepliesTable
     */
    public $Replies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.replies',
        'app.comments',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Replies') ? [] : ['className' => RepliesTable::class];
        $this->Replies = TableRegistry::get('Replies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Replies);

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
