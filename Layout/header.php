 <!-- -->
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Best chatrooms ever!</title>
        <!--jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/style.css">
        <link rel="icon" href="./IMG/favicon2.ico" />
        <!--Sweetalert2-->
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
        <!--Popper.js + Bootstrap CDN mandatory-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>

    <?PHP 
        include("db.php");//Link to the DB
        session_start(); //Open a session once a user is connected
        ini_set("display_errors",1); //Display errors

        $nickname = $_SESSION['nickname'];
        if(!empty($nickname)){
        $sql ="SELECT * FROM user_base
            WHERE nickname = :nickname";
            
        $stmt = $dbh -> prepare($sql);
        $stmt -> execute([":nickname" => $nickname]); //The value is stored
        $user_infos = $stmt -> fetchAll();}
    ?>

    <header class="header">
        <a href="mychatroom.php">
            <img class="header-logo" src="IMG/logo.png" alt="ChitChat logo">
        </a>
        <nav class="navbar">
            <ul>
                <div class="search">
                    <form action="search.php">   
                        <li>
                            <img src="IMG/search-02.png" alt="">
                            <input type="search" placeholder="ex: Tokyo, Kitten, Design, ..." name="the_search">
                        </li>
                    </form>
                </div>  
                <li><a href="mychatroom.php">My Chatrooms</a></li>
                <li><a href="logout.php">Log Out</a></li> 

                <?PHP 
                    foreach ($user_infos as $user_info){
                        if(!empty($user_info["profile_picture"])){
                            echo "<a href='profile.php'><img src='profile_pictures/".$user_info["profile_picture"]."'class='profil'></a>";
                        }
                        else{
                            echo "<a href='profile.php'><img src='IMG/profile-10.png' class='profil'></a>";
                        }
                    }
                ?>
            </ul>
        </nav>
    </header>
</html>

