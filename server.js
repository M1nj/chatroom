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
  port     : 8888
});

//on se connecte tout de suite
connection.connect();

//écoute pour l'événement spécial de connexion d'un user au serveur websocket
//on reçoit la socket en argument
io.on("connection", function(socket){
    console.log("nouvelle connexion au serveur de WS!");

    //envoie un message de type "welcome" à la personne qui vient de connecter 
    //aucune donnée n'est passée en plus
    socket.emit("welcome");

    //quand on reçoit un message de type "chat_message"...
    socket.on("chat_message", function(data){
        //accède aux éventuelles données de session
        console.log(socket.request.session);

        //on devrait sauvegarder en bdd

        //on rebalance ce message à tout le monde
        io.emit("chat_message", data);
    })

})

//notre serveur http écoute sur le port 3000
http.listen(3000, function(){
    console.log("serveur démarré sur le port 3000 !");
});