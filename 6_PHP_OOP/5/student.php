<?php

abstract class Student {
    protected $ime;
    protected $osvojeniESPB;
    protected $prosecnaOcena;

    //konstr

    public function __construct ($ime, $espb, $prOc){
        $this->setIme($ime);
        $this->setEspb($espb);
        $this->setPrOc ($prOc);
    }

    //set
    public function setIme($ime){
        $this->ime = $ime;
    }
    public function setEspb ($espb){
        if ($espb<0){
            $this->osvojeniESPB = 0;
        }
        elseif ($espb <=300){
            $this->osvojeniESPB = $espb;
        }
        else {
            $this->osvojeniESPB = 300;
        }
       
    }
    public function setPrOc ($prOc){
        $this->prosecnaOcena = $prOc;
    }

    //get
    public function getIme(){
        return $this->ime;
    }
    public function getEspb(){
        return $this->osvojeniESPB;
    }
    public function getPrOc(){
        return $this->prosecnaOcena;
    }

    //metode

    public function stampa(){
        echo "<ul>
        <li>Ime:{$this->ime} </li>
        <li>ESPB poeni:{$this->osvojeniESPB}</li>
        <li>Prosecna ocena:{$this->prosecnaOcena}</li>
        </ul>";
    }

    abstract function skolarina($espb);
    abstract function prijavaIspita();

}


?>