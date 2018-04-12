<?PHP 
include("Layout/header.php");

$id_chatroom = $_POST["id_chatroom"];

if(isset($_POST["delete_chatroom"])){
    $sql = "DELETE FROM chatroom_base WHERE id_chatroom = :id_chatroom; DELETE FROM message_base WHERE id_chatroom = :id_chatroom";
    $stmt = $dbh -> prepare($sql); 
    $stmt->bindParam(":id_chatroom",$id_chatroom);
    $stmt->execute();
    
    header("location:mychatroom.php");
}
?> 