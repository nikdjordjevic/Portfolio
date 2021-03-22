<?php

require_once "connection.php";

$q= "ALTER TABLE profiles ADD bio TEXT";

if($conn->query($q)) {
    echo "<p>Uspesno dodata tabela</p>";
}
else {
    echo "<p>Greska prilikom dodavanja tabele: "
            . $conn->error . "</p>";
}

?>
