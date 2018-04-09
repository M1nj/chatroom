<?php
    include 'header.php';
    session_start();
?>

   <div class="container">
    <h1 class="title">Hey <?PHP echo $_SESSION["nickname"]?> !</h1>



        <form class="form register" method="post" action="register.php">
  <div class="form-group">
    <input type="text" class="form-control" name="nickname" placeholder="<?PHP echo $_SESSION["nickname"]?>">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail" name="mail"aria-describedby="emailHelp" placeholder="<?PHP echo $_SESSION["mail"]?>">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password"id="exampleInputPassword" placeholder="<?PHP echo $_SESSION["password"]?>">
  </div>
 
</form>



<img src="IMG/profile-10.png" class:"profile-pic" alt="">



</body>


