<?php
    include("Layout/header.php");
    $id = $_GET['id'];
  
    $sql ="SELECT * FROM chatroom_base
    WHERE id_chatroom LIKE :id";
     
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute([":id" => $id]);
    $chatroom_infos = $stmt -> fetchAll();   
?>

<body id="body">
    <div class="chat_info">
        <?PHP 
            foreach($chatroom_infos as $chatroom_info){
                echo("<p class='chatroom_title'>".$chatroom_info["name_chatroom"]."</p>");
            }
        ?>
    </div>
    
    <div id="chats">
        <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM message_base WHERE id_chatroom = :id ORDER BY date(date_create)";
            $stmt = $dbh -> prepare($sql); 
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            
            $messages = $stmt -> fetchAll();
  
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
        <span>
        <form method="post"  action="delete_chatroom.php">
            <input type="hidden" value="<?php echo $chatroom_info["id_chatroom"];?>" name="id_chatroom" required>
            <input type="submit" name="delete_chatroom" id="delete" value="Delete this chatroom" action="delete_chatroom.php">
        </form>
        </span
    </div>
    
    <!--Load socket.io-->
    <script src="Public/socket.io.js">
    </script>

    <!--Connect to the server-->
    <script>
        var socket = io.connect('http://localhost:3000');
    </script>

    <!--Chat function-->
    <script>
        $('#send').click(function(){
            socket.emit('message',{content: $('#message').val(), nickname: '<?PHP echo $_SESSION['nickname'] ?>', date: new Date(), id_chatroom: '<?PHP echo $_GET['id'] ?>'});
        });

        socket.on("message", function(data){
            $("#chats").append(data.nickname, ':', data.content,"</br>");
        });
    </script>
    
</body>
</html>