<head>
<style>
body {
    background: white;
}
</style>
</head>

<body>
<?= $this->Html->css('old') ?>
<div class="article-header" style="background-image: url('http://localhost/ico/webroot/img/<?= h($story->cover_image) ?>');">
<div class="page-content mt-0">
    <div class="story-title">
        <h1><?= h($story->title); ?></h1>
    </div>
    <h4 class="lead-text"><?= h($story->lead_text) ?></h4>
    
    <div id="author-date">
        <P class="date pink"><?php
            $options = [\IntlDateFormatter::FULL, \IntlDateFormatter::SHORT];
            echo h($story->created->i18nFormat($options));
        ?></P>
        <div class="author inline">
            <?= $this->Html->image($story->user->profile_image, ['width' => 40]) ?>
            &nbsp; <p><b><?= h($story->user->first_name.' '.$story->user->last_name) ?></b></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="story-content">
                    <?= strip_tags($story->text, '<br><div>') ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="related-articles">
                    <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search']]) ?>
                        <div class="inline-block">
                        <?php
                            $options = [
                                'type' => 'text', 'placeholder' => 'Search for articles...',
                                'class' => 'form-control articles-search', 'name' => 'input'
                            ];
                            echo $this->Form->input('', $options);
                            echo $this->Form->button('', ['class' => 'fa fa-search search-button']);
                        ?>
                        </div>
                    <?= $this->Form->end() ?>
                    <h2>Related Stories</h2>
                    <?php foreach($stories as $related_story): ?>

                    <div class="related-article">
                    <?php
                        $options = ['width' => 250, 'url' => ['action' => 'view', $related_story->slug]];
                        echo $this->Html->image($related_story->cover_image, $options);
                    ?>
                    <h5><?php
                        $options =  ['action' => 'view', $related_story->slug];
                        echo $this->Html->link($related_story->title, $options, ['class' => 'link']);
                    ?></h5>
                    </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="comments">
        <h3 class="text-center">
            Comments <span class="badge badge-secondary"><?= count($story->comments) ?></span>
        </h3>
        <?php
        $formOptions = ['url' => ['action' => 'view', $story->slug, 'type' => 'reply']];
        echo $this->Form->create($comment, $formOptions);

        echo $this->Form->hidden('type', ['value' => 'comment']);

        $options = [
            'name' => 'text', 'placeholder' => 'Add a comment...',
            'class' => 'form-control', 'required' => 'true', 'id' => 'comment-field'
        ];
        echo $this->Form->textarea('text', $options);
        echo $this->Form->button('Post', ['id' => 'post-comment', 'class' => 'btn btn-dark']);

        echo $this->Form->end();
        ?>
        <div class="comments-container">

            <?php foreach($story->comments as $comment): ?>

            <div class="comment">
                <p class="comment-text"><?= h($comment->text) ?></p>
                <div class="inline">
                    <div class="commenter">
                        <?= $this->Html->image($comment->user->profile_image, ['width' => 30]) ?>
                        <b><?=
                            h($comment->user->first_name.' '.$comment->user->last_name);
                        ?></b>
                        <br>
                        <span class="comment-datetime">
                            <i><?php
                                $options = [\IntlDateFormatter::SHORT, \IntlDateFormatter::SHORT];
                                echo h($comment->created->i18nFormat($options));
                            ?></i>
                        </span>
                    </div>
                    <span class="fa fa-thumbs-o-up comment-icon greyOnHover">
                        <small><?= h($comment->likes) ?></small>
                    </span>
                    <span class="fa fa-commenting-o comment-icon greyOnHover"
                    onclick="setActive('replies<?= $comment->id ?>', true);">
                        <small><?= count($comment->replies) ?></small>
                    </span>
                </div>

                <div class="replies" id="replies<?= $comment->id ?>">
                    <div class="replies-bottom inline">
                        <h5>Replies</h5> &nbsp;
                        <span id="hide-replies" onclick="setActive('replies<?= $comment->id ?>', false);">
                            <b class="greyOnHover">Hide</b>
                        </span>
                    </div>
                    <?php foreach($comment->replies as $reply): ?>
                    <div class="reply">
                        <p class="comment-text"><?= h($reply->text) ?></p>
                        <div class="inline">
                            <div class="commenter">
                                <?= $this->Html->image($reply->user->profile_image, ['width' => 30]) ?>
                                &nbsp;
                                <b><?= h($reply->user->first_name.' '.$reply->user->last_name) ?></b>
                                <br>
                                <span class="comment-datetime">
                                    <i><?php
                                        $options = [\IntlDateFormatter::SHORT, \IntlDateFormatter::SHORT];
                                        echo h($reply->created->i18nFormat($options));
                                    ?></i>
                                </span>
                            </div>
                            <span class="fa fa-thumbs-o-up comment-icon greyOnHover">
                                <small><?= h($reply->likes) ?></small>
                            </span>
                        </div>
                    </div>

                    <?php endforeach; ?>

                    <?php
                    echo $this->Form->create($replyContext);
                    echo $this->Form->hidden('type', ['value' => 'reply']);
                    echo $this->Form->hidden('comment_id', ['value' => $comment->id]);

                    $user = $this->request->session()->read('Auth.User');
                    ?>
                    <div class="inline" style="padding-top: 10px">
                        <?= $this->Html->image($user['profile_image'], ['width' => 30]); ?>
                        <b><?= h($user['first_name'].' '.$user['last_name']) ?></b>
                    </div>
                    <?php
                    $options = [
                        'placeholder' => 'Post your reply...', 'label' => false,
                        'class' => 'form-control reply-input', 'required' => false,
                    ];
                    echo $this->Form->textarea('text', $options);
                    echo $this->Form->button('Post', ['class' => 'btn btn-dark']);
                    echo $this->Form->end();
                    ?>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
</div>
</body>