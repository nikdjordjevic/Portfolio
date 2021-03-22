<?php
    session_start();
    require_once "connection.php";
    $usernameError = $passError = "*";


    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $username = $conn->real_escape_string($_POST['username']);
        $pass = $conn->real_escape_string($_POST['pass']);
        $val = true;
        if (empty($username)){
            $vall = false;
            $usernameErr = "username cannot be left blank";
        }
        if (empty($pass)){
            $val = false;
            $passError= "Password cannot be left blank!";
        }
        if ($val){
            $sql = "SELECT users.id, users.username, users.pass, profiles.name AS name, profiles.surname AS surname FROM users
            INNER JOIN profiles
            ON users.id = profiles.users_id
            WHERE username = '$username'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0){
                $usernameError = "This username doesn't exist!";
            }
            else {
                $row = $result->fetch_assoc();
                $dbPass = $row['pass'];
                if ($dbPass != md5($pass)){
                    $passError = "Incorrect password!";
                }
                else {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['surname'] = $row['surname'];
                
                    header ('Location:followers.php');
                }
            }
        }
    }
    if(!empty($_SESSION['id'])){
        header ('Location:followers.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" id="username" class="form-control" placeholder="username">
                            <span class='error'><?php echo $usernameError ?></span>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="password">
                            <span class='error'><?php echo $passError?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="register.php">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>