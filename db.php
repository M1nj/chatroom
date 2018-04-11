<?php
    //Connection details
    define("DBHOST", "localhost"); 
    define("DBUSER", "root");  
    define("DBPASS", "root");      
    define("DBNAME", "chatroom");   

    try {
        //Connection to the DB
        $dbh = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //on s'assure de communiquer en utf8
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
        ));
    } 
    
    catch (PDOException $e) { //catch possible errors
        echo 'Connection error : ' . $e->getMessage();
    }
?>