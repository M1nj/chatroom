<?php
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
<html lang="fr">
    <head>
        <title><?php echo $title; ?></title>
        <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
    </head>
    
    <body>

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <div class="container">
        <form class="form register" method="post" action="register.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Nickname</label>
    <input type="text" class="form-control" name="nickname" placeholder="Enter nickname">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="mail"aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password"id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php echo $error ?>
    </form>
</div>
    
    </body>
</html>