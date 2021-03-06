<div class="block-explorer">
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
        
    <h3 class="pink text-center pt-5">Block Explorer</h3>
    <div class="title-underline mb-2"></div>
    <div class="block-search mb-3">
    <?php
    echo $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'blockExplorer']]);

    $options = [
    'type' => 'text', 'placeholder' => 'Find block by hash...',
    'class' => 'form-control dark-input', 'name' => 'input'
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
                        <th id="transactions-title">Txs</th>
                        <th>Age</th>
                        <th>Miner</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($i = 0; $i < 10; $i++): ?>
                    <tr>
                        <td>284743</td>
                        <td class="tx-hash block-hash" data-toggle="popover"
                        data-content="0x0a8741d9cf54b2ad6dda1a00faad9b2db6661ec303f2fa8a28007fe41ae6d5fe">
                        0x0a8741d9c...</td>
                        <td class="text-center">4</td>
                        <td>50 secs</td>
                        <td class="tx-hash block-hash" data-toggle="popover"
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
                <div class="transaction inline outline-dark centered-content w-100">
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

<div id="like_button_container"></div>

<!-- React -->
<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
<?= $this->Html->script('BlockExplorer.js') ?>