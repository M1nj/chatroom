<?php
    include 'header.php';
    include 'db.php';

    //$theme = $_GET['checkbox'];

?>

<html>
<body id="body"> 
    <h1>Create a chatroom</h1>  
  


    <div class="container">
 
    
        <form class="form register" method="post" action="chatroom.php">
  <div class="form-group">
    <input type="text" class="form-control" name="nickname" placeholder="Choose a chatroom name">
  </div>
  
 <?PHP 
    $sql ="SELECT name_theme FROM theme_base ORDER BY name_theme";

    $stmt = $dbh -> query($sql);
    $themes = $stmt -> fetchAll();

    echo '<div>';
    foreach ($themes as $theme){
        echo '<input type="checkbox" value="'.$theme.'" name="checkbox" method="GET">';
        echo '<label class="theme-check-label">'.$theme["name_theme"].'</label>';
    }
 ?>



  <br>
  <div class="container">
  <a href="#"><button type="submit" class="btn btn-primary">Create</button></a>
    <a href="index.php"><button class="btn btn-warning">Back to my chatrooms</button></a>
</div>
</form>


</div>
    
    </body>

</html>