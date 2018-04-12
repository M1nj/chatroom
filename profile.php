<?php
    include("Layout/header.php");
    $nickname = $_SESSION['nickname'];
    
    if(!empty($_FILES["new_upload_picture"])){
      $picture = $_FILES["new_upload_picture"]['name'];
      
      $sql = "UPDATE user_base SET profile_picture = :picture
              WHERE nickname = :nickname";

      $stmt = $dbh -> prepare($sql);
      $stmt -> execute([":nickname" => $nickname,
                        ":picture" => $picture]); //on la remplace ensuite dans $id.

      chmod("profile_pictures/",0750);
      $ext = pathinfo($picture, PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["new_upload_picture"]['tmp_name'],"profile_pictures/".$picture);
      header ('location: mychatroom.php');
    }


    if(!empty($_GET["checkbox"])){
      $theme = $_GET["checkbox"];
      $sql = "INSERT INTO user_theme
              VALUES (:nickname, :theme)";

      $stmt = $dbh -> prepare($sql);
      $stmt -> execute([":theme" => $theme,
                        ":nickname" => $nickname]); //on la remplace ensuite dans $id.
    }
?>
<body>
<h1>Hey <?PHP echo $_SESSION["nickname"]?>!</h1>
<div class="container-profile-1">
  <div class="form-group">
    <input type="text" class="form-control" name="nickname" placeholder="<?PHP echo $_SESSION["nickname"]?>">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail" name="mail" aria-describedby="emailHelp" placeholder="<?PHP echo $_SESSION["mail"]?>">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password"id="exampleInputPassword" placeholder="<?PHP echo $_SESSION["password"]?>">
  </div>
</div>

<div class="container-profile-1">
  <h2>Choose a new profile picture</h2>
  <form class="form register" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
    <input type="file" name="new_upload_picture" id="new_upload_picture">
    <button type="submit" class="btn btn-primary">Save</button>  
  </form>
</div>

<div class="container-profile-1">
  <h2>Your interests</h2>
  <form>
    <?PHP 
      $sql ="SELECT name_theme FROM theme_base ORDER BY name_theme";
        
      $stmt = $dbh -> query($sql);
      $themes = $stmt -> fetchAll();
      echo '<form method="get">';
      foreach ($themes as $theme){
        
        echo '<input id="checkbox-profile" type="radio" value="'.$theme["name_theme"].'" name="checkbox">';
        echo '<label class="theme-check-label">'.$theme["name_theme"].'</label>';
        
      }
      echo '</br>';
      echo '<button type="submit" class="btn btn-primary">Save</button>';
      echo '</form>';
    ?>
  </form>
</div>



</body>