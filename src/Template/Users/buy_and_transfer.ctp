<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);ethereum

function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Currency');
    data.addColumn('number', 'Amount');

    data.addRows([
        ['Bitcoin', 1],
        ['Ethereum', 2],
        ['Litecoin', 3]
    ]);

    var options = {
        title: 'Contributions',
        legend: { position: "none" },
        colors: ['rgb(68, 0, 255)']
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('contributions-chart'));
    chart.draw(data, options);
}
</script>

<style>
#sidebar {
    background: white;
    border: none;
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
    <div class="header-container">
        <div class="header" id="buy-and-sell-header"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="outline shadow-sm" id="buy">
                    <h5 class="text-center blue"><span class="fa fa-bank"></span> Buy Tokens</h5>
                    <p>To buy CryptoTokens, please send a currency of your choice to any of these addresses.</p>
                    
                    <div class="buy-address">
                        <label for="address"><b class="pink">Bitcoin</b></label>
                        <div class="copy-field">
                            <input type="text" value="<?= h($user->bitcoin_address) ?>" class="form-control" id="bitcoin" spellcheck="false" readonly>
                            <button onclick="copyToClipboard('bitcoin')"><span class="fa fa-clipboard"></span></button>
                        </div>
                    </div>

                    <div class="buy-address">
                        <label for="address"><b class="pink">Ethereum</b></label>
                        <div class="copy-field">
                            <input type="text" value="<?= h($contractAddress) ?>" class="form-control" id="eth" spellcheck="false" readonly>
                            <button onclick="copyToClipboard('eth')"><span class="fa fa-clipboard"></span></button>
                        </div>
                    </div>

                    <div class="buy-address">
                        <label for="address"><b class="pink">Litecoin</b></label>
                        <div class="copy-field">
                            <input type="text" value="<?= h($user->litecoin_address) ?>" class="form-control" id="litecoin" spellcheck="false" readonly>
                            <button onclick="copyToClipboard('litecoin')"><span class="fa fa-clipboard"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="outline shadow-sm" id="transfer">
                    <h5 class="text-center blue"><span class="fa fa-exchange"></span> Transfer Tokens</h5>

                    <?php
                    echo $this->Form->create(false, ['url' => 'https://api.kareemsprojects.site']);

                    $labelClass = ['class' => 'font-weight-bold pink'];
                    echo $this->Form->label('to', 'Destination Address', $labelClass);
                    $toOptions = [
                        'name' => 'to', 'class' => 'form-control', 'label' => false, 'spellcheck' => false,
                        'required' => true, 'placeholder' => '0x138b308ed96bdeba532a0e6...'
                    ];
                    echo $this->Form->input('to', $toOptions);

                    echo $this->Form->label('amount', 'Amount', $labelClass);
                    $amountOptions = [
                        'name' => 'amount', 'class' => 'form-control', 'label' => false,
                        'required' => true, 'placeholder' => '1.34...'
                    ];
                    echo $this->Form->input('amount', $amountOptions);

                    echo $this->Form->label('privateKey', 'Private Key (Not recommended)', $labelClass);
                    $keyOptions = [
                        'name' => 'privateKey', 'type' => 'password', 'class' => 'form-control',
                        'label' => false, 'required' => false, 'onfocus' => "setDisplay('warning', true);"
                    ];
                    echo $this->Form->input('privateKey', $keyOptions);
                    ?>
                    <p class="text-danger" id="warning">
                        <span class="fa fa-exclamation-triangle"></span> &nbsp;
                        Be careful when typing your private key on any website.
                        We recommend using a hardware wallet for better security.
                    </p>
                    <p class="mt-2">Recommended ways to send your transaction:</p>
                    <div id="recommended-tx" class="text-center">
                        <button class="btn">TREZOR</button>
                        <button class="btn">Ledger Wallet</button>
                        <button class="btn">MetaMask</button>
                        <button class="btn">Digital Bitbox</button>
                    </div>
                    <div class="text-center">
                    <?php
                        echo $this->Form->hidden('txRequest');
                        echo $this->Form->button('Send Transaction', ['class' => 'btn']);
                        echo $this->Form->end();
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="outline shadow-sm">
                <h5 class="text-center blue"> Your Contributions</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Value (in USD)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $this->Html->image('BTC.png', ['height' => 25]) ?></td>
                        <td>0.54</td>
                        <td>$567.34</td>
                    </tr>
                    <tr>
                        <td><?= $this->Html->image('ETH.png', ['height' => 25]) ?></td>
                        <td>0.54</td>
                        <td>$567.34</td>
                    </tr>
                    <tr>
                        <td><?= $this->Html->image('LTC.png', ['height' => 25]) ?></td>
                        <td>0.54</td>
                        <td>$567.34</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="outline shadow-sm">
                    <div id="contributions-chart" class="mt-4"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="outline shadow-sm mx-auto">
                <h5 class="text-center blue">Your CryptoToken Transaction History</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Reciever</th>
                        <th>Amount</th>
                        <th>Value</th>
                        <th>Time</th>
                        <th>Hash</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($transfers as $transfer): ?>
                    <tr>
                        <td><?= h(substr($transfer->to_address, 0, 30) . '...') ?></td>
                        <td><?= h($transfer->amount) ?></td>
                        <td>$24.32</td>
                        <td><?= h($transfer->timestamp) ?></td>
                        <td><?= h(substr($transfer->hash, 0, 30) . '...') ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</div>
</body>