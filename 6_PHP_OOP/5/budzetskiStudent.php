<?php

require_once "student.php";

class BudzetskiStudent extends Student {
    public function __construct($ime, $espb, $prOc){
        parent::__construct($ime, $espb, $prOc);
    }


    function skolarina($espbPren){
        return (300 - $this->osvojeniESPB)*200;
    }

    function prijavaIspita(){
        return 100;
    }
}

?>