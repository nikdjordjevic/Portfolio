<?php

/* Odrediti sumu kubova neparnih brojeva od $n do $m:
    a) Koristeći while petlju
    b) Koristeći for petlju */

    echo "<p>a)</p>";

    $n = 1;
    $m = 7;
    $sum = 0;
    while ($n <= $m){
        if ($n % 2 != 0){
            $sum += $n**3;
        }
        $n++;
    }
    echo "<p>Suma kubova neparnih brojeva od n do m iznosi $sum<p>";


    echo "<p>b)</p>";

    $sum = 0;
    for ($n = 1; $n <= $m; $n++){
        if ($n % 2 != 0){
            $sum += $n**3;
        }
    }
    echo "<p>Suma kubova neparnih brojeva od n do m iznosi $sum<p>";

?>