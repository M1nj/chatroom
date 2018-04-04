
<?php
    include("header.php");
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
            echo '<script>console.log("pouet")';
        }
        else
        {
            $_SESSION['nickname'] = $nickname;
            $_SESSION['password'] = $password;
            //$_SESSION['id'] = $resultat['id'];
            $_SESSION["isConnected"]= true;
        }
    }



?>
<div class="container-fluid">
    <form class="form login" method="post" action="login.php">
        <div class="row"> 
            <div class="form-group mx-sm-3">
                <label>Nickname</label>
                <input type="username" class="form-control" name="nickname" placeholder="Your email">
            </div>
        </div>
        <div class="row"> 
            <div class="form-group mx-sm-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Your password">
            </div>
        </div>
        <div class="row">
            <button type="button" class="btn btn-outline-secondary">Submit</button>
            <a class="forgot-password" href="#">I forgot my password</a>
    </div>    
    </form>
</div>
</html>
