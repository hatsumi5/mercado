<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PedidoProdutos Model
 *
 * @method \App\Model\Entity\PedidoProduto newEmptyEntity()
 * @method \App\Model\Entity\PedidoProduto newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PedidoProduto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PedidoProduto get($primaryKey, $options = [])
 * @method \App\Model\Entity\PedidoProduto findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PedidoProduto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PedidoProduto[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PedidoProduto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PedidoProduto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PedidoProduto[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PedidoProduto[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PedidoProduto[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PedidoProduto[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PedidoProdutosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pedido_produto');
        $this->setDisplayField('codigo_pedido');
        $this->setPrimaryKey(['codigo_pedido', 'codigo_produto']);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('codigo_pedido')
            ->allowEmptyString('codigo_pedido', null, 'create');

        $validator
            ->integer('codigo_produto')
            ->allowEmptyString('codigo_produto', null, 'create');

        $validator
            ->integer('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmptyString('quantidade');

        return $validator;
    }
}
