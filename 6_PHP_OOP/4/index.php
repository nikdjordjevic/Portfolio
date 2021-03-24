<?php

    require_once "kosarkas.php";


    $s1 = new Sportista ("Jovan", "Jovanovic", 1995, "Beograd");
    $s1-> ispisiSportista();

    $k1 = new Kosarkas ("Marko", "Markovic", 1997, "Nis", array (40, 25, 32, 27));
    $k1->ispisiKosarkas();

    $k2 = new Kosarkas ("Stefan", "Stefanovic", 1999, "Kraljevo", array (15, 17, 25, 20));
    $k2->ispisiKosarkas();

?>