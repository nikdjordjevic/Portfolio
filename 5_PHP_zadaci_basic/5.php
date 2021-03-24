<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        /* Za preuzetu godinu sa računara i unetu godinu rođenja izračunati da li je osoba punoletna ili maloletna. */

        date_default_timezone_set("Europe/Belgrade");
        $trgod = date ('Y');
        //echo $trgod;
        $rodj = 2005;
        if ($trgod- $rodj > 18){
            echo "<p>PUNOLETNA</p>";
        }
        else {
            echo "<p>MALOLETNA</p>";
        }
    ?>
</body>
</html>