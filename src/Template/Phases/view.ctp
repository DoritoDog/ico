<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phase $phase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Phase'), ['action' => 'edit', $phase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Phase'), ['action' => 'delete', $phase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Phases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phase'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phases view large-9 medium-8 columns content">
    <h3><?= h($phase->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($phase->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($phase->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Goal') ?></th>
            <td><?= $this->Number->format($phase->goal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funds Raised') ?></th>
            <td><?= $this->Number->format($phase->funds_raised) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($phase->deadline) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($phase->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($phase->text)); ?>
    </div>
</div>
