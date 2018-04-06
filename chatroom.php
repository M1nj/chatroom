<?php
    include ('header.php');
    session_start();
?>
<body id="body">
    <div class="chats">

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
        socket.emit('message',{content: $('#message').val(), nickname: '<?PHP echo $_SESSION['nickname'] ?>', date: new Date() });
        console.log("Hello");
    })
</script>

</body>
</html>