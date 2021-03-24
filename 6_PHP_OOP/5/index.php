<?php

require_once "budzetskiStudent.php";
require_once "samofinansirajuciStudent.php";


$s1= new SamofinansirajuciStudent ("Jovan", 250, 6.5);
$s2= new BudzetskiStudent ("Milan", 120, 9.2);
$s3= new SamofinansirajuciStudent ("Milica", 140, 7.3);
$s4= new BudzetskiStudent ("Jelena", 210, 8.8);

$studenti = array ($s1, $s2, $s3, $s4);


foreach ($studenti as $s){
    $s->stampa();
}

function najSkolarina($studenti){
    $najSkol = $studenti[0]->skolarina(rand(35,60));;
    foreach ($studenti as $s){
        if ($najSkol < $s->skolarina(rand(35,60))){
            $najSkol = $s->skolarina(rand(35,60));
        }
    }
    $studentNajSkolarina = $studenti[0];
    foreach ($studenti as $s){
        if ($najSkol == $s->skolarina(rand(35,60))){
            $studentNajSkolarina = $s;
        }
        return $studentNajSkolarina;
    }
}
echo "<hr>";
echo "<p>Student koji placa najvecu skolarinu je: </p>";
najSkolarina($studenti)->stampa();

echo "<hr>";

function prosecnaSkolarina($studenti){
    $ukSk = 0;
    $brSt=count($studenti);
    foreach ($studenti as $s){
        $ukSk += $s->skolarina(rand(35,60));
    }
    $prSk = $ukSk / $brSt;
    return $prSk;
}
echo prosecnaSkolarina($studenti);
echo "<hr>";

$UodSkEsp=0;
foreach ($studenti as $s){
    $UodSkEsp += $s->skolarina(rand(35,60)) / $s->getEspb(); //zbir odnosa skolarina i espb bodova
}
$pOdSkEsp = $UodSkEsp/ count($studenti); // prosecan odnos skolarina i espb bodova
echo "<p>Prosecan odnos skolarine i ESPB bodova iznosi " . round($pOdSkEsp, 2) . ":1</p>"; 

echo "<hr>";

function devetiZad($studenti){
    $minEspb = $studenti[0]->getEspb();
    $SminEspb = $studenti[0];
    $brojMin= 0;
    foreach ($studenti as $s){
        if ($minEspb>$s->getEspb()){
            $minEspb = $s->getEspb();
            $SminEspb = $s;
        }
    }
    foreach ($studenti as $s){
        if ($minEspb == $s->getEspb()){
            $brojMin++;
        }
    }

    $maxSko = $studenti[0]->skolarina(rand(35,60));
    $SmaxSko = $studenti[0];
    $brojMax = 0;
    foreach ($studenti as $s){
        if ($maxSko<$s->skolarina(rand(35,60))){
            $maxSko = $s->skolarina(rand(35,60));
            $SmaxSko = $s;
        }
    }
    foreach ($studenti as $s){
        if ($maxSko == $s->skolarina(rand(35,60))){
            $brojMax++;
        }
    }
    /*
    if ($brojMax == 1){
        echo "<p>Maksimalnu skolarinu placa: </p>"; 
        $SmaxSko->stampa();
    }
    */
    //echo $brojMin;
    if ($brojMin == 1){
        echo "<p>Minimalno ESPB poena ima: </p>"; 
        return $SminEspb; // ako ima jednog sa min ESPB on se vraca  //$SminEspb->stampa()
    } 
    elseif ($brojMin>1 && $brojMax == 1 ){ //ako ima vise onih koji imaju minimalno ESPB poena vraca se student sa max skolarinom
        return $SmaxSko;     //$SmaxSko->stampa();
    }
    else {
        return $studenti[rand(0, count($studenti))]; //vraca random studenta ako ima vise onih sa max skolarinom // $studenti[rand(0, count($studenti))]->stampa();
    }
}

devetiZad($studenti)->stampa();
?>