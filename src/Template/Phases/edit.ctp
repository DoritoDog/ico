<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phase $phase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $phase->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $phase->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Phases'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="phases form large-9 medium-8 columns content">
    <?= $this->Form->create($phase) ?>
    <fieldset>
        <legend><?= __('Edit Phase') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('text');
            echo $this->Form->control('goal');
            echo $this->Form->control('funds_raised');
            echo $this->Form->control('deadline');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
