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

        $sql = $this->conn->prepare('INSERT INTO `BOAT`(`Name`, `xp`) VALUES ("'.$boat->getName().'", "'.$boat->getXp().'")');
        $sql->execute();
    }






    // TEST DE FONCTION POUR SELECTIONNER UN BATEAU A PARTIR DE LA TABLE BOAT
    // public function queryBoat(Boat $boat) {
    //     $sql = $this->conn->query('SELECT * FROM BOAT');
    //     $sql->execute();
    //     return $sql->fetchAll();
    // }

    
    public function createDps() {
            $sql = $this->conn->query('SELECT * FROM GUNNER WHERE ID=2');
            $sql->execute();
            return $sql->fetchAll();
    }
    public function createTank() {
            $sql = $this->conn->query('SELECT * FROM GUNNER WHERE ID=1');
            $sql->execute();
            return $sql->fetchAll();
    }
    public function createHeal() {
            $sql = $this->conn->query('SELECT * FROM GUNNER WHERE ID=3');
            $sql->execute();
            return $sql->fetchAll();
    }

}

?>