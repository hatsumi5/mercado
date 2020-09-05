<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedidos
 */
?>
<div class="pedidos index content">
    <?= $this->Html->link(__('New Pedido'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pedidos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('codigo_pedido') ?></th>
                    <th><?= $this->Paginator->sort('codigo_cliente') ?></th>
                    <th><?= $this->Paginator->sort('codigo_produto') ?></th>
                    <th><?= $this->Paginator->sort('data_pedido') ?></th>
                    <th><?= $this->Paginator->sort('observacao') ?></th>
                    <th><?= $this->Paginator->sort('forma_pagamento') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?= $this->Number->format($pedido->codigo_pedido) ?></td>
                    <td><?= $this->Number->format($pedido->codigo_cliente) ?></td>
                    <td><?= $this->Number->format($pedido->codigo_produto) ?></td>
                    <td><?= h($pedido->data_pedido) ?></td>
                    <td><?= h($pedido->observacao) ?></td>
                    <td><?= h($pedido->forma_pagamento) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pedido->codigo_pedido]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedido->codigo_pedido]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedido->codigo_pedido], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->codigo_pedido)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
