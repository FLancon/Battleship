<?php

class Gunner {


    //Attributs
    // private $name;
    private $class;
    private $pv;
    private $dps;
    private $heal;

    const CLASS_DPS = 'Dps';
    const CLASS_HEAL = 'Heal';
    const CLASS_TANK = 'Tank';




    //Constructor
    public function __construct($class, $pv, $dps, $heal) {
        $this->setClass($class);
        $this->setPv($pv);
        $this->setDps($dps);
        $this->setHeal($heal);

    }



    //Getters
    public function getClass() {
        return $this->class;
    }
    public function getPv() {
        return $this->pv;
    }
    public function getDps() {
        return $this->dps;
    }
    public function getHeal() {
        return $this->heal;
    }


    
    //Setters

    public function setClass($value) {
        $this->class = htmlspecialchars($value);
    }
    public function setPv($value) {
        $this->class = htmlspecialchars($value);
    }
    public function setDps($value) {
        $this->class = htmlspecialchars($value);
    }
    public function setHeal($value) {
        $this->class = htmlspecialchars($value);
    }



}

?>