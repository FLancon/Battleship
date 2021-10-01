<?php

// include './includes/dbconnect.local.php';

class Capitaine {
    //attributs
    private $conn;

    

    //constructor
    public function __construct(PDO $bdd) {
        $this->setConn($bdd);


    }

    public function getConn() {
        return $this->conn;

        
    }

    public function setConn(PDO $conn) {
        $this->conn = $conn;

    }



    public function createBoat(Boat $boat) {
        // var_dump($boat);

        $sql = $this->conn->prepare('INSERT INTO `BOAT`(`Name`, `xp`) VALUES ("'.$boat->getName().'", "'.$boat->getXp().'")');
        $sql->execute();


    }
    


    public function createGunner(Gunner $gunner) {
        $bite = $this->conn->query('SELECT * FROM GUNNER');
        $stat = json_encode($bite);

    }



}


?>