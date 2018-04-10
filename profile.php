<?php
    include 'header.php';
    include 'db.php'; 
    session_start();
   
   

    //$theme = $_GET['checkbox'];

?>

   
    <h1>Hey <?PHP echo $_SESSION["nickname"]?> !</h1>


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

         
            <img src="IMG/profile-10.png" class:"profile-pic" alt="">
             <input type="file" name="upload_picture" id="upload_picture">
          

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
                  echo '<input id="checkbox-profile" type="checkbox" value="'.$theme.'" name="checkbox">';
                  echo '<label class="theme-check-label">'.$theme["name_theme"].'</label>';
              }
          ?>
        </form>

</div>

<a href="#"><button type="submit" class="btn btn-primary">Save</button></a>

</body>


