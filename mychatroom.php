<?php
    include 'header.php';
    session_start();
    ini_set("display_errors", 1);
    include("db.php");

    $sql ="SELECT * FROM chatroom_base ORDER BY name_chatroom";

    $stmt = $dbh -> prepare($sql);
    $stmt -> execute();
    $chatrooms = $stmt -> fetchAll();

?>

<html>
<body id="body"> 
    <h1>My Chatrooms</h1>  
        <h2>Chatrooms I created</h2>
            <a href="createchatroom.php"><button class="btn-create">Create</button></a>

        <br>
        <h2>Chatrooms I'm in</h2>
        <br>
        <h2>All chatrooms</h2>
        <?PHP 
        foreach ($chatrooms as $chatroom){
            echo '<div>'; 
            echo '<a href="chatroom.php?id='.$chatroom['id_chatroom'].'"';           
            echo '<p class="chatrooms">'.$chatroom['name_chatroom'].'</p>';
            echo '</div>';
            
            }
        ?>
        
</body>
</html>