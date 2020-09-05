<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->codigo_pedido], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->codigo_pedido], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->codigo_pedido), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pedidos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pedido'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pedidos view content">
            <h3><?= h($pedido->codigo_pedido) ?></h3>
            <table>
                <tr>
                    <th><?= __('Observacao') ?></th>
                    <td><?= h($pedido->observacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Forma Pagamento') ?></th>
                    <td><?= h($pedido->forma_pagamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo Pedido') ?></th>
                    <td><?= $this->Number->format($pedido->codigo_pedido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo Cliente') ?></th>
                    <td><?= $this->Number->format($pedido->codigo_cliente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo Produto') ?></th>
                    <td><?= $this->Number->format($pedido->codigo_produto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Pedido') ?></th>
                    <td><?= h($pedido->data_pedido) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
