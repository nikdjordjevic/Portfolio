<?php
    require_once "header.php";
    require_once "connection.php";
    
    if(empty($_SESSION['id'])){
        header('Location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Followers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="folltab">
<?php

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

    if(!empty($_GET['unfollow'])){
        $friendId = $conn->real_escape_string($_GET['unfollow']);
        $sql = "DELETE FROM followers
        WHERE sender_id = $id
        AND receiver_id = $friendId";
    
        $result = $conn->query($sql);
        if (!$result){
            die("Greska: " . $conn->error);
        }
    }

    echo "<div class='table-responsive'>";
        $q5 = "SELECT CONCAT(`name`, ' ', `surname`) AS full_name, `username`, `users`.`id` FROM `profiles`
        INNER JOIN users
        ON  profiles.users_id = users.id
        WHERE users.id != $id";
        $result = $conn->query($q5);
            if (!$result->num_rows) {
                echo "<p class='info'>Nema korisnika</p>";
            }
            else {
                echo "<table class='table'>";
                echo "<tr>
                    <th scope='col'>Ime i prezime</th>
                    <th scope='col'>Korisnicko ime</th>
                    <th scope='col'>Akcije</th>
                </tr>";
                
                foreach ($result as $row){ 
                    $idProf = $row['id'];
                    //echo "<td>" . $row['full_name'] . "</a></td>";
                    echo "<tr>";
                    echo "<td><a href='profile.php?profile=$idProf'>" . $row['full_name'] . "</a></td>";
                    echo "<td>" . $row['username'] . "</td>";
                    $friendId = $row['id'];
                    $sql1 = "SELECT * FROM followers
                    WHERE sender_id = $id
                    AND receiver_id = $friendId";
                    $result1 = $conn->query($sql1);
                    $f1 = $result1->num_rows; // 0 ili 1
                    $sql2 = "SELECT * FROM followers
                    WHERE sender_id = $friendId
                    AND receiver_id = $id";
                    $result2 = $conn->query($sql2);
                    $f2 = $result2->num_rows; //0 ili 1

                    if ($f1 == 0){
                        if ($f2 == 0){
                            $text = "Follow";
                        }
                        else {
                            $text = "Follow back";
                        }
                        echo "<td><a href='followers.php?follow=$friendId'>$text</a></td>";
                    }
                    else {
                        echo "<td><a href='followers.php?unfollow=$friendId'>Unfollow</a></td>"; 
                    }

                    echo "</tr>";
                }
            }
        echo "</table>";
    echo "</div>";

?>


    </div>
</body>
</html>