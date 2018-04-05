<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Best chatrooms ever !</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>

 <?php
    $title='Connexion';
    session_start();
    ini_set("display_errors",1);
    include("db.php");

    //echo $_SESSION["views"];
    //$_SESSION["isConnected"]= true;

    // Hachage du mot de passe
    // $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if (!empty($_POST)){
        $nickname = $_POST["nickname"];
        $password = $_POST["password"];
        
        // Vérification des identifiants
        $sql = "SELECT * FROM user_base WHERE nickname = :nickname AND password = :password";
        $stmt = $dbh -> prepare($sql);

        //$stmt->execute(array(
        $stmt -> execute([":nickname" => $nickname, ":password" => $password,]);

        $resultat = $stmt->fetch();

       
        
        if (!$resultat)
        {
            echo '<script>swal({
                type: "error",
                title: "Error",
                text: "The nickname or the password is incorrect, please try again.",
                footer: "<a href>Forgot my password</a>",
              })</script>';
        }
        else
        {
            $_SESSION['nickname'] = $nickname;
            $_SESSION['password'] = $password;
            //$_SESSION['id'] = $resultat['id'];
            $_SESSION["isConnected"]= true;
            header ('location: chatroom.php');;
        }
    }
    ?>

<body>
    <div class="container-fluid">
        <img class="logo" src="IMG/logo.png">
</div>
  <div id="home" class="container-fluid">
      <p class="hometext">Already a member?</p>
      <a href="#"><button type="button" id="button" class="btn btn-primary" onclick="test()" >Sign in</button></a>
      </div>
    <div id="home" class="container-fluid">
      <p class="hometext">Want to be part of the community?</p>
      <a href="register.php"><button type="button" id="button" class="btn btn-secondary" href="register.php">Sign Up</button></a>
  </div>
</body>

<script> 

function test (){
swal({
  title: 'Welcome back',
  html:
    '<form method="post"><input type= "nickname" id="swal-input1" class="swal2-input" name="nickname" placeholder="Guillaume">' +
    '<input type="password" id="swal-input2" class="swal2-input" name="password" placeholder="****">'+'<button type="submit" id="valid_button" class="btn btn-primary">Log in</button>'+'</form>',
    showConfirmButton: false,
})
}
 </script>

 


