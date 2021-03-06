<head>

<style>
body { background: #131313; }
</style>

</head>

<body>

<div id="sidebar">
    <h5>
        Dashboard
        <button type="button" id="sidebarCollapse">
            <span class="fa fa-navicon"><span>
        </button>
    </h5>
    <ul class="list-unstyled">
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-home')),
                ['action' => 'index'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Home', ['action' => 'index'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-credit-card-alt')),
                ['action' => 'buyAndTransfer'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Buy & Transfer Tokens', ['action' => 'buyAndTransfer'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-globe')),
                ['action' => 'news'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('News', ['action' => 'news'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-area-chart')),
                ['action' => 'icoStatistics'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('ICO Statistics', ['action' => 'icoStatistics'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-cube')),
                ['action' => 'blockExplorer'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Block Explorer', ['action' => 'blockExplorer'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-address-book')),
                ['action' => 'profile'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Account', ['action' => 'profile'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-gear')),
                ['action' => 'settings'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Settings', ['action' => 'settings'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-user')),
                ['action' => 'logout'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Sign out', ['action' => 'logout'], ['class' => 'sidebar-link']) ?>
        </li>
    </ul>
</div>

<div id="content">
    <div class="dropdown user">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
            <?= $this->Html->image($user->profile_image, ['width' => 35, 'height' => 35]) ?>
            &nbsp;
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
</div>
</body>