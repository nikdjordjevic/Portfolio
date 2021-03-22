<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
    require_once "connection.php";
    require_once "header.php";
    require_once "validation.php";

    $validated = true;
    $name = $surname = $gender = $dob = $username = $password = $retypePassword = "";
    $nameErr = $surnameErr = $dobErr = $usernameErr = $passwordErr = $retypePasswordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $retypePassword = $_POST['retypePassword'];


        if(textValidation($name)){
            $validated = false;
            $nameErr = textValidation($name);
        }
        else {
            $name = trim($name);
            $name = preg_replace('/\s\s+/', ' ', $name);
        }


        if(textValidation($surname)){
            $validated = false;
            $surnameErr = textValidation($surname);
        }
        else {
            $surname = trim($surname); 
            $surname = preg_replace('/\s\s+/', ' ', $surname); 
        }


        if(dobValidation($dob)){
            $validated = false;
            $dobErr = dobValidation($dob);
        }


        if(usernameValidation($username, $conn)){
            $validated = false;
            $usernameErr = usernameValidation($username, $conn);
        }


        if(passwordValidation($password)){
            $validated = false;
            $passwordErr = passwordValidation($password);
        }


        if(passwordValidation($retypePassword)){
            $validated = false;
            $retypePasswordErr = passwordValidation($retypePassword);
        }


        if($password != $retypePassword){
            $validated = false;
            $retypePasswordErr = "Password and Retype password must be the same";
        }
        else {
            $password = md5($password);
        }

        $name = $conn->real_escape_string($name);
        $surname = $conn->real_escape_string($surname);
        $username = $conn->real_escape_string($username);
        $password= $conn-> real_escape_string($password);
        $dob= $conn->real_escape_string($dob);
        $retypePassword= $conn->real_escape_string($retypePassword);

        if($validated){
            $q = "INSERT INTO `users`(`username`, `pass`) 
                VALUES ('$username', '$password');";

            if($conn->query($q)) {
                //echo "<p class='success'>Successfully added user in table users</p>";
                $q = "SELECT `id` 
                    FROM `users` 
                    WHERE `username` LIKE '$username'";

                $result = $conn->query($q);
                $red = $result->fetch_assoc();
                $id = $red['id'];

                $q = "INSERT INTO `profiles`(`name`, `surname`, `gender`, `dob`, `users_id`) 
                        VALUES ('$name', '$surname', '$gender', '$dob', '$id')";

                if($conn->query($q)) {
                    //echo "<p class='success'>Successfully added profile in table profiles</p>";
                }
                else {
                    echo "<p class='error'>Error adding profile in table profiles: " . $conn->error . "</p>";
                }
            }
            else {
                echo "<p>Error adding user in table users: " . $conn->error . "</p>";
            }

            $name = $surname = $gender = $dob = $username = $password = $retypePassword = "";
            $nameErr = $surnameErr = $dobErr = $usernameErr = $passwordErr = $retypePasswordErr = "";
        }
    }
?>
    <div class="container">
        <h3>Register</h3>
        <form action="" method="POST">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $name; ?>">
                <span class='error'><?php echo $nameErr ?></span>
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="surname" class="form-control" placeholder="surname" value="<?php echo $surname; ?>">
                <span class='error'><?php echo $surnameErr ?></span>
            </div>
            <div class="input-group form-group">
            <label for="gender">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="m" <?php if($gender=="m"){echo 'checked';} ?>>  
                <label class="form-check-label" for="flexRadioDefault1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="f" <?php if($gender=="f"){echo 'checked';} ?>>
                <label class="form-check-label" for="flexRadioDefault1">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="o" <?php if($gender!="m" && $gender!="f"){echo 'checked';} ?>>
                <label class="form-check-label" for="flexRadioDefault1">Other</label>
            </div>
            </div>
            <div>
            <div class="input-group form-group">
                <label for="dateofbirth">Date of birth:</label>
                <input type="date" name="dob" value="<?php echo $dob; ?>">
                <span class="error"><?php echo $dobErr; ?></span>
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $username; ?>">
                <span class="error">* <?php echo $usernameErr; ?></span>
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="password" id="pass" class="form-control" placeholder="password">
                <span class='error'><?php echo $passwordErr?></span>
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="retypePassword" id="pass" class="form-control" placeholder="retype password">
                <span class='error'><?php echo $retypePasswordErr?></span>
            </div>

            <div class="form-group">
                <input type="submit" value="Sign up" class="btn float-right login_btn">
            </div>
        </form>
        <div class="card-footer">
            <div class="d-flex justify-content-center links" id="linkFor">
                Already have an account?<a href="login.php">Login</a>
            </div>
        </div>
    </div>

</body>
</html>