<?php

    /*
    Napraviti klasu Knjiga koja od privatnih polja sadrži:
    ◦ naslov
    ◦ autor
    ◦ godIzdanja
    ◦ brojStrana
    ◦ cena
    • Klasa Knjiga od javnih metoda sadrži:
    ◦ Konstruktor koji postavlja sva polja
    ◦ Metodu stampaj koja štampa sve podatke o knjizi
    ◦ Metodu obimna koja ispituje da li je knjiga obimna (ukoliko je broj strana veći od 600 tada je knjiga 
    obimna). Ukoliko je knjiga obimna ova metoda vraća true, u suprotnom vraća false.
    ◦ Metodu skupa koja ispituje da li je knjiga skupa(ukoliko je cena veća od 8000 tada je knjiga skupa). 
    Ukoliko je knjiga skupa metoda vraća true, u suprotnom metoda vraća false.
    ◦ Metodu dugackoime koja ispituje da li je ime autora dugačko (ukoliko je broj karaktera u imenu veći 
    od 18 ime se smatra dugačkim). Ukoliko je ime dugačko metoda vraća true, u suprotnom metoda vraća false. */

    class Knjiga {
        private $naslov;
        private $autor;
        private $godIzdanja;
        private $brojStrana;
        private $cena;

        //konstruktor
        public function __construct ($n, $a, $g, $b, $c){
            $this->setNaslov($n);
            $this->setAutor($a);
            $this->setGodIzdanja($g);
            $this->setBrojStrana($b);
            $this->setCena($c);
        }

        //set
        public function setNaslov($n){
            $this->naslov = $n;
        }
        public function setAutor($a){
            $this->autor = $a;
        }
        public function setGodIzdanja($g){
            $this->godIzdanja = $g;
        }
        public function setBrojStrana($b){
            $this->brojStrana = $b;
        }
        public function setCena($c){
            $this->cena = $c;
        }

        //get

        public function getNaslov(){
            return $this->naslov;
        }
        public function getAutor(){
            return $this->autor;
        }
        public function getGodIzdanja(){
            return $this->godIzdanja;
        }
        public function getBrojStrana(){
            return $this->brojStrana;
        }
        public function getCena(){
            return $this->cena;
        }

        //metode

        public function stampaj (){
            echo "
            <ul>
                <li>Naslov:'{$this->getNaslov()}'</li>
                <li>Autor:{$this->getAutor()}</li>
                <li>Izdata:{$this->getGodIzdanja()} godine</li>
                <li>Broj strana:{$this->getBrojStrana()}</li>
                <li>Cena:{$this->getCena()} dinara</li>
            </ul>
            ";
        }
        

        public function obimna(){
            $brStr = $this->getBrojStrana();
            if($brStr > 600){
            return true;
            }
            else {
            return false;
            }
        }

        public function skupa(){
            $cena = $this->getCena();
            if($cena > 8000){
            return true;
            }
            else {
            return false;
            }
        }

        public function dugackoIme(){
            $imeAutora = $this->getAutor();
            $duzinaImena = strlen($imeAutora);
            if($duzinaImena > 18){
            return true;
            }
            else {
            return false;
            }
        }
    }



    $k1 = new Knjiga ("Cveće za Aldžernona", "Danijel Kiz", 1958, 272, 799);

    $k1->stampaj();


?>