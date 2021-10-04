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
        var_dump($boat);

        $sql = $this->conn->prepare('INSERT INTO `BOAT`(`Name`, `xp`) VALUES ("'.$boat->getName().'", "'.$boat->getXp().'")');
        $sql->execute();    
    }
    
    public function createDps(Gunner $dps) {
        $class = Gunner::CLASS_DPS;
            $sql = $this->conn->query('SELECT * FROM GUNNER');
            $exec_sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        $pv = $exec_sql [1] [2];
        $dps = $exec_sql [1] [3];
        $heal = $exec_sql [1] [4];

        var_dump($dps);

    }






    // $gunner1 = new Gunner (Gunner::CLASS_DPS, 100, 50, 0);

}


?>