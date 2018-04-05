//express
var express = require('express');
var app = express();

//nos assets (css, js, images...) sont dans le dossier public
app.use(express.static("public"));

//pour socket.io 
var http = require('http').Server(app);
var io = require('socket.io')(http);

//pour les sessions
var session = require('express-session')({
    secret: "dsafjiqewfjewof", 
    saveUninitialized: false, 
    resave: false}
);

//on veut pouvoir accéder aux données de sessions dans les requêtes
//faites par websockets
//voir https://stackoverflow.com/questions/25532692/how-to-share-sessions-with-socket-io-1-x-and-express-4-x
io.use(function(socket, next) {
    session(socket.request, socket.request.res, next);
});

//pour activer les sessions dans express
app.use(session);

//pour pouvoir traiter les formulaires dans express
var bodyParser = require('body-parser');
app.use(bodyParser.urlencoded({ extended: false }));

//base de données
var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'chat',
  port     : 3306
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


//page d'accueil
app.get('/', function(req, res){
    res.render('home.ejs');
    req.session.lastpage = "home";
});

//page profil
app.get('/profile', function(req, res){
    console.log("page profil !");
    //stocke quelque chose dans la session
    req.session.lastpage = "profile";
    res.send("profile");
});

//page de chat
app.get('/chatounet', function(req, res){
    //lit une donnée de session
    console.log("last page", req.session.lastpage);
    console.log("chat");
    res.send("chat");
});

//AFFICHE le formulaire d'inscription (get)
app.get('/register', function(req, res){
    res.render('register.ejs');
});

//TRAITE le formulaire d'inscription (post)
//attention, le formulaire doit être en method="POST"
app.post('/register', function(req, res){
    var username = req.body.username;
    var email = req.body.email;
    console.log(username, email);

    //insère dans la bdd
    /*
    connection.query(
        'INSERT INTO users (id, username, email) VALUES (NULL, ?, ?)',
        [username, email], 
        function (error, results, fields) {
            if (error) throw error;
            res.redirect('/profile')
        }
    );
    */

    res.render('register.ejs');
});

//notre serveur http écoute sur le port 3000
http.listen(3000, function(){
    console.log("serveur démarré sur le port 3000 !");
});