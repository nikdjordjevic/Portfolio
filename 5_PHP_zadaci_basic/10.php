<?php

    /* Odrediti proizvod brojeva od $n do $m koji su deljivi sa 7 a nisu sa 3, a potom od njega oduzeti zbir brojeva od $n do $m koji su deljivi sa 3 a nisu sa 7:
    a) Koristeći while petlju
    b) Kotisteći for petlju */

    echo "<p>a)</p>";

    $n = 1;
    $m = 21;
    $sum = 1;
    $sum2 = 0;
    while ($n <= $m){
        if ($n % 7 == 0 && $n % 3 != 0){ 
            $sum *= $n;
        }
        elseif ( $n % 3 == 0 && $n % 7 != 0){   
            $sum2 += $n;

        }
        $n++;
    }  
    echo "<p>Proizvod brojeva od n do m koji su deljivi sa 7, a nisu sa 3 je $sum</p>";
    echo "<p>Zbir brojeva od n do m koji su deljivi sa 3, a nisu sa 7 je $sum2</p>";
    $raz = $sum - $sum2;
    echo "<p> Njihova razlika iznosi $raz</p>";
    echo "<hr>";

    echo "<p>b)</p>";


    $sum = 1;
    $sum2 = 0;

    for ($n = 1; $n <= $m; $n++){
        if ($n % 7 == 0 && $n % 3 != 0){ 
            $sum *= $n;
        }
        elseif ( $n % 3 == 0 && $n % 7 != 0){   
            $sum2+= $n;
        }
    }

    echo "<p>Proizvod brojeva od n do m koji su deljivi sa 7, a nisu sa 3 je $sum</p>";
    echo "<p>Zbir brojeva od n do m koji su deljivi sa 3, a nisu sa 7 je $sum2</p>";
    $raz = $sum - $sum2;
    echo "<p> Njihova razlika iznosi $raz</p>";

?>