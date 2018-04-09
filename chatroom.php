<?php
    include ('header.php');
    session_start();
?>
<body id="body">
    <div id="chats">

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