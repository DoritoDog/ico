import express from 'express';
import * as dotenv from 'dotenv';
import { Server } from 'http';
import io from 'socket.io';
import chat from './chat.js';
import bodyParser from 'body-parser';
import mysql from 'mysql2';
import ethereum from './ethereum.js';

dotenv.config();
const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: true}));
const http = Server(app);

chat.start(http, process.env.SOCKET_PORT);
chat.run(io(http));

app.get('/', (req, res) => {
    res.status(200).send();
});

app.listen(process.env.HTTP_PORT, () => {
    console.log(`app.js is listening on port ${process.env.HTTP_PORT}.`);
});

app.get('/chat', (req, res) => {
    setHeaders(res);

    queryDB('SELECT name, image, content FROM chat_messages LIMIT 10', [], result => {
        for (var i = 0; i < result.length; i++) {
            var chatMessage = result[i];
            result[i] = {
                name: chatMessage.name,
                profileImage: chatMessage.image,
                message: chatMessage.content
            };
        }

        // Send the result in json format.
        res.send(result);
    });
});

// Retreives the token balance for the provided user.
app.post('/balance', (req, res) => {
    setHeaders(res);

    let balance = 0;// ethereum.getBalance(req.body.address);
    res.send(balance.toString());
});


// Sends {amount} to address {to} from the address derived from {privateKey}.
app.post('/transaction', (req, res) => {
    setHeaders(res);

    let hash = ethereum.transferTokens(req.body.to, req.body.amount, req.body.privateKey);
    res.send(hash);
});

app.post('/contribution', (req, res) => {
    setHeaders(res);

    let contribution = ethereum.getContribution(req.body.address);
    res.send(contribution.toString());
});

// Args are automatically escaped.
// The callback parameter is not required.
function queryDB(sql, args, callback) {
    // config data is pulled from .env file.
    var config = {
        host: process.env.DB_HOST,
        user: "root",
        password: process.env.DB_PASSWORD,
        database: process.env.DB_NAME
    };

    var connection = mysql.createConnection(config);
    connection.connect(err => {
        if (err) throw err;

        // Run the query correctly based on whether it needs args.
        if (args.length > 0) {
            connection.query(sql, args, (err, result) => {
                if (err) throw err;
                connection.end();

                // Avoid dead ends.
                if (typeof callback !== 'undefined') callback(result);
            });
        } else {
            connection.query(sql, (err, result) => {
                if (err) throw err;
                connection.end();

                if (typeof callback !== 'undefined') callback(result);
            });
        }
    });
}

// Allow AJAX to be used on the front-end.
function setHeaders(res) {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
    res.setHeader('Access-Control-Allow-Credentials', true);
}
