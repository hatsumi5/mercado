<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PedidoProdutosFixture
 */
class PedidoProdutosFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pedido_produto';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'codigo_pedido' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'codigo_produto' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantidade' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_codigo_produto' => ['type' => 'index', 'columns' => ['codigo_produto'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['codigo_pedido', 'codigo_produto'], 'length' => []],
            'fk_codigo_produto' => ['type' => 'foreign', 'columns' => ['codigo_produto'], 'references' => ['produto', 'codigo_produto'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_codigo_pedido' => ['type' => 'foreign', 'columns' => ['codigo_pedido'], 'references' => ['pedido', 'codigo_pedido'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'codigo_pedido' => 1,
                'codigo_produto' => 1,
                'quantidade' => 1,
            ],
        ];
        parent::init();
    }
}
