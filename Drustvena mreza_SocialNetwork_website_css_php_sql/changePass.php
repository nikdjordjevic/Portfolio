<?php 
    require_once "header.php";
    require_once "connection.php";
    require_once "validation.php";

    if(empty($_SESSION['id'])){
        header('Location:login.php');
    }


    $id = $_SESSION["id"];
    $validated = true;
    $oldPassword = $newPassword = $retypePassword= "";
    $passwordErr = $retypePasswordErr = "";
 

    IF($_SERVER["REQUEST_METHOD"]=="POST"){
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $retypePassword = $_POST['retypePassword'];


        $q = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($q);
        $red = $result->fetch_assoc();
        $dbPass = $red['pass'];
        if ($dbPass != md5($dbPass)){
            $passError = "Incorrect password!";
        }

        if(passwordValidation($newPassword)){
            $validated = false;
            $passwordErr = passwordValidation($newPassword);
        }
        if(passwordValidation($retypePassword)){
            $validated = false;
            $retypePasswordErr = passwordValidation($retypePassword);
        }

        if($newPassword != $retypePassword){
            $validated = false;
            $retypePasswordErr = "Password and Retype password must be the same";
        }
        else {
            $newPassword = md5($newPassword);
        }
        if ($validated){
            $q ="UPDATE users
                SET pass = '$newPassword'
                WHERE id = $id;";
            $conn->query($q);
        }

    }
    ?>

<?php

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
        <h3>Change password</h3>
        <form action="#" method="POST">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="oldPassword" id="pass" class="form-control" placeholder="Old password">
                <span class='error'><?php echo $passwordErr?></span>
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="newPassword" id="pass" class="form-control" placeholder="New password">
                <span class='error'><?php echo $passwordErr?></span>
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="retypePassword" id="pass" class="form-control" placeholder="Retype new password">
                <span class='error'><?php echo $retypePasswordErr?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Change" class="btn float-right login_btn">
            </div>
        </form>
    </div>
</body>
</html>
