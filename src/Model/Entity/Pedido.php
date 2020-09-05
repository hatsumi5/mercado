<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $codigo_pedido
 * @property int $codigo_cliente
 * @property \Cake\I18n\FrozenTime $data_pedido
 * @property string|null $observacao
 * @property string $forma_pagamento
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Produto $produto
 */
class Pedido extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'codigo_cliente' => true,
        'data_pedido' => true,
        'observacao' => true,
        'forma_pagamento' => true,
        'cliente' => true,
        'produto' => true,
    ];
}
