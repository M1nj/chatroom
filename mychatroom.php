<?php
    include 'header.php';
    session_start();
    ini_set("display_errors", 1);
    include("db.php");

?>

<html>
<body id="body"> 
    <h1>My Chatrooms</h1>  
        <h2>Chatrooms I created</h2>
            <a href="createchatroom.php"><button class="btn-create">Create</button></a>



        <br>
        <h2>Chatrooms I'm in</h2>
        
</body>
</html>