<?php

   /*Jedan butik ima radno vreme od 9h do 20h radnim danima, a vikendom od 10h do 18h. 
    Preuzeti dan i vreme sa računara i ispitati da li je butik trenutno otvoren. */

    date_default_timezone_set("Europe/Belgrade");

    //echo date ('l, N, G');
    $dan = date ('N'); //dani pri cemu je Monday 1, Sunday 7
    $sat = date ('G');

    /* test
    $dan = 6;
    $sat = 19; 
    */

    if ($dan > 5 & $sat >= 10 & $sat < 18){
        echo "<p>Radi (vikend)</p>";
    }
    elseif ($dan <= 5 & $sat >= 9 & $sat < 20){
        echo "<p>Radi (radni dan)</p>";
    }

    else {
        echo "<p>Ne radi</p>";
    }

?>