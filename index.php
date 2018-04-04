 <?php include("header.php"); ?>
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
            echo '<script>console.log("pouet")</script>';
        }
        else
        {
            $_SESSION['nickname'] = $nickname;
            $_SESSION['password'] = $password;
            //$_SESSION['id'] = $resultat['id'];
            $_SESSION["isConnected"]= true;
            echo '<script>console.log("success")</script>';
        }
    }
    ?>

<body class="fond">
  <div id="home" class="container-fluid">
      <a href="#"><button type="button" id="button" class="btn btn-primary" onclick="test()" >Sign in</button></a>
      <a href="register.php"><button type="button" id="button" class="btn btn-secondary" href="register.php">Sign Up</button></a>
  </div>
</body>

<script> 

function test (){
swal({
  title: 'Welcome back',
  html:
    '<form method="post"><input type= "nickname" id="swal-input1" class="swal2-input" name="nickname">' +
    '<input type="password" id="swal-input2" class="swal2-input" name="password">'+'<button class="btn btn-secondary">Cancel</button>'+'<button type="submit" class="btn btn-primary">Log in</button>'+'</form>',
    showConfirmButton: false,
})
}
 </script>

 


