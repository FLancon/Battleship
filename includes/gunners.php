<?php

class Gunner {


    //Attributs
    // private $name;
    private $class;
    private $pv;
    private $dps;
    private $heal;
    private $img;

    const CLASS_DPS = 'Dps';
    const CLASS_HEAL = 'Heal';
    const CLASS_TANK = 'Tank';


    
    //Constructor
    public function __construct($class, $pv, $dps, $heal, $img) {
        $this->setClass($class);
        $this->setPv($pv);
        $this->setDps($dps);
        $this->setHeal($heal);
        $this ->setImg($img);

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
    public function getImg() {
        return $this->img;
    }


    
    //Setters

    public function setClass($value) {
        $this->class = htmlspecialchars($value);
    }
    public function setPv($value) {
        $this->pv = htmlspecialchars($value);
    }
    public function setDps($value) {
        $this->dps = htmlspecialchars($value);
    }
    public function setHeal($value) {
        $this->heal = htmlspecialchars($value);
    }
    public function setImg($value) {
        $this->img = htmlspecialchars($value);
    }



}

?>