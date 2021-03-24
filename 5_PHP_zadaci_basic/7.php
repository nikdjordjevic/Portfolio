<?php

    /*Ministarstvo zdravlja jedne zemlje je povodom pandemije virusa donelo sledeću odredbu:
    "Ukoliko je procenat pozitivno testiranih stanovnika u odnosu na ukupno testirane stanovnike u jednom danu
    veći od 30% ili ukoliko je procenat pozitivno testiranih stanovnika veći od 10% ukupnog broja stanovnika te
    zemlje, automatski se uvodi vanredno stanje."
    Za proizvoljno unete vrednosti: ukupan broj stanovnika zemlje, ukupan broj testiranih u jednom danu
    i ukupan broj pozitivno testiranih u tom danu, na ekranu crvenom bojom ispisati VANREDNO STANJE, 
    ukoliko treba automatski uvesti vanredno stanje prema odredbi koju je ministarstvo donelo
    (u suprotnom ne ispisivati ništa). */


    $s = 7000000;
    $t = 5000;
    $p = 1501;
    $prPT = $p * 100 / $t; 
    $prPS= $p * 100 / $s;  

    if ($prPT > 30 || $prPS > 10){
        echo "<p style='color:red'; >VANREDNO STANJE<p>";
    }


?>