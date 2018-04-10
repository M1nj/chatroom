<?php
    include 'header.php';
    include 'db.php';

    if (!empty($_POST)){
        $chatroom_name = $_POST["chatroom_name"];
        $theme = $_POST["checkbox"];
        
        // Vérification des identifiants
        $sql = "INSERT INTO chatroom_base 
        VALUES (NULL, :chatroom_name, NOW(), 0, :checkbox)";

        $stmt = $dbh -> prepare($sql);
    
        //$stmt->execute(array(
        $stmt -> execute([
            ":chatroom_name" => $chatroom_name,
            ":checkbox" => $theme
        ]);
            $id=$dbh->lastInsertId();

            header ("location: chatroom.php?id=".$id."");
        }

?>

<html>
<body id="body"> 
    <h1>Create a chatroom</h1>  
  


    <div class="container">
 
    
        <form class="form register" method="post">
            <div class="form-group">
                <input type="text" class="form-control-createchatroom" method="post" name="chatroom_name" placeholder="Choose a chatroom name">
            </div>
  
 <?PHP 
    $sql ="SELECT name_theme FROM theme_base ORDER BY name_theme";

    $stmt = $dbh -> query($sql);
    $themes = $stmt -> fetchAll();

    echo '<div>';
    foreach ($themes as $theme){
        echo '<input id="checkbox-profile" type="checkbox" value="'.$theme.'" name="checkbox">';
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