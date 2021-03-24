<?php 

    /* 2. Zadatak
    Knjiga ima n poglavlja (broj n unosite sami). 
    Čitalac je prvog dana pročitao a poglavlja, a drugog dana dva poglavlja više nego prvog dana.
    Na osnovu dodeljenih vrednosti, u konzoli ispisati koliko poglavlja je preostalo čitaocu da pročita do kraja knjige. Pretpostaviti da su vrednosti promenljivih n i a ispravno unete.

    N
    A
    A+2
    X=n- a + a+2 */

    $n = 15;
    echo $n;
    echo "- broj poglavlja";
    echo "<br>";

    $a = 4;
    echo $a;
    echo "- procitao prvog dana";
    echo "<br>";


    $x = $n - ($a + $a + 2);
    echo "$x";
    echo "- ostalo da procita posle drugog dana ukoliko je drugog dana procitao 2 poglavlja vise nego prvog";

?>