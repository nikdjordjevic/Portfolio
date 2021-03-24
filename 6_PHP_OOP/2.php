<?php

    /* 
    • Napraviti klasu Video koja od privatnih polja sadrži:
    ◦ naslov
    ◦ trajanje
    • Klasa Video od javnih metoda sadrži:
    ◦ Konstruktor koji postavlja sva polja
    ◦ Getere i setere
    ◦ Metodu stampaj koja štampa sve podatke o videu
    ◦ Napraviti niz od parem tri videa
    ◦ Napraviti funkciju prosek kojoj se prosleđuje niz filmova, a funkcija vraća prosečno trajanje filmova
    ◦ Napraviti funkciju najbliziProseku  koja ispisuje podatke o filmu čije je trajanje najbliže prosečnom 
    trajanju filmova iz niza. Ukoliko ima više takvih filmova, ispisati bilo koji od njih.
    */
    class Video {
        private $naslov;
        private $trajanje;
        

        //konstruktor
        public function __construct ($n, $t){
            $this->setNaslov($n);
            $this->setTrajanje($t);
        }

        //set
        public function setNaslov($n){
            $this->naslov = $n;
        }
        public function setTrajanje($t){
            $this->trajanje = $t;
        }
        
        //get
        public function getNaslov(){
            return $this->naslov;
        }
        public function getTrajanje(){
            return $this->trajanje;
        }
        
        //metode
        public function stampaj(){
            echo "
            <ul>
                <li>Naslov: '{$this->getNaslov()}'</li>
                <li>Trajanje: {$this->getTrajanje()} min.</li>
            </ul>
            ";
        }
    }

    $v1 = new Video ("Video_1", 1.55);
    $v2= new Video ("Video_2", 5.45);
    $v3 = new Video ("Video_3", 3.33);
    $v4 = new Video ("Video_4", 1.23);

    $vid = array ($v1, $v2, $v3, $v4);

    function prosek($vid){
        $ukupno = 0;
        foreach ($vid as $v){
            $ukupno += $v->getTrajanje();
        }
        $br = count($vid);
        return $ukupno / $br;
    }
    echo "<p>Prosečna dužina videa je:</p>" . prosek($vid); echo " min.";
    echo "<hr>";

    function najbliziProseku($vid){
        $najPr=$vid[0]->getTrajanje();
        foreach ($vid as $v){
            if (abs($v->getTrajanje() - prosek($vid)) < abs($najPr -prosek($vid))){
                $najPr = $v->getTrajanje();
            }
        }
        foreach($vid as $v){
            if($v->getTrajanje() == $najPr){
            $v->stampaj();
            }
        }
    }   
    echo "<p>Video čija je dužina najbliža proseku je: </p>";
    najbliziProseku($vid);




?>