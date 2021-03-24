<?php
    
    /* 1. Zadatak
    Izvršiti konverziju temperature iz Farenhajta u Kelvine i obratno, ukoliko su date sledeće dve formule:
    
    Celzijus = (Farenhajt - 32) * 5/9
    Kelvin = Celzijus + 273.15
    
    Temperaturu u Farenhajtima i Kelvinima zadati samostalno. */

    $f = 92; 
    $c = ($f - 32)*5/9;
    echo $c;
    echo " ukupno C";

    $k= $c + 273.15; 
    echo "<br>";
    echo $k;
    echo  " ukupno K";


    echo "<br>";
    
    $c = $k - 273.15;

    $f= $c * 9 / 5 + 32;

    echo $f;
    echo " ukupno F";








?>