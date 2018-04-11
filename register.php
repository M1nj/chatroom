<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="IMG/favicon2.ico" />
    <!--Sweetalert2-->
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <!--Popper.js + Bootstrap CDN mandatory-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

<?php 
    include("db.php");
    ini_set("display_errors",1);
    $error = "";
    
    //The form is under process
    if (!empty($_POST)){
        $nickname = $_POST["nickname"];
        $password =$_POST["password"];
        $mail = $_POST["mail"];
        $picture = $_FILES['upload_picture']['name'];
        $maxsize = 10485760;
            
        $sql = "SELECT * FROM user_base";

        $stmt = $dbh -> prepare($sql);
        $stmt -> execute();
        $users = $stmt -> fetchAll();
    
        // Check username
        $sql = "SELECT * FROM user_base
        WHERE nickname = :nickname";

        $stmt = $dbh -> prepare($sql);
        $stmt -> execute([":nickname" => $nickname]); 
        $user = $stmt -> fetch();

        if (empty($user)){
            $error = ""; //If the username is available, no error
        } 
        else {
            $error = 'You already have an account!';
        }
        // Check email
        $sql = "SELECT * FROM user_base
        WHERE mail = :mail";

        $stmt = $dbh -> prepare($sql);
        $stmt -> execute([":mail" => $mail,]);
        $user = $stmt -> fetch();

        if (empty($user)){
            $error = "";
        } 
        else {
                $error = 'We see your email is already in out database, have you forgot it?';
        }
        //Check data
        if (empty($nickname)){
            $error = "Please insert your nickname";
        }
        if (empty($password)){
            $error = "Please insert your password";
        }
    }

    if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {     
        $error = 'Please insert a valid email address';
    }

    //If everything's ok, then...
    if ($error == ""){
        $sql = "INSERT INTO user_base 
        VALUES (NULL, :nickname, :mail, 
        :password,:upload_picture, 0)";
    
        $stmt = $dbh->prepare($sql);
        $stmt -> execute([
            ":nickname" => $nickname,
            ":password" => $password, 
            ":mail" =>$mail,
            ":upload_picture" => $picture
            ]);

        //Store data in $_SESSION()
        $_SESSION["isConnected"]= true;
        $_SESSION['mail'] = $mail;
        $_SESSION['nickname'] = $nickname;

        //Picture process, store the path in the right folder.
        chmod("profile_pictures/",0750);
        $filename = $picture;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['upload_picture']['tmp_name'],"profile_pictures/".$picture);
        header ('location: mychatroom.php');
    }
?>

<!DOCTYPE html>
<body>
    <img class="logo_cc" src="IMG/logo.png" alt="LogoChitChat" />
    <div class="container">
        <h1 class="title">Welcome !</h1>
        <h3>Fill in the form to be part of our community<h3> 
        <form class="form register" method="post" action="register.php" enctype="multipart/form-data">
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
            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
            <div class="form-group">
                <input type="file" name="upload_picture" id="upload_picture">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck">
                <label class="form-check-label" for="exampleCheck">By submitting your profile details, you agree to our terms and conditions.</label>
            </div>
            <br>
            <div class="container">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="index.php">
                    <button class="btn btn-warning">Back to the homepage</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>



