<?php
    include 'header.php';
    include 'db.php'; 
    session_start();
   
   

    //$theme = $_GET['checkbox'];

?>

   <div class="container">
    <h1 class="title">Hey <?PHP echo $_SESSION["nickname"]?> !</h1>



        <form class="form register" method="post" action="register.php">
  <div class="form-group">
    <input type="text" class="form-control" name="nickname" placeholder="<?PHP echo $_SESSION["nickname"]?>"><img src="IMG/pencil-12.png" alt="">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail" name="mail"aria-describedby="emailHelp" placeholder="<?PHP echo $_SESSION["mail"]?>"><img src="IMG/pencil-12.png" alt="">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password"id="exampleInputPassword" placeholder="<?PHP echo $_SESSION["password"]?>"><img src="IMG/pencil-12.png" alt="">
  </div>
 
</form>


<h2>Your interests</h2>
<form>
 <?PHP 
    $sql ="SELECT name_theme FROM theme_base ORDER BY name_theme";

    $stmt = $dbh -> query($sql);
    $themes = $stmt -> fetchAll();

    echo '<div>';
    foreach ($themes as $theme){
        echo '<input type="checkbox" value="'.$theme.'" name="checkbox">';
        echo '<label class="theme-check-label">'.$theme["name_theme"].'</label>';
    }
 ?>
</form>

<div class="profile-pic">
    <img src="IMG/profile-10.png" class:"profile-pic" alt="">
    
</div>


</body>


