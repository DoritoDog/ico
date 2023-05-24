<div class="dropdown user">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
        <?= $this->Html->image($user->profile_image, ['width' => 35, 'height' => 35]) ?>

        <?= h($user->full_name) ?>
    </button>
    <div class="dropdown-menu">
        <?= $this->Html->link('Sign out', ['action' => 'logout'], ['class' => 'dropdown-item']) ?>
    </div>
</div>

<h3 class="pink text-center price-title">Latest Stories</h3>
<div class="title-underline mb-5"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 mb-5">

        <?php
            $url = ['controller' => 'Stories', 'action' => 'view', $main_story->slug];
            $options = ['width' => '100%', 'id' => 'top-story', 'url' => $url];
            echo $this->Html->image($main_story->cover_image, $options);
        ?>

        <h3 class="white">
        <?php
            $url = ['controller' => 'Stories', 'action' => 'view', $main_story->slug];
            echo $this->Html->link($main_story->title, $url, ['class' => 'white']);
        ?>
        </h3>

        <h5 class="grey">
            <?='By ' . h($main_story->user->full_name . ' on ' . $main_story->created) ?>
        </h5>
        </div>

        <div class="col-lg-4">
        <div class="mx-auto">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search']]) ?>
            <div class="inline-block mb-3 ml-5">
            <?php
                $options = [
                    'type' => 'text', 'placeholder' => 'Search for articles...',
                    'class' => 'form-control dark-input', 'name' => 'input'
                ];
                echo $this->Form->input('', $options);
                echo $this->Form->button('', ['class' => 'fa fa-search search-button white']);
            ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
        <?php foreach($stories as $story): ?>

            <div class="related-article mx-auto">
            <?php
                $options = [
                    'width' => '100%',
                    'url' => ['controller' => 'Stories', 'action' => 'view', $story->slug]
                ];
                echo $this->Html->image($story->cover_image, $options);
            ?>
            <h5><?php
                $options =  ['controller' => 'Stories', 'action' => 'view', h($story->slug)];
                echo $this->Html->link(h($story->title), $options, ['class' => 'link white']);
            ?></h5>
            </div>

        <?php endforeach; ?>
        </div>
    </div>
</div>
