<?PHP 
include("Layout/header.php");

$nickname = $_SESSION["nickname"];

if(isset($_POST["new_upload_picture"])){
    $sql = "UPDATE profile_picture FROM user_base
            WHERE nickname = :nickname";

    $stmt = $dbh -> prepare($sql);
    $stmt -> execute([":nickname" => $nickname]); //on la remplace ensuite dans $id.
    
    chmod("profile_pictures/",0750);
    $filename = $picture;
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['new_upload_picture']['tmp_name'],"profile_pictures/".$picture);
  }
  header ('location: profile.php');
?> 