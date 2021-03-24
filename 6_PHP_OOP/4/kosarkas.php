<?php

    require_once "sportista.php";

    class Kosarkas extends Sportista{
        private $poeni;
        
        //konstr
        public function __construct ($ime, $prezime, $godRodjenja, $gradRodjenja, $poeni){

            parent::__construct($ime, $prezime, $godRodjenja, $gradRodjenja);
            $this->setPoeni($poeni);
        }

        //get
        public function getPoeni(){
            return $this->poeni;
        }
    
        //set
        public function setPoeni($poeni){
            $this->poeni = $poeni;
        }
    
        public function ispisiKosarkas(){
            echo "<ul>
            <li>Ime:{$this->getIme()} </li>
            <li>Prezime:{$this->getPrezime()}</li>
            <li>Godina rodjenja:{$this->getGodRodjenja()}.</li>
            <li>Grad rodjenja:{$this->getGradRodjenja()}</li>
            <li>Poeni:" . implode(", ", $this->getPoeni()) . "</li>
            </ul>";
        }
    }
?>