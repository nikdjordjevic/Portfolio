<?php

class Sportista {
    private $ime;
    private $prezime;
    private $godRodjenja;
    private $gradRodjenja;

    //Konstruktor
    public function __construct($ime, $prezime, $godRodjenja, $gradRodjenja){
        $this->setIme($ime);
        $this->setPrezime($prezime);
        $this->setGodRodjenja($godRodjenja);
        $this->setGradRodjenja ($gradRodjenja);
    }

    //Get
    public function getIme(){
        return $this->ime;
    }
    public function getPrezime(){
        return $this->prezime;
    }
    public function getGodRodjenja(){
        return $this->godRodjenja;
    }
    public function getGradRodjenja(){
        return $this->gradRodjenja;
    }

    //Set

    public function setIme($ime){
        $this->ime = $ime;
    }
    public function setPrezime ($prezime){
        $this->prezime = $prezime;
    }
    public function setGodRodjenja ($godRodjenja){
        $this->godRodjenja = $godRodjenja;
    }
    public function setGradRodjenja ($gradRodjenja){
        $this->gradRodjenja = $gradRodjenja;
    }

    public function ispisiSportista(){
        echo "<ul>
        <li>Ime:{$this->getIme()} </li>
        <li>Prezime:{$this->getPrezime()}</li>
        <li>Godina rodjenja:{$this->getGodRodjenja()}.</li>
        <li>Grad rodjenja:{$this->getGradRodjenja()}</li>
        </ul>";
    }
}


?>