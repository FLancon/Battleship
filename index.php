<?php
    include './includes/dbconnect.local.php';
    include './includes/gunners.php';
    include './includes/boat.php';
    include './includes/capitaine.php';
    // header('Content-Type: application/json');


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

            // var_dump($newdpsa1);
            $arraydpsa1 = (array)$newdpsa1;
            // var_dump($arraydpsa1);
            // echo str_replace('\\u0000', '', json_encode($arraydpsa1));


            // class Gunner implements JsonSerializable {

            //     public function jsonSerialize() {
            //         return [
            //             'PV' => $this->getPv(),
            //             'DPS' => $this->getDps(),
            //             'private_something' => $this->get_private_something()
            //         ];
            //     }
            //     ...
            // }





            // echo json_encode(array(
            //     "age" => 4,
            //     "name" => "baby",
            // ));


            

    // Creation DPS2

            $dpsCap = $capitaine->createDps();
            $newdpsa2 = new Gunner(Gunner::CLASS_DPS, $dpsCap[0]["PV"], $dpsCap[0]["DPS"], $dpsCap[0]["HEAL"], $dpsCap[0]["IMG"]);
            $arraydpsa2 = (array)$newdpsa2;


            
    // Creation Tank A1

            $tankCap = $capitaine->createTank();
            $newtanka1 = new Gunner(Gunner::CLASS_TANK, $tankCap[0]["PV"], $tankCap[0]["DPS"], $tankCap[0]["HEAL"], $tankCap[0]["IMG"]);
            $arraytanka1 = (array)$newtanka1;

            
    // Creation Tank A2

            $tankCap = $capitaine->createTank();
            $newtanka2 = new Gunner(Gunner::CLASS_TANK, $tankCap[0]["PV"], $tankCap[0]["DPS"], $tankCap[0]["HEAL"], $tankCap[0]["IMG"]);
            $arraytanka2 = (array)$newtanka2;



    // Creation HEAL A1

            $healCap = $capitaine->createHeal();
            $newheala1 = new Gunner(Gunner::CLASS_HEAL, $healCap[0]["PV"], $healCap[0]["DPS"], $healCap[0]["HEAL"], $healCap[0]["IMG"]);
            $arrayheala1 = (array)$newheala1;


            
     
            

// Joueur 2
    
// Creation DPS B1
 
        $dpsCap = $capitaine->createDps();
        $newdpsb1 = new Gunner(Gunner::CLASS_DPS, $dpsCap[0]["PV"], $dpsCap[0]["DPS"], $dpsCap[0]["HEAL"], $dpsCap[0]["IMG"]);
        $arraydpsb1 = (array)$newdpsb1;


// Creation DPS B2

        $dpsCap = $capitaine->createDps();
        $newdpsb2 = new Gunner(Gunner::CLASS_DPS, $dpsCap[0]["PV"], $dpsCap[0]["DPS"], $dpsCap[0]["HEAL"], $dpsCap[0]["IMG"]);
        $arraydpsb2 = (array)$newdpsb2;
        
// Creation Tank B1

        $tankCap = $capitaine->createTank();
        $newtankb1 = new Gunner(Gunner::CLASS_TANK, $tankCap[0]["PV"], $tankCap[0]["DPS"], $tankCap[0]["HEAL"], $tankCap[0]["IMG"]);
        $arraytankb1 = (array)$newtankb1;
        
// Creation Tank B2

        $tankCap = $capitaine->createTank();
        $newtankb2 = new Gunner(Gunner::CLASS_TANK, $tankCap[0]["PV"], $tankCap[0]["DPS"], $tankCap[0]["HEAL"], $tankCap[0]["IMG"]);
        $arraytankb2 = (array)$newtankb2;

// Creation HEAL B1

        $healCap = $capitaine->createHeal();
        $newhealb1 = new Gunner(Gunner::CLASS_HEAL, $healCap[0]["PV"], $healCap[0]["DPS"], $healCap[0]["HEAL"], $healCap[0]["IMG"]);
        $arrayhealb1 = (array)$newhealb1;


        


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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
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
            <div class="circle" id="circle-1a" style="background-image: url('<?php echo $newdpsa1->getImg()?>');" >
                <!-- <div class="info"></div>    -->
            </div>
            
            
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
        <div class="gunner 2e" id="gunnerb5">
            <h2 class="gunner-name"><?php echo $newdpsb1->getClass()?></h2>
                <div class="circle" id="circle-2e" style="background-image: url('<?php echo $newdpsb1->getImg()?>');"></div>
        </div>
    </div>
</div>
<div class="button">
    <input type="submit" id="btnattack" onclick="attack()" value="A l'abordage">
</div>
<script>
console.log("Hello World !");
$(document).ready(function(){
    alert("jQuery Works")
});
//Recup array boat 1 et trtansformation en obj JS

var dpsa1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydpsa1)) ?>');
console.log(dpsa1);

var dpsa2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydpsa2)) ?>');
console.log(dpsa2);

var tanka1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraytanka1)) ?>');
console.log(tanka1);

var tanka2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraytanka2)) ?>');
console.log(tanka2);

var heala1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arrayheala1)) ?>');
console.log(heala1);

//Recup array boat 2 et transformation en obj JS

var dpsb1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydpsb1)) ?>');
console.log(dpsb1);

var dpsb2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydpsb2)) ?>');
console.log(dpsb2);

var tankb1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraytankb1)) ?>');
console.log(tankb1);

var tankb2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraytankb2)) ?>');
console.log(tankb2);

var healb1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arrayhealb1)) ?>');
console.log(healb1);

console.log(typeof dpsa1);
console.log(dpsa1.Gunnerdps)

// Pattern d'attaque
function attack() {
   dpsb1.Gunnerpv = (dpsb1.Gunnerpv - dpsa1.Gunnerdps);
//    console.log(dpsb1.Gunnerpv);
   if (dpsb1.Gunnerpv <= 20) {
       document.getElementById("circle-2e").style.backgroundColor = 'red';
   }
   else if (dpsb1.Gunnerpv == 0) {
       document.getElementById("gunnerb5").style.display = 'none';
   }
   console.log(`Le gunner dispose encore de ${dpsb1.Gunnerpv} PV`);

};

// attack();
console.log(`Le gunner dispose encore de ${dpsb1.Gunnerpv} PV`);

var arrayboat1 = [];
arrayboat1.push(dpsa1.Gunnerdps, dpsa2.Gunnerdps, tanka1.Gunnerdps, tanka2.Gunnerdps, heala1.Gunnerdps);
console.log(arrayboat1);

// var test = php json_encode($arraydpsa1);?>')';
// console.log(test);
 
// alert (JSON.stringify(test));

// $(document).ready(function(){
// $.ajax({
//     type : 'POST',
//     url : 'index.php',
//     dataType : 'json',
//     success : function(data){
 
//                var json_data = JSON.parse(data);
//                 console.log(json_data);
//     }
// });
// });

    // fetch("index.php")
    // .then((arraydpsa1) => arraydpsa1.json())
    // .then((data) => {
    //   console.log(data);
    // });



// fetch("index.php").then(async response => {
//       try {
//        const data = await response.json()
//        console.log('response data?', data)
//      } catch(error) {
//        console.log('Error happened here!' + error)
//        console.error(error)
//      }
//     })

//     fetch("index.php", {
//   method: "GET",
//   headers: {
//     "Content-Type": "application/json"
//   }
// }).then(response => response.json())

//     faireQqc()
// .then(result => faireAutreChose(result))
// .then(newResult => faireUnTroisiemeTruc(newResult))
// .then(finalResult => {
//   console.log('Résultat final : ' + finalResult);
// })
// .catch(failureCallback);

// fetch("index.php")
//     .then(res => res.json())
//     .then(data => {
//         console.log(data);
//     });

</script>
</body>
</html>
