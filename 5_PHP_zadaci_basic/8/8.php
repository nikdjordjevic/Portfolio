
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stil.css">
</head>
<body>
    
    <?php

        /* Odrediti zbir cifara unetog celog broja i dobijeni zbir ispisati na ekranu:

        a) Ukoliko je zbir cifara broja jednak samom broju, na ekranu se zbir ispisuje uokviren narandžastom bojom
        Npr. za broj 5 zbir cifara je 5, što je jednako unetom broju 5

        b) Ukoliko je zbir cifara broja manji od samog broja, na ekranu se zbir ispisuje uokviren plavom bojom.
        Npr. za broj 101 zbir cifara je 1+0+1 = 2, što je manje od unetog 101 */

        $k = 24;
        $m = "$k";
        $sum = 0; 
        while ($k > 0){
            $pc = $k % 10;
            $sum += $pc;
            $k = floor($k / 10);
        }

        if ($m > $sum) {
            echo "<span id='manje'>$sum</span>";
        }
        elseif ($m = $sum){
            echo "<span id='jednako'>$sum</span>";
        }  
    ?>

</body>
</html>

