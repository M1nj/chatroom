<?php
    ini_set("display_errors", 1);
    include("db.php");
    $title="Search";
    $search = $_GET['the_search'];

    $sql = "SELECT * FROM chatroom_base INNER JOIN theme_base on chatroom_base.nom_theme=theme_base.name_theme 
    WHERE name_chatroom LIKE :the_search OR name_theme LIKE :the_search
    LIMIT 20";

$stmt = $dbh->prepare($sql);
$stmt -> execute([":the_search"=>"%$search%"]);
$chats = $stmt->fetchAll();
?> 

<body id="body">
<?php
include 'header.php';


foreach ($chats as $chat){
    echo '
    <li>
           <a href="chatroom.php?id='.$chat["id_chatroom"].'"><p> '.$chat["name_chatroom"];' </p></a>
    </li>';
}
?>
</html>