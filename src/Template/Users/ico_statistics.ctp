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

<div class="container mt-3">
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
