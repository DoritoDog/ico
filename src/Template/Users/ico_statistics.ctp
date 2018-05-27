<head>
<style>
body {
    background: #131313;
    color: #808080;
}
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
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-4">
                <div class="centered-content mt-5">
                    <span class="fa fa-usd" style="font-size: 25px"></span>
                    <h5 class="ml-3">Total Funds Raised</h5>
                    <h5 class="white text-center ml-3"><?= '$' . h($fundsRaised) ?></h5>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="centered-content mt-5">
                    <span class="fa fa-group" style="font-size: 25px"></span>
                    <h5 class="ml-3">Total Investors</h5>
                    <h5 class="white text-center ml-3"><?= h($investorsCount) ?></h5>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="centered-content mt-5">
                    <span class="fa fa-calculator" style="font-size: 25px"></span>
                    <h5 class="ml-3">Token Supply</h5>
                    <h5 class="white text-center ml-3"><?= h($tokenSupply) ?></h5>
                </div>
            </div>
        </div>

        <div>
            <div class="centered-content" style="flex-direction: column">
                <h2 id="current-phase-title" class="text-center mx-auto mb-3">
                    Current Phase: <?= h($phase->id) + 1 ?>
                </h2>
                <h5>Goal: <span class="ml-2 white">
                    <?= '$' . h($phase->goal) ?>
                </span></h5>
                <h5>Raised: <span class="ml-2 white">
                    <?= '$' . h($phase->funds_raised) ?>
                </span></h5>
                <h5>Time Left: <span class="ml-2 white">
                    <?= h($daysLeft) . ' Days' ?>
                </span></h5>
            </div>
            <div class="progress-bar-bg mx-auto">
                <div id="progress-bar-fill">63%</div>
            </div>
        </div>
        
        <div class="row" style="margin-right: 20px">
            <div class="col-lg-12">
                <h2 id="current-phase-title" class="text-center mx-auto mt-5">Timeline</h2>

                <p id="phase-1-text" class="phase-text">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Minima, repellat.</p>
                <p id="phase-2-text" class="phase-text">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Minima, repellat.</p>
                <p id="phase-3-text" class="phase-text">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Minima, repellat.</p>
                <p id="phase-4-text" class="phase-text">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Minima, repellat.</p>

                <canvas id="canvas" width="1000" height="700" style="background-color: #131313">
                    <?= $this->Html->image('timeline-arrow.png', ['id' => 'arrow']) ?>
                    <?= $this->Html->image('timeline-holder.png', ['id' => 'icon-holder']) ?>
                </canvas>
            </div>
        </div>
    </div>
</div>

<script>

var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');

var arrow = document.getElementById('arrow');
context.drawImage(arrow, 30, 300);
context.drawImage(arrow, 230, 300);
context.drawImage(arrow, 430, 300);
context.drawImage(arrow, 630, 300);
context.drawImage(arrow, 830, 300);

context.fillStyle = 'white';
context.textAlign = "center";
context.font = '25px Arial';

context.globalAlpha = 0.25;
var holder = document.getElementById('icon-holder');
context.drawImage(holder, 130, 120);
context.fillText('Phase 1 - Preliminary', 200, 110);
context.globalAlpha = 1.0;

drawRotatedImage(holder, 400, 415, 180);
context.fillText('Phase 2 - Initial Launch', 400, 560);

context.globalAlpha = 0.25;
context.drawImage(holder, 530, 120);
context.fillText('Phase 3 - Beta', 600, 110);
context.globalAlpha = 1.0;

context.globalAlpha = 0.25;
drawRotatedImage(holder, 800, 415, 180);
context.fillText('Phase 4 - Final', 800, 560);
context.globalAlpha = 1.0;

function drawRotatedImage(image, x, y, angle) {
	context.save();
	context.translate(x, y);
	context.rotate(angle * Math.PI / 180);
	context.drawImage(image, -(image.width/2), -(image.height/2));
	context.restore();
}

</script>