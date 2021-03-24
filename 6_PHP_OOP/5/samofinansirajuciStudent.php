<?php

require_once "student.php";


class SamofinansirajuciStudent extends Student {

    public function __construct($ime, $espb, $prOc){
        parent::__construct($ime, $espb, $prOc);
    }


    function skolarina($espbPren){

        if ($this->prosecnaOcena < 8){
            return 1900 * $espbPren;
        }
        else {
            return 1600 * $espbPren;
        }
    }

    function prijavaIspita(){
        return 400;
    }
}

?>