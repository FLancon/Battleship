<?php
    include './includes/dbconnect.local.php';
    include './includes/gunners.php';
    include './includes/boat.php';
    include './includes/capitaine.php';

    $capitaine = new Capitaine($conn);
    // <!-- Création nouveau bateau BDD via input  -->

    if(isset($_POST['submit_creation'])){
        $newboat = new Boat($_POST['NAME'], 0);
        $capitaine->createBoat($newboat);
        // header("Location: index.php");
    }

    
    // $newboat = new Boat($_POST['NAME'], 0);
    // $capitaine->createBoat($newboat);
    
    
    // Joueur 1

    
    // Creation DPS A1
 
            $dpsCap = $capitaine->createDps();
            $newdpsa1 = new Gunner(Gunner::CLASS_DPS, $dpsCap[0]["PV"], $dpsCap[0]["DPS"], $dpsCap[0]["HEAL"], $dpsCap[0]["IMG"]);
            // echo '<pre>';
            // print_r($newdps);
            // echo '</pre>';


    // Creation DPS2

            $dpsCap = $capitaine->createDps();
            $newdpsa2 = new Gunner(Gunner::CLASS_DPS, $dpsCap[0]["PV"], $dpsCap[0]["DPS"], $dpsCap[0]["HEAL"], $dpsCap[0]["IMG"]);

            
    // Creation Tank A1

            $tankCap = $capitaine->createTank();
            $newtanka1 = new Gunner(Gunner::CLASS_TANK, $tankCap[0]["PV"], $tankCap[0]["DPS"], $tankCap[0]["HEAL"], $tankCap[0]["IMG"]);

            
    // Creation Tank A2

            $tankCap = $capitaine->createTank();
            $newtanka2 = new Gunner(Gunner::CLASS_TANK, $tankCap[0]["PV"], $tankCap[0]["DPS"], $tankCap[0]["HEAL"], $tankCap[0]["IMG"]);


    // Creation HEAL A1

            $healCap = $capitaine->createHeal();
            $newheala1 = new Gunner(Gunner::CLASS_HEAL, $healCap[0]["PV"], $healCap[0]["DPS"], $healCap[0]["HEAL"], $healCap[0]["IMG"]);

            
     
            

// Joueur 2
    
// Creation DPS B1
 
        $dpsCap = $capitaine->createDps();
        $newdpsb1 = new Gunner(Gunner::CLASS_DPS, $dpsCap[0]["PV"], $dpsCap[0]["DPS"], $dpsCap[0]["HEAL"], $dpsCap[0]["IMG"]);
 


// Creation DPS B2

        $dpsCap = $capitaine->createDps();
        $newdpsb2 = new Gunner(Gunner::CLASS_DPS, $dpsCap[0]["PV"], $dpsCap[0]["DPS"], $dpsCap[0]["HEAL"], $dpsCap[0]["IMG"]);

        
// Creation Tank B1

        $tankCap = $capitaine->createTank();
        $newtankb1 = new Gunner(Gunner::CLASS_TANK, $tankCap[0]["PV"], $tankCap[0]["DPS"], $tankCap[0]["HEAL"], $tankCap[0]["IMG"]);

        
// Creation Tank B2

        $tankCap = $capitaine->createTank();
        $newtankb2 = new Gunner(Gunner::CLASS_TANK, $tankCap[0]["PV"], $tankCap[0]["DPS"], $tankCap[0]["HEAL"], $tankCap[0]["IMG"]);


// Creation HEAL B1

        $healCap = $capitaine->createHeal();
        $newhealb1 = new Gunner(Gunner::CLASS_HEAL, $healCap[0]["PV"], $healCap[0]["DPS"], $healCap[0]["HEAL"], $healCap[0]["IMG"]);



        


    // TEST CREATION D'UN TABLEAU ISSU DE LA BDD 'GUNNER'
        // $sql = $conn->query('SELECT * FROM GUNNER');
        // $exec_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

        //     echo '<pre>';
        //     print_r($exec_sql);
        //     echo '</pre>';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="script.js" defer></script>
    <title>Battleship</title>
</head>
<body>



<?php
// Créer un tableau des infos de la table boat de la BDD:
$data_boat = $conn->query('SELECT * FROM BOAT');
$exec_data_boat = $data_boat->fetchAll(PDO::FETCH_ASSOC);

        // echo '<pre>';
        // print_r($exec_data_boat[$i]['NAME']);
        // echo '</pre>';

    
?>


<div id="select_container">
    
    <div id="select_boat1">

        <h2> <?php echo "test"?></h2>

        <div class="dropdown1">
        <button onclick="myFunction1()" class="dropbtn1">Boat List</button>
            <div id="myDropdown1" class="dropdown-content1">
                <?php
                    for($i=0; $i < $countboat; $i++){ ?>
                    <a href="#<?php echo $exec_data_boat[$i]['NAME'] ?>"><?php echo $exec_data_boat[$i]['NAME'] ?></a>
                    <?php  } ?>
            </div>
            <form action="" method="POST">
                <input type="txt" name="NAME" placeholder="New Boat">
                <input type="submit" name="submit_creation" value="Créer">
            </form>
        </div>
    </div>

    <div id="select_boat2">

         <h2><?php echo "test"?></h2>

        <div class="dropdown2">
        <button onclick="myFunction2()" class="dropbtn2">Boat List</button>
            <div id="myDropdown2" class="dropdown-content2">
                <?php
                    for($i=0; $i < $countboat; $i++){ ?>
                    <a href="#<?php echo $exec_data_boat[$i]['NAME'] ?>"><?php echo $exec_data_boat[$i]['NAME'] ?></a>
                    <?php  } ?>
            </div>
            <form action="" method="POST">
                <input type="text" name="NAME" placeholder="New Boat">
                <input type="submit" name="submit_creation" value="Créer">
            </form>
        </div>
    </div>
</div>


<div class="container">

    <div class="boat-1">

        <!-- <h2> TEST </h2> -->

        <div class="gunner 1a">
            <h2 class="gunner-name"> <?php echo $newdpsa1->getClass()?></h2>
            <div class="circle" id="circle-1a" style="background-image: url('<?php echo $newdpsa1->getImg()?>');" ></div>

            <!-- background-image: url('./assets/img/avatar-tank.png') -->
            
        </div>
        <div class="gunner 1b">
            <h2 class="gunner-name"><?php echo $newdpsa2->getClass()?></h2>
                <div class="circle" id="circle-1b" style="background-image: url('<?php echo $newdpsa2->getImg()?>');"></div>
        </div>
        <div class="gunner 1c">
            <h2 class="gunner-name"><?php echo $newtanka1->getClass()?></h2>
                <div class="circle" id="circle-1c" style="background-image: url('<?php echo $newtanka1->getImg()?>');"></div>
        </div>
        <div class="gunner 1d">
            <h2 class="gunner-name"><?php echo $newtanka2->getClass()?></h2>
                <div class="circle" id="circle-1d" style="background-image: url('<?php echo $newtanka2->getImg()?>');"></div>
        </div>
        <div class="gunner 1e">
            <h2 class="gunner-name"><?php echo $newheala1->getClass()?></h2>
                <div class="circle" id="circle-1e" style="background-image: url('<?php echo $newheala1->getImg()?>');"></div>
        </div>
    </div>

    <div class="boat-2">

        <div class="gunner 2a">
            <h2 class="gunner-name"><?php echo $newhealb1->getClass()?></h2>
                <div class="circle" id="circle-2a" style="background-image: url('<?php echo $newhealb1->getImg()?>');"></div>
        </div>
        <div class="gunner 2b">
            <h2 class="gunner-name"><?php echo $newtankb2->getClass()?></h2>
                <div class="circle" id="circle-2b" style="background-image: url('<?php echo $newtankb2->getImg()?>');"></div>
        </div>
        <div class="gunner 2c">
            <h2 class="gunner-name"><?php echo $newtankb1->getClass()?></h2>
                <div class="circle" id="circle-2c" style="background-image: url('<?php echo $newtankb1->getImg()?>');"></div>
        </div>
        <div class="gunner 2d">
            <h2 class="gunner-name"><?php echo $newdpsb2->getClass()?></h2>
                <div class="circle" id="circle-2d" style="background-image: url('<?php echo $newdpsb2->getImg()?>');"></div>
        </div>
        <div class="gunner 2e">
            <h2 class="gunner-name"><?php echo $newdpsb1->getClass()?></h2>
                <div class="circle" id="circle-2e" style="background-image: url('<?php echo $newdpsb1->getImg()?>');"></div>
        </div>
    </div>
</div>

</body>
</html>
