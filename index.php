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


    $rafiot = new Boat("Rafiot", 0);
    $capitaine = new capitaine($conn);
    $capitaine->createBoat($rafiot); -->


    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown button
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
    </ul>
    </div>


<div class="container">

    <div class="boat-1">
        <div class="gunner 1a">
            <h2 class="gunner-name"> Jean-Michel</h2>
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
            <h2 class="gunner-name"></h2>
                <div class="circle" id="circle-2a"></div>
        </div>
        <div class="gunner 2b">
            <h2 class="gunner-name"></h2>
                <div class="circle" id="circle-2b"></div>
        </div>
        <div class="gunner 2c">
            <h2 class="gunner-name"></h2>
                <div class="circle" id="circle-2c"></div>
        </div>
        <div class="gunner 2d">
            <h2 class="gunner-name"></h2>
                <div class="circle" id="circle-2d"></div>
        </div>
        <div class="gunner 2e">
            <h2 class="gunner-name"></h2>
                <div class="circle" id="circle-2e"></div>
        </div>
    </div>
</div>

</body>
</html>