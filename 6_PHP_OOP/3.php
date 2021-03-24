<?php

    /* 
    Kreirati klasu Autobus koja ima podatke o:
    ◦ Registarskom broju autobusa
    ◦ O broju sedišta u autobusu
    • Napraviti odgovarajući konstruktor, getere i setere.
    • Napraviti metodu koja ispisuje podatke o autobusu.

    • Napraviti niz autobusa.
    • Napraviti funkciju koja ispisuje podatke o svakom autobusu iz prosledjenog niza autobusa.
    • Napraviti funkciju ukupnoSedišta kojoj se prosleđuje niz autobusa, a koja određuje i vraća koliko 
      ukupno sedišta sadrže svi autobusi koji se nalaze u nizu autobusa
    • Napraviti funkciju maksSedista koja ispisuje podatke o autobusu koji ima najveći broj sedišta.
    • Napraviti funkciju ljudi kojoj se prosleđuje broj ljudi i niz autobusa a funkcija vraća true ukoliko 
      je moguće toliko ljudi smestiti u autobuse, u suprotnom vraća false 
    */

    class Autobus {
        private $registracija;
        private $sedista;
        

        //konstruktor
        public function __construct ($r, $s){
            $this->setRegistracija($r);
            $this->setSedista($s);
        }

        //set
        public function setRegistracija($r){
            $this->registracija = $r;
        }
        public function setSedista($s){
            $this->sedista = $s;
        }
        
        //get
        public function getRegistracija(){
            return $this->registracija;
        }
        public function getSedista(){
            return $this->sedista;
        }
        

        public function stampaj(){
            echo "
            <ul>
                <li>Registrski broj: {$this->getRegistracija()}</li>
                <li>Broj sedista: {$this->getSedista()}</li>
            </ul>
            ";
        }
    }

    $a1 = new Autobus (55772, 50);
    $a2 = new Autobus (78433, 45);
    $a3 = new Autobus (68273, 20);
    $a4 = new Autobus (26930, 65);
    $a5 = new Autobus (15777, 35);

    $bus = array ($a1, $a2, $a3, $a4, $a5);

    function spisak ($bus){
        foreach ($bus as $b){
            $b->stampaj();
        }
    }
    spisak ($bus);
    echo "<hr>";
    function ukupnoSedista ($bus){
        $ukSed=0;
        foreach ($bus as $b){
        $ukSed += $b->getSedista();
        }   
        return $ukSed;
    }
    echo "<p>Ukupan broj sedista je: </p>" . ukupnoSedista($bus);
    echo "<hr>";

    function maksSedista($bus){
        $maxSed = 0;
        foreach ($bus as $b){
            if ($b->getSedista() > $maxSed){
                $maxSed = $b->getSedista();
            }
        }
        foreach ($bus as $b){
        if ($b->getSedista() == $maxSed)
        $b->stampaj();
        }
    }
    echo "<p>Autobus sa najvise sedista je: </p>";
    maksSedista($bus);

    echo "<hr>";

    function staje ($n, $bus){
        foreach($bus as $b){
            if (ukupnoSedista($bus) >= $n){
                return true;
            }
            else {
                return false;
            }
        }
    }

    if (staje (200, $bus)){
        echo "<p>Putnike je moguće smestiti u autobuse</p>";
    }
    else {
        echo "<p>Putnike nije moguće smestiti u autobuse</p>";
    }


?>