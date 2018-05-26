<?= $this->Html->script('Dashboard') ?>

<div class="content">
    <ul class="nav flex-column sidenav navbar-dark bg-dark">
        <li class="nav-item">
            <span class="fa fa-dashboard"></span>
            <?= $this->Html->link('Dashboard', ['action' => 'dashboard']) ?>
        </li>
        <li>
            <span class="fa fa-globe"></span>
            <?= $this->Html->link('News', ['action' => 'history']) ?>
        </li>
        <li>
            <span class="fa fa-money"></span>
            <?= $this->Html->link('Transfers', ['action' => 'profile']) ?>
        </li>
        <li>
            <span class="fa fa-cubes"></span>
            <?= $this->Html->link('Block Explorer', ['action' => 'profile']) ?>
        </li>
        <li>
            <span class="fa fa-address-book-o"></span>
            <?= $this->Html->link('Account', ['action' => 'history']) ?>
        </li>
        <li>
            <span class="fa fa-gear"></span>
            <?= $this->Html->link('Settings', ['action' => 'history']) ?>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <p class="bold">To recieve tokens, please send a currency of your choice
                    to any of these addresses:</p>
                    <li>
                        <div class="inline shadow-sm p-4 mb-4 address-item">
                            <?= $this->Html->image('bitcoin-logo.png', ['height' => 30]) ?>
                            <h3>Bitcoin</h3>
                            <div class="address">
                                <br>
                                <span id="BTC">32PLDaNdHHZ54S2tZB52ajwKeSJjRsQsEY</span>
                                <span class="copy" onclick="copy('#BTC');">Copy</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="inline shadow-sm p-4 mb-4 address-item">
                            <?= $this->Html->image('ethereum-logo.png', ['height' => 30]) ?>
                            <h3>Ethereum</h3>
                            <div class="address">
                                <br>
                                <span id="ETH">0x7A69757bee3c454AB364C41B26b4Bfe29fc94E89</span>
                                <span class="copy" onclick="copy('#ETH');">Copy</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="inline shadow-sm p-4 mb-4 address-item">
                            <?= $this->Html->image('litecoin-logo.png', ['height' => 30]) ?>
                            <h3>Litecoin</h3>
                        <div class="address">
                            <br>
                            <span id="LTC">3MidrAnQ9w1YK6pBqMv7cw5bGLDvPRznph</span>
                            <span class="copy" onclick="copy('#LTC');">Copy</span>
                        </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <h3 class="card-title text-center">Your Balance</h3>
                    <div class="card-body">
                    <p class="balance">
                        <b class="pink" id="balance-text">290.2</b> CRC
                    </p>
                    <script>
                        var address = "<?= h($user->wallet_address) ?>";
                        function loadBalance() {
                            $.ajax({
                                url:'http://localhost:8080',
                                type: 'POST',
                                data: { getBalance: address },
                                success: function(amount) {
                                    document.getElementById('balance-text').innerHTML = amount;
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        }

                        //loadBalance();
                    </script>
                    <button class="btn refresh-wallet" onclick="loadBalance();">
                        <b>REFRESH</b> <span class="fa fa-refresh" id="refresh"></span>
                    </button>
                    
                    <?= $this->Form->create('url', ['controller' => 'Users', 'action' => 'dashboard']) ?>
                    <div id="edit-address">
                        <div class="inline-content">
                            <?php
                            $options = ['class' => 'pink', 'style' => 'font-weight:bold'];
                            echo $this->Form->label('wallet_address', 'ERC20 Address', $options);
                            
                            $options = [
                                'type' => 'text', 'name' => 'wallet_address',
                                'class' => 'form-control', 'spellcheck' => 'false',
                                'value' => h($user->wallet_address), 'onchange' => 'allowUpdate();',
                                'id' => 'address-editor',  'autocomplete' => 'off'
                            ];
                            echo $this->Form->control('', $options);
                            echo $this->Form->button(
                                'Update',
                                ['id' => 'update-button', 'type' => 'submit']
                            );
                            ?>
                        </div>
                    </div>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
            <hr>
            <div class="row news">
                <div class="col-sm-6">
                    <div class="main-headline">
                        <h1>Latest News</h1>
                        <div id="top-cover" class="centered-content">
                            <div id="headline-links" class="invert-colors">
                                <span class="fa fa-facebook invert-colors"></span> &ensp;
                                <span class="fa fa-twitter invert-colors"></span> &ensp;
                                <span class="fa fa-google invert-colors"></span> &ensp;
                            </div>
                            <h4><i class="invert-colors">
                            <?php
                                $options = [\IntlDateFormatter::FULL, \IntlDateFormatter::SHORT];
                                echo h($main_story->created->i18nFormat($options));
                            ?>
                            </i></h4>
                            <h6 id="reads" class="invert-colors">
                                <?= h($main_story->views.' Reads') ?>
                            </h6>
                        </div>
                        <?php
                        $options = [
                            'width' => 600,
                            'id' => 'main-story',
                            'url' => ['controller' => 'Stories', 'action' => 'view', $main_story->slug]
                        ];
                        echo $this->Html->image($main_story->cover_image, $options);
                        ?>
                        <div id="bottom-cover" class="centered-content">
                            <h4><i class="invert-colors">
                            <?php
                            echo h('Written by '.$main_story->user->full_name);
                            ?>
                            </i></h4>
                        </div>
                        <h3 id="headline-desc" class="underline">
                        <?php
                            $options = ['controller' => 'Stories', 'action' => 'view', $main_story->slug];
                            echo $this->Html->link($main_story->title, $options, ['class' => 'link']);
                        ?>
                        </h3>
                    </div>
                </div>
                <div class="col-sm-6">
                    <?php foreach ($stories as $story): ?>
                        <div class="headline">
                            <div class="headline-pic">
                                <?php
                                    $options = [
                                        'width' => 200,
                                        'class' => 'story',
                                        'url' => [
                                            'controller' => 'Stories',
                                            'action' => 'view',
                                            $story->slug
                                            ]
                                        ];

                                    echo $this->Html->image($story->cover_image, $options);
                                ?>
                            </div>
                            <div class="headline-text">
                                <h3 class="underline">
                                <?php
                                $options = ['controller' => 'Stories', 'action' => 'view', $story->slug];
                                $class = ['class' => 'link'];
                                echo $this->Html->link(substr($story->title, 0, 60).'...', $options, $class);
                                ?>
                                </h3>
                                <p>By <?= h($story->user->full_name); ?></p>
                            </div>
                        </div>
                        <br>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copy(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

$(function() {
    $('#main-story, #top-cover, #bottom-cover').hover(function() {
        $('#top-cover').css('opacity', 1);
        $('#bottom-cover').css('opacity', 1);
    }, function() {
        $('#top-cover').css('opacity', '0');
        $('#bottom-cover').css('opacity', '0');
    });
});
</script>