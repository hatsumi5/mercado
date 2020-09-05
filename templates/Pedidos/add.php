<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pedidos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pedidos form content">
            <?= $this->Form->create($pedido) ?>
            <fieldset>
                <legend><?= __('Add Pedido') ?></legend>
                <?php
                echo $this->Form->control('codigo_cliente');
                echo $this->Form->control('codigo_produto');
                // echo $this->Form->control('data_pedido');
                echo $this->Form->control('observacao');
                echo $this->Form->label('Forma de Pagamento');
                echo $this->Form->select('forma_pagamento', ['dinheiro', 'cartão', 'cheque']);
                echo $this->Form->label('Cliente');
                echo '<select>';
                foreach ($clientes as $cliente)
                    echo '<option value=' . $cliente->codigo_cliente . '>' . $cliente->nome . '</option>';
                echo '</select>';

                echo $this->Form->label('Produtos');
                echo '<select>';
                foreach ($produtos as $produto)
                    echo '<option value=' . $produto->codigo_produto . '>' . $produto->nome . '</option>';
                echo '</select>';
                echo $this->Form->button('Add Produto');
                // implementar evento do botão para inserir produtos
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>