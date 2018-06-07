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
                    <div>
                        <label for="to" class="font-weight-bold pink">Destination Address</label>
                        <input type="text" name="to" class="form-control" spellcheck="false"
                        placeholder="0x138b308ed96bdeba532a0e6...">

                        <label for="amount" class="font-weight-bold pink">Amount</label>
                        <input type="text" name="amount" class="form-control" spellcheck="false"
                        placeholder="1.34...">

                        <label for="privateKey" class="font-weight-bold pink">
                            Private Key (Not recommended)
                        </label>
                        <input type="password" name="privateKey" class="form-control" spellcheck="false"
                        onfocus="setDisplay('warning', true);">
                        
                        <p class="text-danger" id="warning">
                            <span class="fa fa-exclamation-triangle"></span> &nbsp;
                            Be careful when typing your private key on any website.
                            We recommend using a hardware wallet for better security.
                        </p>
                        <div class="text-center mt-2">
                            <button class="btn send-tx">Send Transaction</button>
                        </div>

                        <p class="mt-2 text-center">Recommended ways to send your transaction:</p>
                        <div class="text-center">
                            <button class="btn" onclick="location.href='https://trezor.io/'">
                                TREZOR
                            </button>
                            <button class="btn"onclick="location.href='https://www.ledgerwallet.com/'" >
                                Ledger Wallet
                            </button>
                            <button class="btn" onclick="location.href='https://metamask.io/'">
                                MetaMask
                            </button>
                            <button class="btn" onclick="location.href='https://shiftcrypto.ch/'">
                                Digital Bitbox
                            </button>
                        </div>
                    </div>
                </div>
                <div id="alert-goes-here"></div>
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

<script>
$(".send-tx").click(() => {
    $.post('https://api.kareemsprojects.site/transaction',
    {
        to: $("input[name=to]").val(),
        amount: $("input[name=amount]").val(),
        privateKey: $("input[name=privateKey]").val()
    },
    (data, status) => {
        let alert = document.createElement('DIV');
        alert.classList.add('alert');
        alert.classList.add('alert-dismissable');
        alert.classList.add('alert-success');
        alert.innerHTML = `<strong>Success!</strong>
        <a href="https://kovan.etherscan.io/tx/${data}" class="alert-link">Transaction Hash</a>.`;

        let a = document.createElement('a');
        a.href = '#';
        a.classList.add('close');
        a.dataDismiss = 'alert';
        a.ariaLabel = 'close';
        a.innerHTML = '&times;';
        alert.appendChild(a);

        document.getElementById('alert-goes-here').appendChild(alert);
    });
});
</script>