<?php
    include("Layout/header.php");
    $nickname = $_SESSION['nickname'];

    if(isset($picture)){
      $sql = "INSERT INTO profile_picture FROM user_base
              WHERE nickname = :nickname";

      $stmt = $dbh -> prepare($sql);
      $stmt -> execute([":nickname" => $nickname]); //on la remplace ensuite dans $id.
      
      chmod("profile_pictures/",0750);
      $filename = $picture;
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      move_uploaded_file($_FILES['new_upload_picture']['tmp_name'],"profile_pictures/".$picture);
      header ('location: mychatroom.php');
    }
?>

<h1>Hey <?PHP echo $_SESSION["nickname"]?>!</h1>
<div class="container-profile-1">
  <div class="form-group">
    <input type="text" class="form-control" name="nickname" placeholder="<?PHP echo $_SESSION["nickname"]?>">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail" name="mail"aria-describedby="emailHelp" placeholder="<?PHP echo $_SESSION["mail"]?>">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password"id="exampleInputPassword" placeholder="<?PHP echo $_SESSION["password"]?>">
  </div>
</div>
<div class="container-profile-2">
  <form class="form register" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
    <input type="file" name="new_upload_picture" id="new_upload_picture">
    <button type="submit" class="btn btn-primary">Save</button>  
  </form>
</div>
<div class="container-profile-3">
  <h2>Your interests</h2>
  <form>
    <?PHP 
      $sql ="SELECT name_theme FROM theme_base ORDER BY name_theme";
        
      $stmt = $dbh -> query($sql);
      $themes = $stmt -> fetchAll();

      echo '<div>';
      foreach ($themes as $theme){
        echo '<input id="checkbox-profile" type="checkbox" value="'.$theme["name_theme"].'" name="checkbox">';
        echo '<label class="theme-check-label">'.$theme["name_theme"].'</label>';
      }
    ?>
  </form>
</div>

<button type="submit" class="btn btn-primary">Save</button>

</body>