<?php
    require_once "header.php";
    require_once "connection.php";
    require_once "validation.php";

    if(empty($_SESSION['id'])){
        header('Location:login.php');
    }

    $id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

    $validated = true;
    $name = $surname = $gender = $dob = $bio = "";
    $nameErr = $surnameErr = $dobErr = $bioErr = "";

    $q = "SELECT * FROM profiles WHERE users_id = $id";
    $result = $conn->query($q);
    $red = $result->fetch_assoc();
    $name = $red['name'];
    $surname = $red['surname'];
    $gender = $red['gender'];
    $dob = $red['dob'];
    $bio = $red['bio'];

    IF($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $bio= $_POST['bio'];

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
        if (empty($bio)){
            $validated = false;
            $bioErr = "Please enter your biography";
        }
      
        if ($validated){
            $q ="UPDATE profiles
                SET name = '$name', surname = '$surname', dob='$dob', gender= '$gender', bio = '$bio'
                WHERE users_id = $id;";
            $conn->query($q);
        }
    
    }
?>
    <div class="container">
        <form class="form-horizontal" action="#" method="post" id="regfor">
        <h2>Change profile</h2>
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="<?php echo $name; ?>"">
            <span class='error'>* <?php echo $nameErr; ?></span>
        </div>
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Enter your surname" value="<?php echo $surname; ?>"">
            <span class='error'>* <?php echo $surnameErr; ?></span>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col">
                    <label class="control-label col-sm-2" for="gender">Gender</label>
                </div>
                <div class="col">
                    <div class="radio">
                        <label><input type="radio" name="gender" value="m" <?php if($gender=="m"){echo 'checked';} ?>>Male</label>
                    </div>
                </div>
                <div class="col">
                    <div class="radio">
                        <label><input type="radio" name="gender" value="f" <?php if($gender=="f"){echo 'checked';} ?>>Female</label>
                    </div>
                </div>
                <div class="col">
                    <div class="radio disabled">
                        <input type="radio" name="gender" value="o" <?php if($gender!="m" && $gender!="f"){echo 'checked';} ?>>Other</label>
                    </div> 
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="dateofbirth" id="datob">Date of birth:</label>
            <input type="date" name="dob" value="<?php echo $dob; ?>">
            <span class="error"><?php echo $dobErr; ?></span>
        </div>
        <div class="form-group">
        <label for="biografija">Biografija</label>
            <textarea name="bio" id="" cols="30" rows="5"><?php echo $bio; ?></textarea>
            <span class="error"><?php echo $bioErr; ?></span>
        </div>
        <button type="submit" value="Submit" class="btn btn-warning">Submit</button>
        </form>
    </div>

</body>
</html>