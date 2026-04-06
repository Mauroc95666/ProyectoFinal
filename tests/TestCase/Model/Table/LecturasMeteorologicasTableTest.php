<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LecturasMeteorologicasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LecturasMeteorologicasTable Test Case
 */
class LecturasMeteorologicasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LecturasMeteorologicasTable
     */
    protected $LecturasMeteorologicas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.LecturasMeteorologicas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LecturasMeteorologicas') ? [] : ['className' => LecturasMeteorologicasTable::class];
        $this->LecturasMeteorologicas = $this->getTableLocator()->get('LecturasMeteorologicas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LecturasMeteorologicas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\LecturasMeteorologicasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
