<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phase[]|\Cake\Collection\CollectionInterface $phases
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Phase'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="phases index large-9 medium-8 columns content">
    <h3><?= __('Phases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('goal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funds_raised') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phases as $phase): ?>
            <tr>
                <td><?= $this->Number->format($phase->id) ?></td>
                <td><?= h($phase->title) ?></td>
                <td><?= $this->Number->format($phase->goal) ?></td>
                <td><?= $this->Number->format($phase->funds_raised) ?></td>
                <td><?= h($phase->deadline) ?></td>
                <td><?= h($phase->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $phase->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $phase->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $phase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phase->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
