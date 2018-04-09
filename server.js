//express
var express = require('express');
var app = express();

//nos assets (css, js, images...) sont dans le dossier public
app.use(express.static("Public"));

//pour socket.io 
var http = require('http').Server(app);
var io = require('socket.io')(http);

//base de données
var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : 'root',
  database : 'chatroom',
  port     : 8889,
});

//on se connecte tout de suite
connection.connect();

//écoute pour l'événement spécial de connexion d'un user au serveur websocket
//on reçoit la socket en argument
io.on("connection", function(socket){
    console.log("nouvelle connexion au serveur de WS!");

    //envoie un message de type "welcome" à la personne qui vient de connecter 
    //aucune donnée n'est passée en plus
    //socket.emit("welcome");

    //quand on reçoit un message de type "chat_message"...
    socket.on("message", function(data){
        console.log(data);
        //accède aux éventuelles données de session
        //on devrait sauvegarder en bdd
        connection.query('INSERT INTO message_base VALUES (NULL, ?, ?, ? , ?)', [data.date, data.content, data.nickname, data.id_chatroom], function(error, results, fields){
            //io.broadcast.emit("message", data);
        });

        io.emit("message", data);
        //on rebalance ce message à tout le monde
        
    })

})

//notre serveur http écoute sur le port 3000
http.listen(3000, function(){
    console.log("serveur démarré sur le port 3000 !");
});


