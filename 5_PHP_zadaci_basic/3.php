<?php

    /* 3. Zadatak
    Pera i Mika su kupili dva ista džempera. Pera je dao p dinara, Mika je dao m dinara i dobili su kusur od k dinara. Brojeve p, m i k odredite proizvoljno.
    Na osnosvu unetih vrednosti, u konzoli ispisati koliki kusur treba da dobije Pera, a koliki kusur treba da dobije Mika, da bi jednako platili svako svoj džemper.

    P 2000
    M 1700
    K 700

    4400 / 2200
    2000+1700 -700 / 2 1500  (p  + m - k )/ 2

    P 2000-1500 500      p- (p  + m – k) / 2)=x  1700 – 1500 200 m - (p  + m – k) / 2)=y */

    $p = 2000;
    echo $p;
    echo " Pera dao";
    echo "<br>";
    $m = 1700;
    echo $m;
    echo " Mika dao";
    echo "<br>";
    $k = 700;


    $dz = ($p + $m - $k) / 2;
    echo $dz; 
    echo " ukupna cena dzempera";
    echo "<br>";

    $kusp = $p - $dz;
    echo $kusp;
    echo " Pera kusur";
    echo "<br>";
    $kusm = $m - $dz;
    echo $kusm;
    echo " Mika kusur";

?>