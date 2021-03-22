<?php

    $servername = "localhost";
    $username = "admin";
    $password = "admin123";
    $db = "mreza";

    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error){
        die("Neuspesna konekcija: " . $conn->connect_error);
    }
    //echo "Successfully connected!";
?>