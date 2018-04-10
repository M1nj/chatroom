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
        
<div class="chat_info">
<?PHP 
            foreach($titles as $title){
            echo("<p class='chatroom_title'>".$title["name_chatroom"]."</p>");
            }
        ?>
</div>
        <div id="chats">
        <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM message_base WHERE id_chatroom = :id ORDER BY date(date_create)";
            $stmt = $dbh -> prepare($sql); 
            $stmt->bindParam(":id",$id);
            $stmt->execute();//execution de la requête
            $messages = $stmt -> fetchAll(); //récuperer toutes les lignes de la requête.
            //var_dump($movies); //afficher les lignes

                
            foreach ($messages as $message){
                echo '<div class="message">';
                echo '<span class="username">'.$message['nickname'].'</span>: '.$message['message'].' ('.$message['date_create'].') ';
                echo '</div>';
                }
               
        ?>
        </div>

        <div class="user_inputs">
            <input type="text" id="message" placeholder="Type your message"></input>
            <input type="submit" id="send" value="Send"></input>
        </div>

        <script src="Public/socket.io.js"></script>
            <script>
                var socket = io.connect('http://localhost:3000');
            </script>
        <script>
            $('#send').click(function(){
                socket.emit('message',{content: $('#message').val(), nickname: '<?PHP echo $_SESSION['nickname'] ?>', date: new Date(), id_chatroom: '<?PHP echo $_GET['id'] ?>'});
                document.forms['user_inputs'].reset();
            });

            socket.on("message", function(data){
                    $("#chats").append(data.nickname, ':', data.content,"</br>");
                });
                
        </script>
</body>
</html>