<?php
session_start();
require_once "connection.php";

$id = $_SESSION['id'];
if (!empty($_GET['follow'])){
    $friendId = $conn->real_escape_string($_GET['follow']);

    $sql = "SELECT * FROM followers
            WHERE sender_id = $id
            AND receiver_id = $friendId";
    $result = $conn->query($sql);
    if($result->num_rows==0){
        $sql = "INSERT INTO followers(sender_id, receiver_id)
                VALUE ($id, $friendId)";
        $result1 = $conn->query($sql);
        if(!$result1){
            echo("GreskaL " . $conn->error);
        }
    }
}
header("Location: followers.php");

?>