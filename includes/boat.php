<?php

class Boat {
    private $name;
    private $xp;

    //constructor
    public function __construct($name, $xp) {
        $this->setName($name);
        $this->setXp($xp);
    }




    //getters
    public function getName() {
        return $this->name;
    }

    public function getXp() {
        return $this->xp;
    }



    //setters
    public function setName($value) {
        $this->name = htmlspecialchars($value);
    }

    public function setXp($value) {
        $this->xp = htmlspecialchars($value);
    }

}



?>