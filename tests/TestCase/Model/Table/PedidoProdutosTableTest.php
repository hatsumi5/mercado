<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidoProdutosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidoProdutosTable Test Case
 */
class PedidoProdutosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidoProdutosTable
     */
    protected $PedidoProdutos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PedidoProdutos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PedidoProdutos') ? [] : ['className' => PedidoProdutosTable::class];
        $this->PedidoProdutos = $this->getTableLocator()->get('PedidoProdutos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PedidoProdutos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
