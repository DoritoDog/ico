<head>

<style>
body {
    background-color: white;
}
</style>

<?= $this->Html->script('LandingPage') ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Partners and Advisors',     10],
        ['Project Team Share',      13],
        ['Bonus and Reserve',  9],
        ['Bounties', 3],
        ['Core Phase of Token Sale',    65]
    ]);

    var options = {
        title: 'ICO Token distribution',
        // width: 800,
        // height: 400,
        is3D: true,
        colors: ['#1100ac', 'rgb(25, 0, 255)', 'rgb(0, 60, 255)', '#0077ff', '#00aeff', '810061']
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart'));

    chart.draw(data, options);
    }
</script>
<body>

<div id="landing-header">
    <nav id="navbar" class="shadow-sm">
        <ul>
            <li>
                <a href="#landing-header" id="navbar-brand" class="navbar-link">
                    <?php
                    $options = ['height' => 30, 'class' => 'mb-1 navbar-link', 'id' => 'navbar-logo'];
                    echo $this->Html->image('CRT-white.png', $options);
                    ?>
                    &nbsp; Cryptotech
                </a>
            </li>
            <li><a href="#ico-details" class="navbar-link">ICO</a></li>
            <li><a href="#goal" class="navbar-link">Goal</a></li>
            <li><a href="#timeline" class="navbar-link">Roadmap</a></li>
            <li><a href="#faq" class="navbar-link">FAQ</a></li>
            <li><a href="#team" class="navbar-link">Team</a></li>
            <li><?php
                $url = ['controller' => 'Users', 'action' => 'add'];
                echo $this->Html->link('Sign up', $url, ['class' => 'navbar-link navbar-cta']);
            ?></li>
            <li><?php
                $url = ['controller' => 'Users', 'action' => 'login'];
                echo $this->Html->link('Login', $url, ['class' => 'navbar-link']);
            ?></li>
        </ul>
    </nav>

    <section class="centered-content">
        <div class="columns-2">

            <div id="landing-text">
                <h2 class="mt-3">CryptoToken - Secure digital transaction technology</h2>
                <button class="CTA mx-auto">Buy Token</button>
            </div>

            <!-- Countdown -->
            <div id="countdown" class="shadow-lg">
                <h3 class="text-center mb-4">Stage 2/4</h3>
                <div class="centered-content">
                    <div class="countdown circle">
                        <div id="days" class="countdown-number">??</div>
                        <h5 class="text-center mt-2 time-label">Days</h5>
                    </div>
                    <div class="countdown circle">
                        <div id="hours" class="countdown-number">??</div>
                        <h5 class="text-center mt-2 time-label">Hours</h5>
                    </div>
                    <div class="countdown circle">
                        <div id="minutes" class="countdown-number">??</div>
                        <h5 class="text-center mt-2 time-label">Minutes</h5>
                    </div>
                    <div class="countdown circle">
                        <div id="seconds" class="countdown-number">??</div>
                        <h5 class="text-center mt-2 time-label">Seconds</h5>
                    </div>
                </div>

                <div class="mx-auto mt-3" id="funds-raised">
                    <h3 class="text-center">Raised 521,338 USD</h3>
                </div>

                <div class="ico-progress mx-auto mt-5">
                    <div class="inline">
                        <div id="softcap">
                            <h5>Softcap $200K</h5>
                            <span class="fa fa-caret-down text-center"></span>
                        </div>
                        <div id="hardcap">
                            <h5>Hardcap $10M</h5>
                            <span class="fa fa-caret-down text-center"></span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress-bar-bg-2">
                            <div id="progress-bar-fill-2"></div>
                        </div>
                    </div>
                </div>

                <div class="mx-auto mt-3" id="funds-raised">
                    <h3 class="text-center">0.034 ETH ($2.02 USD)</h3>
                </div>
            </div>
            <!-- End of countdown -->

        </div>
    </section>
</div>

<section>
    <div class="container">
        <div class="row" id="ico-details-row">
            <div class="col-lg-6 centered-content">
                <div class="animated" id="ico-details">
                    <h2 class="ml-4">Initial Coin Offering</h2>
                    <ul>
                        <li>Token name - CryptoToken (CRT)</li>
                        <li><a href="#">Contract</a></li>
                        <li>Start - Feb 8, 2018 (9:00AM GMT)</li>
                        <li>End - Feb 20, 2018 (11:00AM GMT)</li>
                        <li>Accepted currencies - Bitcoin, Ethereum, Litecoin</li>
                        <li>Total amount of tokens - 76 million</li>
                        <li>Softcap - $200,000</li>
                        <li>Hardcap - 10 Million</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 inline centered-content animated" id="ico-stats">
                <?= $this->Html->image('side-stats.png', ['height' => 400]) ?>
                <div id="side-stats-text">
                    <h4 class="text-center">ICO Participants <br> <small>200K+</small></h4>
                    <h4 class="text-center">Market Price <br> <small>0.0025 BTC</small></h4>
                    <h4 class="text-center">Whitepaper <br> <small><a href="#">Download PDF</a></small></h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="purple-bg" id="goal">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 centered-content">
                <?= $this->Html->image('monorail.png', ['id' => 'monorail', 'class' => 'animated']) ?>
            </div>

            <div class="col-lg-6 centered-content">
            <div>
                <h2 class="text-center white">Our Goal</h2>
                <p style="width: 100%" class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos est aut numquam esse asperiores ut delectus ea quis consequatur tempore dolorum mollitia sint excepturi, qui tempora hic, obcaecati molestiae ex dolore molestias quia sequi deserunt assumenda laborum. Quas aspernatur quam recusandae sapiente nemo consequuntur id itaque voluptatibus similique reprehenderit! Eius!.</p>
            </div>
            </div>
        </div>
    </div>
</section>

<section id="timeline">
    <h1 class="text-center h-margin">ICO Roadmap</h1>
    <div class="h-border"></div>
    <p class="text-center mt-3 lead-text">“If you fail to plan, you are planning to fail.”</p>

    <div class="centered-content">
    <?= $this->Html->image('road.png', ['width' => 1200, 'class' => 'mx-auto', 'id' => 'roadmap-line']) ?>
    </div>

    <div class="roadmap mx-auto" style="width:80%">
        <div class="roadmap-item">
            <div class="column">
                <?=
                    $this->Html->image('roadmap dot.png', ['width' => 10, 'class' => 'mx-auto roadmap-line'])
                ?>
                <?= $this->Html->image('idea.png', ['height' => 150, 'class' => 'mx-auto mt-3 mb-3 animated']) ?>
            </div>
            <h4>Milestone One</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Illum atque quibusdam, facere vitae iusto neque.</p>
        </div>

        <div class="roadmap-item">
            <div class="column">
                <?=
                $this->Html->image('roadmap arrow.png', ['width' => 10, 'class' => 'mx-auto roadmap-line'])
                ?>
                <?= $this->Html->image(
                    'tower.png', 
                    ['height' => 150, 'class' => 'mx-auto mt-3 mb-3 animated']
                    ) ?>
            </div>
            <h4>Milestone Two</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Illum atque quibusdam, facere vitae iusto neque.</p>
        </div>

        <div class="roadmap-item">
            <div class="column">
                <?=
                    $this->Html->image('roadmap dot.png', ['width' => 10, 'class' => 'mx-auto roadmap-line'])
                ?>
                <?= $this->Html->image(
                    'milestone3.png', 
                    ['height' => 150, 'class' => 'mx-auto mt-3 mb-3 animated']
                    ) ?>
            </div>
            <h4>Milestone Three</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Illum atque quibusdam, facere vitae iusto neque.</p>
        </div>

        <div class="roadmap-item">
            <div class="column">
                <?=
                $this->Html->image('roadmap arrow.png', ['width' => 10, 'class' => 'mx-auto roadmap-line'])
                ?>
                <?= $this->Html->image('tower.png',
                    ['height' => 150, 'class' => 'mx-auto mt-3 mb-3 animated']) ?>
            </div>
            <h4>Milestone Four</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Illum atque quibusdam, facere vitae iusto neque.</p>
        </div>

        <div class="roadmap-item">
            <div class="column">
                <?=
                    $this->Html->image('roadmap dot.png', ['width' => 10, 'class' => 'mx-auto roadmap-line'])
                ?>
                <?= $this->Html->image('idea.png',
                    ['height' => 150, 'class' => 'mx-auto mt-3 mb-3 animated']) ?>
            </div>
            <h4>Milestone Five</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Illum atque quibusdam, facere vitae iusto neque.</p>
        </div>

        <div class="roadmap-item">
            <div class="column">
                <?=
                $this->Html->image('roadmap arrow.png', ['width' => 10, 'class' => 'mx-auto roadmap-line'])
                ?>
                <?= $this->Html->image('milestone3.png',
                    ['height' => 150, 'class' => 'mx-auto mt-3 mb-3 animated']) ?>
            </div>
            <h4>Milestone Six</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Illum atque quibusdam, facere vitae iusto neque.</p>
        </div>
    </div>
</section>

<section class="centered-content mt-5">
    <div class="content-90" id="distribution">
        <h1 class="text-center h-margin">Token Distribution</h1>
        <div class="h-border"></div>
        <p class="text-center mt-3 lead-text">Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Quisquam doloremque aliquid ut iure voluptates officia vel ducimus asperiores iste
            unde! Necessitatibus assumenda minus unde eligendi temporibus quas iste repudiandae! Rerum!</p>
        <div class="centered-content">
            <div id="chart" class="mb-5 animated" style="height: 400px; width: 700px;"></div>
        </div>
    </div>
</section>

<section class="mt-1 purple-bg centered-content" id="faq">
    <div class="content-90">
    <h1 class="text-center white" id="faq-title">Frequently Asked Questions</h1>
    <p class="text-center lead-text white">Lorem ipsum dolor sit amet consectetur adipisicing
        elit. Quisquam doloremque aliquid ut iure voluptates officia vel ducimus asperiores iste
        unde! Necessitatibus assumenda minus unde eligendi temporibus quas iste repudiandae! Rerum!</p>
        <div class="columns-2 mb-5">
            <div class="question question-left white animated">
                <h3>What is CryptoToken?</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae corrupti
                    necessitatibus quos nostrum earum, consequuntur quisquam repellendus sit
                    maiores at aliquid dicta doloribus qui? Explicabo aut aperiam animi nihil eveniet.</p>

                <h3>What is an ICO?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum vel minus,
                    similique minima doloremque at cumque reprehenderit beatae ea aperiam
                    provident laboriosam incidunt labore, recusandae, asperiores deleniti.
                    Sunt, eum aspernatur.</p>
            </div>
            <div class="question question-right white animated">
                <h3>How can I buy CryptoTokens?</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis reiciendis
                    voluptates numquam libero, voluptatem temporibus reprehenderit consectetur
                    odio placeat delectus nostrum laudantium a et animi vel non? Impedit quae
                    excepturi dignissimos ab suscipit sit natus.</p>
                
                <h3>What is the current value of CryptoToken?</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde adipisci perferendis
                    placeat distinctio. Inventore laborum hic iure dignissimos, deleniti omnis
                    voluptatum consequuntur et aut sit magnam molestias ipsum, ut provident!</p>
            </div>
        </div>
    </div>
</section>

<div class="bg-container" id="team">
    <div class="container">
    <h1 class="text-center h-margin">Meet the Team</h1>
    <div class="h-border mb-5"></div>
        <div class="row">
            <div class="col-lg-4 teammate animated">
                <?= $this->Html->image('chuck-norris.jpg', ['alt' => 'Chuck Norris', 'width' => 250]) ?>
                <h3>Chuck Norris</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, iusto.</p>
            </div>
            <div class="col-lg-4 teammate animated">
                <?= $this->Html->image('snoop-dogg.jpg', ['alt' => 'Snoop Dogg', 'width' => 250]) ?>
                <h3>Snoop Dogg</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, iusto.</p>
            </div>
            <div class="col-lg-4 teammate animated">
                <?= $this->Html->image('donald.jpg', ['alt' => 'Donald', 'width' => 250]) ?>
                <h3>Donald Trump</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, iusto.</p>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="centered-content-column">

    <ul class="list-unstyled footer-nav">
        <li><a href="#landing-header">CryptoToken</a></li>
        <li><a href="#ico-details">ICO</a></li>
        <li><?php
            $url = ['controller' => 'Users', 'action' => 'add'];
            echo $this->Html->link('Latest News', $url);
        ?></li>
        <li><?php
            $url = ['controller' => 'Users', 'action' => 'login'];
            echo $this->Html->link('Login', $url);
        ?></li>
    </ul>
    <div class="footer-border"></div>

    <?php
        $url = ['controller' => 'Users', 'action' => 'add'];
        echo $this->Html->link('Get CryptoToken', $url, ['class' => 'footer-cta mt-4']);
    ?>

    <ul class="list-unstyled footer-social mx-auto">
        <li><a href="#" class="column">
            <span class="fa fa-facebook-square"></span>
            Facebook
        </a></li>
        <li><a href="#" class="column">
            <span class="fa fa-github"></span>
            Github
        </a></li>
        <li><a href="#" class="column">
            <span class="fa fa-google-plus-circle"></span>
            Google+
        </a></li>
        <li><a href="#" class="column">
            <span class="fa fa-linkedin-square"></span>
            LinkedIn
        </a></li>
        <li><a href="#" class="column">
            <span class="fa fa-pinterest"></span>
            Pinterest
        </a></li>
        <li><a href="#" class="column">
            <span class="fa fa-twitter-square"></span>
            Twitter
        </a></li>
    </ul>

    <h4 class="text-center width-100">
        CryptoTech is a leader in blockchain research and innovation based in Miami, Florida.
    </h4>

    <div class="container mt-3 footer-contacts">
        <div class="row">
            <div class="col-lg-4">
                <h5><span class="fa fa-envelope"></span> cryptotech@gmail.com</h5>
            </div>
            <div class="col-lg-4">
                <h5><span class="fa fa-phone"></span> (+421) 8464 847 374</h5>
            </div>
            <div class="col-lg-4">
                <h5><span class="fa fa-globe"></span> 123 Main Street, Miami, Florida</h5>
            </div>
        </div>
    </div>
    </div>

    <div class="footer-border"></div>
    <div class="copyright-text text-center mt-3">&copy; Copyright CryptoTech 2018 | All rights reserved</div>
</footer>
</body>

<div class="se-pre-con"></div>

<script>

$('document').ready(() => {
    $('.animated').css('opacity', 0);
});

$(window).scroll(function() {
    if ($(window).width() <= 549) {
        $('.animated').css('opacity', 1);
        if ($(window).scrollTop() > 0) {
            $('#navbar').hide();
        } else {
            $('#navbar').show();
        }
        // if ($(window).scrollTop() > 480) {
        //     $('#ico-details').css('opacity', 1).addClass('fadeInLeft');
        //     $('#ico-stats').css('opacity', 1).addClass('fadeInRight');
        // }
        // if ($(window).scrollTop() > 1000) {
        //     $('#monorail').css('opacity', 1).addClass('fadeInUp');
        // }
        // if ($(window).scrollTop() > 4500) {
        //     $('#chart').css('opacity', 1).addClass('zoomInUp');
        // }
        // if ($(window).scrollTop() > 5000) {
        //     $('.question-right').css('opacity', 1).addClass('zoomInLeft');
        //     $('.question-left').css('opacity', 1).addClass('zoomInRight');
        // }
        // if ($(window).scrollTop() > 6500) {
        //     $('.teammate').css('opacity', 1).addClass('jello');
        // }
    } else if ($(window).width() > 549) {
        if ($(window).scrollTop() > 400) {
            $('#ico-details').addClass('fadeInLeft');
            $('#ico-stats').addClass('fadeInRight');
        }
        if ($(window).scrollTop() > 850) {
            $('#monorail').addClass('fadeIn');
        }
        if ($(window).scrollTop() > 1800) {
            $('.roadmap-item  .column .animated').addClass('fadeInUp');
        }
        if ($(window).scrollTop() > 2400) {
            $('#chart').css('opacity', 1).addClass('zoomInUp');
        }
        if ($(window).scrollTop() > 3000) {
            $('.question-right').css('opacity', 1).addClass('zoomInLeft');
            $('.question-left').css('opacity', 1).addClass('zoomInRight');
        }
        if ($(window).scrollTop() > 3800) {
            $('.teammate').addClass('fadeInUp');
        }
    }
});
</script>