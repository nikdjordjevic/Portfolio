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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>
<body>
    
<?php

    $idProf = $conn->real_escape_string($_GET['profile']);

    //$idProf= 11;

    $q5 = "SELECT `name`, `surname`, `username`, `dob`, `gender`, `bio` FROM `profiles`
        INNER JOIN users
        ON  profiles.users_id = users.id
        WHERE users.id = $idProf";
        $result = $conn->query($q5);
        if (!$result->num_rows){
            echo "<p class= 'info'> Trenutno u bazi nemate korisnika</p>";
        }
        else {
            foreach ($result as $row){
            $ime = $row['name'];
            $prezime = $row['surname'];
            $user = $row['username'];
            $dateOfB= $row['dob'];
            $pol = $row['gender'];
            $bio= $row['bio'];
        }
        if ($pol == 'm'){
            $color = 'blue';
        }
        elseif ($pol == 'f'){
            $color = 'pink';
        }
        else {
            $color = 'gray';
        }
        echo "<table class='$color' id='profil'>";
        echo"
        <tr><td>Name:</td><td>$ime</td></tr>
        <tr><td>Surname:</td><td>$prezime</td></tr>
        <tr><td>Username:</td><td>$user</td></tr>
        <tr><td>Date of birth:</td><td>$dateOfB</td></tr>
        <tr><td>Gender:</td><td>$pol</td></tr>
        <tr><td>About me:</td><td>$bio</td></tr>";
        echo "</table>";
    }
?>
<div class ="linkp">
<a href ="followers.php">Followers</a>
</div>
</body>
</html>

