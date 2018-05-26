<head>
<style>
body {
    background: white;
}
</style>
</head>

<body>
<?= $this->Html->css('custom') ?>
<div class="page-content">
    <h1 class="text-center">Search</h1>
    <p class="text-center">Your search got
        <?php
            $count = $stories->count();
            echo $count != 1 ? $count.' results.' : $count.' result.';
        ?></p>
    <?= $this->Form->create(false, ['type' => 'get', 'url' => ['action' => 'search']]) ?>
        <div class="inline-block text-center">
        <?php
            $options = [
                'type' => 'text', 'placeholder' => 'Search for articles...', 'name' => 'input',
                'class' => 'form-control articles-search', 'style' => 'width: 400px',
                'autocomplete' => 'off'
            ];
            echo $this->Form->input('', $options);
            echo $this->Form->button('', ['class' => 'fa fa-search search-button']);
        ?>
        </div>
    <?= $this->Form->end() ?>

    <?php foreach($stories as $story): ?>

    <div class="result">
        <div class="inline-block">
            <?php
            $options = [
                'url' => ['action' => 'view', $story->slug],
                'width' => 300, 'class' => 'left-image'
            ];
            echo $this->Html->image($story->cover_image, $options);
            ?>
            <h2 class="right-text"><?php
            echo $this->Html->link($story->title, ['action' => 'view', $story->slug], ['class' => 'link'])
            ?></h2>
        </div>
    </div>

    <?php endforeach; ?>

</div>
</body>