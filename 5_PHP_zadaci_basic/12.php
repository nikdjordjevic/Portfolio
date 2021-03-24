<?php

    /* Napisati funkciju digitron koja prima tri parametra: Prva dva parametra su brojevi, 
    a treći je karakter koji predstavlja aritmetičku operaciju (‘+’, ‘-’, ‘*’ ili ‘/’). 
    Potrebno je da funkcija izvrši odgovarajuću aritmetičku operaciju nad zadatim brojevima
    i na ekranu ispiše prvi broj, operaciju, drugi broj, jednako, rezultat.
    Na primer:
    digitron(5, 8, ‘*’) kao rezultat na ekranu ispisuje 5 * 8 = 40.
    digitron(2, 2, “+”) kao rezultat na ekranu ispisuje 2 + 2 = 4.
    */

    function digitron ($a, $b, $znak){
        if ($znak == "*"){
        $rez = $a*$b;
        }
        elseif ($znak == "+"){
            $rez = $a + $b;
        } 
        elseif ($znak == "-"){
            $rez = $a - $b;
        }
        elseif ($znak == "/"){
            $rez = $a / $b;
        }
        echo "<p>$a $znak $b = $rez</p>";
    }
    digitron (5, 2, "-");

?>