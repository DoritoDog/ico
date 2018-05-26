<head>

<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<style>
body {
    background: #131313;
}
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

google.charts.load('current', {'packages':['corechart', 'controls']});
google.charts.setOnLoadCallback(drawDashboard);

function rand(seed) {
    var x = Math.sin(seed++) * 10000;
    return x - Math.floor(x);
}

var rates = <?= json_encode($rates) ?>;
var currencyCode = 'USD';

function setCurrency(code) {
    currencyCode = code;
    drawDashboard();

    document.getElementById('market-price').innerHTML = '$' + 1.03 * rates[code];
}

function drawDashboard() {
    var year = <?= $date->year ?>;
    var month = <?= $date->month - 1 ?>;
    var day = <?= $date->day - 200 ?>;
    
    var data = new google.visualization.DataTable();
    data.addColumn('date', 'Day');
    data.addColumn('number', 'Value');
    data.addRows(200);

    for (var i = 0; i < 200; i++) {
        data.setCell(i, 0, new Date(year, month, ++day));

        var exchangeRate = rates[currencyCode];
        data.setCell(i, 1, rand(i) * exchangeRate);
    }
    
    var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard'));

    var control = new google.visualization.ControlWrapper({
        'controlType': 'ChartRangeFilter',
        'containerId': 'control',
        'state': {'range': {'start': new Date(year, month, day - 31), 'end': new Date()}},
        'options': {
            'filterColumnLabel': 'Day',
            'ui': {
                'chartType': 'LineChart',
                'chartOptions': {
                    'chartArea': {'width': '70%'},
                    'hAxis': {'baselineColor': 'none'},
                    hAxis: {
                        textStyle: { color: 'white' }
                    },
                    backgroundColor: '#131313',
                    colors: ['#FF0054']
                }
            }
        }
    });
    
    var chart = new google.visualization.ChartWrapper({
        'chartType': 'LineChart',
        'containerId': 'chart',
        'options': {
            hAxis: {
                titleTextStyle: { color: 'white' },
                textStyle: { color: 'white' }
            },
            vAxis: {
                title: 'Market Price',
                titleTextStyle: { color: 'white' },
                textStyle: { color: 'white' }
            },
            height: 400,
            width: '80%',
            legend: 'none',
            'chartArea': {'width': '80%', 'height': '80%'},
            vAxis: { gridlines: { count: 4 } },
            backgroundColor: '#131313',
            colors: ['#ff0054']
        }
    });

    dashboard.bind(control, chart);
    dashboard.draw(data);
}

$(window).resize(function(){
    drawDashboard();
});

</script>
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
                ['action' => 'index'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Buy & Transfer Tokens', ['action' => 'buyAndTransfer'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-globe')),
                ['action' => 'index'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('News', ['action' => 'news'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-area-chart')),
                ['action' => 'index'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('ICO Statistics', ['action' => 'icoStatistics'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-cube')),
                ['action' => 'index'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Block Explorer', ['action' => 'blockExplorer'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-address-book')),
                ['action' => 'index'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Account', ['action' => 'profile'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-gear')),
                ['action' => 'index'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Settings', ['action' => 'settings'], ['class' => 'sidebar-link']) ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-user')),
                ['action' => 'index'],
                ['escape' => FALSE]
            );
            ?>
            <?= $this->Html->link('Sign out', ['action' => 'logout'], ['class' => 'sidebar-link']) ?>
        </li>
    </ul>
</div>

<div id="content">
    <div class="user inline">
        <?= $this->Html->image($user->profile_image, ['height' => 35, 'url' => ['action' => 'profile']]) ?>
        &nbsp;
        <?= $this->Html->link(h($user->full_name), ['action' => 'profile']) ?>
    </div>
    <h3 class="pink text-center pt-5">CryptoToken Market Price</h3>
    <div class="title-underline"></div>
    <h5 class="text-center white pt-2" id="market-price">$1.03</h5>
    
    <div class="btn-group mr-5" id="currencies-btn-group">
        <button type="button" class="btn currency-btn" onclick="setCurrency('USD');">USD</button>
        <button type="button" class="btn currency-btn" onclick="setCurrency('EUR');">EUR</button>
        <button type="button" class="btn currency-btn" onclick="setCurrency('BTC');">BTC</button>
    </div>

    <div id="dashboard" class="mt-5">
        <div id="chart"></div>
        <div id="control" style="height: 100px"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div id="chat">
                <h3 class="pink text-center pt-5">Global Chat</h3>
                <div class="title-underline"></div>
                <h5 class="text-center white pt-2" id="market-price">12 Online</h5>

                <div class="messages-holder" id="messages-holder">
                    <?php for($i = 0; $i < 5; $i++): ?>

                    <div class="chat-msg" id="chat-msg">
                        <?= $this->Html->image(
                            'merica.png',
                            ['width'=>35, 'height'=>35, 'class'=>'mr-2']
                        ) ?>
                        <p><span class="msg-sender"><?= h($user->full_name) ?></span>
                        <span class="msg-content">: Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Repellendus tempora dolores magnam consequuntur aspernatur explicabo,
                            eveniet minima molestiae doloribus quam.</span></p>
                    </div>

                    <?php endfor; ?>
                </div>

                <div>
                <?php
                    $options = ['url' => ['action' => 'index'], 'id' => 'chat-form', 'class' => 'inline'];
                    echo $this->Form->create(false, $options);

                    echo $this->Html->image($user->profile_image, ['width' => 35, 'class' => 'mr-3']);

                    $options = [
                        'name' => 'text', 'placeholder' => 'Write a message...', 'id' => 'send-msg',
                        'class' => 'inline form-control', 'required' => 'true', 'label' => false,
                        'style' => 'width: 200%'
                    ];
                    echo $this->Form->input('', $options);
                    echo $this->Form->button(
                        'Send',
                        ['class' => 'btn send-btn', 'style' => 'margin-left: 200px']
                    );

                    echo $this->Form->end();
                ?>
                </div>
                
                <?= $this->Html->script('socket.io.js') ?>
                <script>
                try {
                var socket = io.connect( 'http://localhost:8080' );

                $("#chat-form").submit( function() {
                    var userName = '<?= $user->full_name ?>';
                    var profilePic = '<?= $user->profile_image ?>';
                    var msg = document.getElementById('send-msg').value;

                    socket.emit('message', { name: userName, message: msg, profileImage: profilePic });

                    return false;
                });
                
                socket.on('message', function(msg){
                    var message = $("#chat-msg").clone().appendTo("#messages-holder");
                    message.find(".msg-sender").html(msg.name);
                    message.find(".msg-content").html(msg.message);
                });

                } catch (e) {
                    alert(e);
                }
                </script>

            </div>
            </div>

            <div class="col-sm-3 latest-stories">
                <h3 class="pink text-center pt-5">Latest Stories</h3>
                <div class="title-underline mb-5"></div>
                <?php foreach($stories as $related_story): ?>
                
                    <div class="related-article">
                    <?php
                        $options = [
                            'width' => 250,
                            'url' => ['controller' => 'Stories', 'action' => 'view', $related_story->slug]
                        ];
                        echo $this->Html->image($related_story->cover_image, $options);
                    ?>
                    <h5><?php
                        $options =  ['controller' => 'Stories', 'action' => 'view', h($related_story->slug)];
                        echo $this->Html->link(h($related_story->title), $options, ['class' => 'link white']);
                    ?></h5>
                    </div>

                <?php endforeach; ?>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="pink text-center pt-5">Contract Code</h3>
                <div class="title-underline mb-2"></div>
                <div class="centered-content mb-3">
                    <div class="inline">
                        <a href="#" class="white">
                            <span class="fa fa-github white" style="font-size: 25px;"></span> &nbsp;
                            View on GitHub
                        </a>
                    </div>
                </div>

                <div class="contract-code-container mx-auto">
                <pre><code class="js">
pragma solidity ^0.4.17;

contract ERC20 {
    function totalSupply() public constant returns (uint256);
    function balanceOf(address account) public constant returns (uint256 balance);
    function allowance(address account, address spender) public constant returns (uint256 remaining);
    function transfer(address to, uint256 tokens) public returns (bool success);
    function approve(address spender, uint256 tokens) public returns (bool success);
    function transferFrom(address from, address to, uint256 tokens) public returns (bool success);
    
    event Transfer(address indexed from, address indexed to, uint256 tokens);
    event Approval(address indexed tokenOwner, address indexed spender, uint256 tokens);
}

contract Token is ERC20 {
    
    bytes32 public name = "CryptoToken";
    bytes32 public symbol = "CRT";
    uint8 public decimals = 18;
    
    uint256 public totalSupply;
    address public owner;
    
    mapping(address => uint256) balances;
    mapping(address => mapping(address => uint256)) allowances;
    
    function Token() public {
        totalSupply = 100 * 10 ** uint256(decimals);
        owner = msg.sender;
        balances[owner] = totalSupply;
    }
    
    function totalSupply() public constant returns (uint256) {
        return totalSupply;
    }
    
    function balanceOf(address accountAddress) public constant returns (uint256 balance) {
        return balances[accountAddress];
    }
    
    function allowance(address account, address spender) public constant returns (uint256 remaining) {
        return allowances[account][spender];
    }
    
    function transfer(address to, uint256 tokens) public returns (bool success) {
        _transfer(msg.sender, to, tokens);
        return true;
    }
    
    function _transfer(address from, address to, uint256 value) internal {
        // Prevent transfer to 0x0 address.
        require(to != 0x0);
        // Check if the sender has enough
        require(balances[from] >= value);
        // Check for overflows
        require(balances[to] + value > balances[to]);
        // Save this for an assertion in the future
        uint previousBalances = balances[from] + balances[to];
        // Subtract from the sender
        balances[from] -= value;
        // Add the same to the recipient
        balances[to] += value;
        Transfer(from, to, value);
        // Asserts are used to use static analysis to find bugs in your code. They should never fail
        assert(balances[from] + balances[to] == previousBalances);
    }
    
    function approve(address spender, uint256 tokens) public returns (bool success) {
        allowances[msg.sender][spender] = tokens;
        Approval(msg.sender, spender, tokens);
        return true;
    }
    
    function transferFrom(address from, address to, uint256 tokens) public returns (bool success) {
        // Check if they have enough funds in their allowance.
        require(tokens <= allowances[from][msg.sender]);
        allowances[from][msg.sender] -= tokens;
        _transfer(from, to, tokens);
        
        return true;
    }
    
    function mintToken(address target, uint256 amount) public {
        require(msg.sender == owner);
        
        balances[target] += amount;
        totalSupply += amount;
        Transfer(0, owner, amount);
        Transfer(owner, target, amount);
    }
}
                </pre></code>
                </div>

                <div class="contract-code-container mx-auto">
                <pre><code class="js">
pragma solidity ^0.4.16;

contract token {
    function totalSupply() public constant returns (uint256);
    function balanceOf(address account) public constant returns (uint256 balance);
    function allowance(address account, address spender) public constant returns (uint256 remaining);
    function transfer(address to, uint256 tokens) public returns (bool success);
    function approve(address spender, uint256 tokens) public returns (bool success);
    function transferFrom(address from, address to, uint256 tokens) public returns (bool success);
    function mintToken(address target, uint256 amount) external returns (bool success);
    
    event Transfer(address indexed from, address indexed to, uint256 tokens);
    event Approval(address indexed tokenOwner, address indexed spender, uint256 tokens);
}

contract ICO {
    address public beneficiary;
    uint public goal;
    uint public fundsRaised;
    uint public deadline;
    uint public price;
    token public rewardToken;
    bytes32 public testStr;
    
    mapping(address => uint) public balances;
    bool hasGoalBeenReached = false;
    bool isCrowdsaleClosed = false;

    event GoalReached(address recipient, uint totalFundsRaised);
    event FundTransfer(address backer, uint amount, bool isContribution);

    /*function ICO(
        address _beneficiary, uint goalInEther, uint durationInMinutes,
        /int priceInEther, address addressOfTokenUsedAsReward
    ) public {
        beneficiary = _beneficiary;
        goal = goalInEther * 1 ether;
        deadline = now + durationInMinutes * 1 minutes;
        price = priceInEther * 1 ether;
        rewardToken = token(addressOfTokenUsedAsReward);
    }*/
    
    function ICO() public {
        beneficiary = 0x7A69757bee3c454AB364C41B26b4Bfe29fc94E89;
        goal = 20 * 1 ether;
        deadline = now + 300 * 1 minutes;
        price = 1 * 1 ether;
        rewardToken = token(0x0953972457d2341557Eda81E041554b6fA074375);
    }

    /**
     * Fallback function
     *
     * The function without a name is the default function that is called whenever anyone sends funds to a contract
     */
    function () payable public {
        require(!isCrowdsaleClosed);
        
        uint amount = msg.value;
        balances[msg.sender] += amount;
        fundsRaised += amount;
        FundTransfer(msg.sender, amount, true);
        
        rewardToken.mintToken(msg.sender, amount / price);
    }

    modifier afterDeadline() { if (now >= deadline) _; }

    function checkIfGoalHasBeenReached() public afterDeadline {
        if (fundsRaised > goal) {
            hasGoalBeenReached = true;
            GoalReached(beneficiary, fundsRaised);
        }

        isCrowdsaleClosed = true;
    }

    /**
     * Withdraw the funds
     *
     * Checks to see if goal or time limit has been reached, and if so, and the funding goal was reached,
     * sends the entire amount to the beneficiary. If goal was not reached, each contributor can withdraw
     * the amount they contributed.
     */
    function withdraw() public afterDeadline {
        if (!hasGoalBeenReached) {
            uint balance = balances[msg.sender];
            balances[msg.sender] = 0;
            if (balance > 0) {
                if (msg.sender.send(balance)) {
                    FundTransfer(msg.sender, balance, false);
                } else {
                    balances[msg.sender] = balance;
                }
            }
        }

        // When the ICO is over, the owner can withdraw all ether on the contract
        if (hasGoalBeenReached && beneficiary == msg.sender) {
            if (msg.sender.send(fundsRaised)) {
                FundTransfer(msg.sender, fundsRaised, false);
            } else {
                hasGoalBeenReached = false;
            }
        }
    }
}
                </pre></code>
                </div>
            </div>
        </div>
    </div>
</div>