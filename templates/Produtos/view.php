<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->codigo_produto], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->codigo_produto], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->codigo_produto), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Produto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="produtos view content">
            <h3><?= h($produto->codigo_produto) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($produto->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cor') ?></th>
                    <td><?= h($produto->cor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo Produto') ?></th>
                    <td><?= $this->Number->format($produto->codigo_produto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tamanho') ?></th>
                    <td><?= $this->Number->format($produto->tamanho) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($produto->valor) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
