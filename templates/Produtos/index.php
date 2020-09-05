<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */
?>
<div class="produtos index content">
    <?= $this->Html->link(__('New Produto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Produtos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('codigo_produto') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('cor') ?></th>
                    <th><?= $this->Paginator->sort('tamanho') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $this->Number->format($produto->codigo_produto) ?></td>
                    <td><?= h($produto->nome) ?></td>
                    <td><?= h($produto->cor) ?></td>
                    <td><?= $this->Number->format($produto->tamanho) ?></td>
                    <td><?= $this->Number->format($produto->valor) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $produto->codigo_produto]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produto->codigo_produto]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produto->codigo_produto], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->codigo_produto)]) ?>
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
