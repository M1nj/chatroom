<?php
    include ('header.php');
    session_start();
    ini_set("display_errors", 1);
    include("db.php");
   
    $id = $_GET['id'];
        
    $sql ="SELECT * FROM chatroom_base
    WHERE id_chatroom LIKE :id";
            
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute([":id" => $id]);
    $titles = $stmt -> fetchAll();   
?>
    <body id="body">
        <?PHP 
            foreach($titles as $title){
            echo("<div class='chatroom_title'>".$title["name_chatroom"]."</div>");
            }
        ?>

        <div id="chats">
        <?php

            $sql = "SELECT * FROM message_base ORDER BY date(date_create)";
            $stmt = $dbh -> query($sql); //execution de la requête
            $messages = $stmt -> fetchAll(); //récuperer toutes les lignes de la requête.
            //var_dump($movies); //afficher les lignes

                
            foreach ($messages as $message){
                echo '<p>';
                echo ''.$message['nickname'].' : '.$message['message'].'';
                echo '</p>';
                }
               
        ?>
        </div>

        <div class="user_inputs">
            <input type="text" id="message" placeholder="Type your message"></input>
            <input type="button" id="send" value="Send"></input>
        </div>

        <script src="Public/socket.io.js"></script>
            <script>
                var socket = io.connect('http://localhost:3000');
            </script>
        <script>
            console.log("Hello");
            $('#send').click(function(){
                socket.emit('message',{content: $('#message').val(), nickname: '<?PHP echo $_SESSION['nickname'] ?>', date: new Date(), id_chatroom: '<?PHP echo $_GET['id'] ?>'});
                console.log("Hello");
            });

            socket.on("message", function(data){
                    $("#chats").append(data.nickname, ':', data.content,"</br>");
                });
        </script>
</body>
</html>