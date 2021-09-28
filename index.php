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
    <title>Battleship</title>
</head>
<body>
<h1 style= "text-align:center">Embarquez Moussaillons!</h1>

<?php

    $jeanmich = new Gunners('Jean-Michel', Gunners::CLASS_DPS );
    $jeanluc = new Gunners('Jean-Luc', Gunners::CLASS_HEAL );
    $jeanedouard = new Gunners('Jean-Edouard', Gunners::CLASS_TANK );

    // echo $jeanmich->getName().'<br>'
    //     .$jeanmich->getClass().'<br><br>';
    // echo $jeanluc->getName().'<br>'
    //     .$jeanluc->getClass().'<br><br>';
    // echo $jeanedouard->getName().'<br>'
    //     .$jeanedouard->getClass().'<br><br>';


    $rafiot = new Boat("Rafiot", 0);
    $capitaine = new capitaine($conn);
    $capitaine->createBoat($rafiot);

?>
</body>
</html>