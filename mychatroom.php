<?php
    include("Layout/header.php");
?>

<html>
    <body id="body"> 
        <h1>My Chatrooms</h1>  
        <h2>Chatrooms I created</h2>
        <a href="createchatroom.php">
            <button class="btn-create">Create</button>
        </a>
        <?php 
            $nickname = $_SESSION['nickname'];
            if(!empty($nickname)){
                $sql2 ="SELECT * FROM chatroom_base  WHERE name_creator = :nickname";

                $stmt = $dbh -> prepare($sql2);
                $stmt -> execute([
                    ":nickname" => $nickname,
                ]);
                $chatrooms_created = $stmt -> fetchAll();

                foreach ($chatrooms_created as $chatroom_created){
                    echo '<div>'; 
                    echo '<a href="chatroom.php?id='.$chatroom_created['id_chatroom'].'"';           
                    echo '<p class="chatrooms">'.$chatroom_created['name_chatroom'].'</p></a>';
                    echo '</div>';
                }
            }
        ?>

        <br>

        <h2>All chatrooms</h2>
        <?PHP 
            $sql ="SELECT * FROM chatroom_base ORDER BY name_chatroom";

            $stmt = $dbh -> prepare($sql);
            $stmt -> execute();
            $chatrooms = $stmt -> fetchAll();
            
            foreach ($chatrooms as $chatroom){
                echo '<div>'; 
                echo '<a href="chatroom.php?id='.$chatroom['id_chatroom'].'"';           
                echo '<p class="chatrooms">'.$chatroom['name_chatroom'].'</p>';
                echo '</div>';
            }
        ?>
    </body>
</html>