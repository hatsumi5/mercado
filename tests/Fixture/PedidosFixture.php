<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PedidosFixture
 */
class PedidosFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pedido';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'codigo_pedido' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'codigo_cliente' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_pedido' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'observacao' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'forma_pagamento' => ['type' => 'string', 'length' => 8, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_pedido_cliente' => ['type' => 'index', 'columns' => ['codigo_cliente'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['codigo_pedido'], 'length' => []],
            'fk_pedido_cliente' => ['type' => 'foreign', 'columns' => ['codigo_cliente'], 'references' => ['cliente', 'codigo_cliente'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'codigo_cliente' => 1,
                'data_pedido' => '2020-09-05 17:30:22',
                'observacao' => 'Lorem ipsum dolor sit amet',
                'forma_pagamento' => 'Lorem ',
            ],
        ];
        parent::init();
    }
}
