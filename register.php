<?php
    include("header.php");
    $title='Inscription';
    session_start();

    ini_set("display_errors",1);
    include("db.php");




    //var_dump($movie);        

    $error = "";
    //print_r($_POST);
    

      //traiter le form
    if (!empty($_POST)){
            $nickname = $_POST["nickname"];
            $password = $_POST["password"];
            $mail = $_POST["mail"];
    
            // Doublon pseudo 
            $sql = "SELECT * FROM user_base
            WHERE nickname = :nickname";

            $stmt = $dbh -> prepare($sql);
            $stmt -> execute([":nickname" => $nickname]); //on la remplace ensuite dans $id.
            $user = $stmt -> fetch();

            if (empty($user)){
            $error = "";
            } //si le username est libre -> c'est bon

            else {
                $error = 'You already have an account!';
            }

            // Doublon email
            $sql = "SELECT * FROM user_base
            WHERE mail = :mail";

            $stmt = $dbh -> prepare($sql);
            $stmt -> execute([":mail" => $mail,]);
            $user = $stmt -> fetch();

            if (empty($user)){
            $error = "";
            } //si le mail est libre -> c'est bon

            else {
                $error = 'We see your email is already in out database, have you forgot it?';
            }


            //valide les données
                //nom renseigné ?
            if (empty($nickname)){
                $error = "Please insert your nickname";
            }
    
            if (empty($password)){
                $error = "Please insert your password";
            }

            //if ( $_POST['confirm_password'] != $_POST['password'] ) {
                
            //$error = '<span style="color:red; font-weight:normal;">Les 2 mots de passe sont différents! </span>';
           }

            if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {     
                         $error = 'Please insert a valid email address';
            }

    
            //si les données sont valides
            if ($error == ""){
                //ajout dans la bdd
                /*
                INSERT INTO booking 
                VALUES 
                (NULL, 'guillaume', '2018-01-01', 12, '0634444444', 'près de la fenêtre svp', NOW())
                */
                $sql = "INSERT INTO user_base 
                        VALUES (NULL, :nickname, :mail, 
                        :password,0, 0)";
    
                $stmt = $dbh->prepare($sql);
                $stmt -> execute([
                    ":nickname" => $nickname,
                    ":password" => $password, 
                    ":mail" =>$mail,
                ]);
                $_SESSION["isConnected"]= true;
                echo 'success';
    
                //afficher un message de succès
                //redirige
            }

?>


<!DOCTYPE html>
<p>
<br />
    <img src="IMG/logo.png" alt="LogoChitChat" />
</p>
    <div class="container">
    <h1 class="title">Welcome !</h1>
    <p>Fill in the form to be part of our community<p> 
        <form class="form register" method="post" action="register.php">
  <div class="form-group">
    <input type="text" class="form-control" name="nickname" placeholder="Pick your nickname">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail" name="mail"aria-describedby="emailHelp" placeholder="Your email">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password"id="exampleInputPassword" placeholder="Your password">
  </div>
  <div class="form-group">
    <input type="confirmpassword" class="form-control" name="confirmpassword"id="exampleInputConfirmPassword" placeholder="Confirm your password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck">
    <label class="form-check-label" for="exampleCheck">By submitting your profile details, you agree to our terms and conditions.</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="container">
    <a href="index.php"><button class="btn btn-warning">Back to the homepage</button></a>
</div>
    </form>
</div>
    
    </body>
</html>