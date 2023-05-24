import * as dotenv from 'dotenv';
import mysql from 'mysql2';

dotenv.config();

var clients = 0;
function queryDB(sql, args, callback) {
    // config data is pulled from .env file.
    var config = {
        host: process.env.DB_HOST,
        user: 'root',
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

export default {
    start: (http, port) => {
        http.listen(port, function() {
            console.log(`socket.io is listening on port ${port}.`);
        });
    },

    run: (io) => {
        io.on('connection', socket => {
            clients++;
            io.emit('update', { clients });

            socket.on('message', msg => {
                var values = [[msg.name, msg.profileImage, msg.message]];
                queryDB('INSERT INTO chat_messages (name, image, content) VALUES ?', [values], response => {

                    io.emit('message', msg);
                    queryDB('DELETE FROM chat_messages WHERE id = ?', [response.insertId - 10]);
                });
            });

            socket.on('disconnect', function() {
                clients--;
                io.emit('update', { clients });
            });
        });
    }
}
