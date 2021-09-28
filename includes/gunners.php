<?php

class Gunners {
    

    //Attributs
    private $name;
    private $class;

    const CLASS_DPS = 'Dps';
    const CLASS_HEAL = 'Heal';
    const CLASS_TANK = 'Tank';




    //Constructor
    public function __construct($name, $class) {
        $this->setName($name);
        $this->setClass($class);
    }



    //Getters
    public function getName() {
        return $this->name;
    }
    public function getClass() {
        return $this->class;
    }


    
    //Setters
    public function setName($value) {
        $this->name = htmlspecialchars($value);
    }
    public function setClass($value) {
        $this->class = htmlspecialchars($value);
    }


}












?>