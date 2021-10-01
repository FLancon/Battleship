<?php
    include './includes/dbconnect.local.php';
    include './includes/gunners.php';
    include './includes/boat.php';
    include './includes/capitaine.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="script.js" defer></script>
    <title>Battleship</title>
</head>
<body>



<!-- 
    $jeanmich = new Gunners('Jean-Michel', Gunners::CLASS_DPS );
    $jeanluc = new Gunners('Jean-Luc', Gunners::CLASS_HEAL );
    $jeanedouard = new Gunners('Jean-Edouard', Gunners::CLASS_TANK );

    echo $jeanmich->getName().'<br>'
        .$jeanmich->getClass().'<br><br>';
    echo $jeanluc->getName().'<br>'
        .$jeanluc->getClass().'<br><br>';
    echo $jeanedouard->getName().'<br>'
        .$jeanedouard->getClass().'<br><br>';
-->


<?php
    $queen = new Boat("Queen", 0);
    $capitaine = new capitaine($conn);
    $capitaine->createBoat($queen);
?>


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

        <h2> Joueur 1</h2>

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

         <h2>Joueur 2</h2>

        <div class="dropdown2">
        <button onclick="myFunction2()" class="dropbtn2">Boat List</button>
            <div id="myDropdown2" class="dropdown-content2">
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


<!-- Création nouveau bateau BDD via input  -->
    <?php 
        if(isset($_POST['submit_creation'])){
            $req=$conn->prepare('INSERT INTO BOAT (NAME) VALUES (:NAME)');
            $req->execute(array(
                'NAME'=>$_POST['NAME'],

            ));
            header("Location: index.php");
        }
    ?>

</div>


<div class="container">


    <div class="boat-1">

        <h2> <?php echo $_POST['NAME'] ?> </h2>

        <div class="gunner 1a">
            <h2 class="gunner-name">Jean-Michel</h2>
            <div class="circle" id="circle-1a"></div>
        </div>
        <div class="gunner 1b">
            <h2 class="gunner-name">Jean Jean</h2>
                <div class="circle" id="circle-1b"></div>
        </div>
        <div class="gunner 1c">
            <h2 class="gunner-name">Jean Mich</h2>
                <div class="circle" id="circle-1c"></div>
        </div>
        <div class="gunner 1d">
            <h2 class="gunner-name"> Jean Edouard</h2>
                <div class="circle" id="circle-1d"></div>
        </div>
        <div class="gunner 1e">
            <h2 class="gunner-name">Jante</h2>
                <div class="circle" id="circle-1e"></div>
        </div>
    </div>

    <div class="boat-2">
        <div class="gunner 2a">
            <h2 class="gunner-name">Pierre-Paul</h2>
                <div class="circle" id="circle-2a"></div>
        </div>
        <div class="gunner 2b">
            <h2 class="gunner-name">Pierre-alexis</h2>
                <div class="circle" id="circle-2b"></div>
        </div>
        <div class="gunner 2c">
            <h2 class="gunner-name">Pierre-yves</h2>
                <div class="circle" id="circle-2c"></div>
        </div>
        <div class="gunner 2d">
            <h2 class="gunner-name">Pierrot</h2>
                <div class="circle" id="circle-2d"></div>
        </div>
        <div class="gunner 2e">
            <h2 class="gunner-name">Pierre</h2>
                <div class="circle" id="circle-2e"></div>
        </div>
    </div>
</div>

</body>
</html>