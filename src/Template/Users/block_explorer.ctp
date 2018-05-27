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
    <h3 class="pink text-center pt-5">Block Explorer</h3>
    <div class="title-underline mb-5"></div>
    <div class="block-search">
    <?php
    echo $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'blockExplorer']]);

    $options = [
        'type' => 'text', 'placeholder' => 'Find block by hash...',
        'class' => 'form-control', 'name' => 'input'
    ];
    echo $this->Form->input('', $options);
    echo $this->Form->button('', ['class' => 'fa fa-search search-button']);

    echo $this->Form->end();
    ?>
    </div>
    <div class="container">
    <div class="row">
    <div class="col-lg-6">
    <h4 class="pink text-center">Blocks</h4>
        <table class="table" id="blocks-table">
            <thead>
            <tr>
                <th>No.</th>
                <th>Hash</th>
                <th>Transactions</th>
                <th>Age</th>
                <th>Miner</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < 10; $i++): ?>
            <tr>
                <td>284743</td>
                <td class="tx-hash" data-toggle="popover"
                data-content="0x0a8741d9cf54b2ad6dda1a00faad9b2db6661ec303f2fa8a28007fe41ae6d5fe">
                0x0a8741d9c...</td>
                <td class="text-center">4</td>
                <td>50 secs</td>
                <td class="tx-hash" data-toggle="popover"
                data-content="0x00a0a24b9f0e5ec7aa4c7389b8302fd0123194de">
                0x00a0a24b9f...</td>
            </tr>
            <?php endfor; ?>
            </tbody>
        </table>
    </div>
    <div class="col-lg-6">
    <h4 class="pink text-center">Transactions</h4>
        <?php for ($i = 0; $i < 10; $i++): ?>
        <div class="transaction inline outline-dark centered-content">
            <div class="tx-sender tx-hash" data-toggle="popover"
            data-content="0x0a8741d9cf54b2ad6dda1a00faad9b2db6661ec303f2fa8a28007fe41ae6d5fe"
            >0x0a8741d9c...</div>
            <span class="fa fa-arrow-circle-right"></span>
            <div class="tx-reciever tx-hash" data-toggle="popover"
            data-content="0x0a8741d9cf54b2ad6dda1a00faad9b2db6661ec303f2fa8a28007fe41ae6d5fe">
            0x0a8741d9c...</div>
            <div class="tx-value">6 CryptoTokens</div>
        </div>
        <?php endfor; ?>
    </div>
    </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

</body>