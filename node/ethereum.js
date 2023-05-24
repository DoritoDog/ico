import * as dotenv from 'dotenv';
import fs from 'fs';
import lightWallet from 'eth-lightwallet';
import util from 'ethereumjs-util';
import tx from 'ethereumjs-tx';
import Web3 from 'web3';

dotenv.config();
// Connect to infura to avoid having to download the entire blockchain.
const web3 = new Web3(new Web3.providers.HttpProvider("https://kovan.infura.io/MalstqsO7EYyOSLpTUdi"));
const txUtils = lightWallet.txutils;

//#region Contract variables
const tokenAddress = '0xD255C2475E0091dA738DfFd1650B438b8eb9ce6D';
const tokenBytecode = fs.readFileSync('./token_bytecode.txt', 'utf8');
const tokenABI = JSON.parse(fs.readFileSync('./token_abi.txt', 'utf8'));

var crowdsaleAddress = '0xab5833a0b481610b3d93b6e80e3fce7a9edba925';
var crowdsaleBytecode = fs.readFileSync('./crowdsale_bytecode.txt', 'utf8');
var crowdsaleABI = JSON.parse(fs.readFileSync('./crowdsale_abi.txt', 'utf8'));
//#endregion

/**
 * Users receive tokens when they send ether to the crowdsale contract.
 * Crowdsale contract: https://kovan.etherscan.io/address/0xab5833a0b481610b3d93b6e80e3fce7a9edba925
 * Token contract: https://kovan.etherscan.io/address/0xD255C2475E0091dA738DfFd1650B438b8eb9ce6D
 */
const tokenDefinition = web3.eth.contract(tokenABI);
const token = tokenDefinition.at(tokenAddress);
const crowdsaleDefinition = web3.eth.contract(crowdsaleABI);
const crowdsale = crowdsaleDefinition.at(crowdsaleAddress);

// Transactions modify the state of the contract, require ETH, and must be signed by a private key.
function sendRawTx(rawTx, privateKeyString) {
    let privateKey = new Buffer(privateKeyString, 'hex');
    let transaction = new tx(rawTx);

    transaction.sign(privateKey);

    let serializedTx = transaction.serialize().toString('hex');

    web3.eth.sendRawTransaction('0x' + serializedTx, (error, result) => {
        if (error) {
            console.log(error);
        } else {
            console.log(result);
            return result;
        }
    });
}

// Automatically appends 0x to the beginning if it is not there already.
function getAddress(privateKey) {
    privateKey = privateKey.startsWith('0x') ? privateKey : '0x' + privateKey;
    var buffer = util.privateToAddress(privateKey);
    return '0x' + buffer.toString('hex');
}

function sendTx(from, contractAddress, abi, functionName, args) {
    let options = {
        nonce: web3.toHex(web3.eth.getTransactionCount(from)),
        gasLimit: web3.toHex(800000),
        gasPrice: web3.toHex(20000000000),
        to: contractAddress
    };

    let rawTx = txUtils.functionTx(abi, functionName, args, options);
    return sendRawTx(rawTx, privateKey);
}

export default {
    getBalance: address => {
        return 0;
        let balance = token.balanceOf(address);
        return web3.toDecimal(web3.fromWei(balance, 'ether'));
    },

    /**
     * The amount is automatically converted into wei.
     */
    transferTokens: (to, amount, privateKey) => {
        let from = getAddress(privateKey);
        amount = web3.toWei(amount);
        sendTx(from, tokenAddress, tokenABI, 'transfer', [to, amount]);
    },

    /**
     * The amount is automatically converted into wei.
     */
    mintToken: (target, amount) => {
        amount = web3.toWei(amount);
        sendTx(process.env.OWNER_ADDRESS, tokenAddress, tokenABI, 'mintToken', [target, amount]);
    },

    getContribution: address => {
        var contribution = crowdsale.balances(address);
        return web3.toDecimal(web3.fromWei(contribution, 'ether'));
    },
};
