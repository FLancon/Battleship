<?php
    include './includes/dbconnect.local.php';
    include './includes/gunners.php';
    include './includes/boat.php';
    include './includes/capitaine.php';
    // header('Content-Type: application/json');


    // <!-- Création nouveau bateau BDD via input  -->
    $capitaine = new Capitaine($conn);
    

    // Bouton de création de BOAT dans la BDD
    if(isset($_POST['submit_creation'])){
        $newboat = new Boat($_POST['NAME'], 0);
        $capitaine->createBoat($newboat);
        // header("Location: index.php");
    }
    

    // Creation d'un objet DPS
            $dpsCap = $capitaine->createDps();
            $newdps = new Gunner(Gunner::CLASS_DPS, $dpsCap[0]["PV"], $dpsCap[0]["DPS"], $dpsCap[0]["HEAL"], $dpsCap[0]["IMG"]);
            $arraydps = (array)$newdps;

    // Creation d'un objet Tank
            $tankCap = $capitaine->createTank();
            $newtank = new Gunner(Gunner::CLASS_TANK, $tankCap[0]["PV"], $tankCap[0]["DPS"], $tankCap[0]["HEAL"], $tankCap[0]["IMG"]);
            $arraytank = (array)$newtank;

   // Creation d'un objet HEAL 
            $healCap = $capitaine->createHeal();
            $newheal = new Gunner(Gunner::CLASS_HEAL, $healCap[0]["PV"], $healCap[0]["DPS"], $healCap[0]["HEAL"], $healCap[0]["IMG"]);
            $arrayheal = (array)$newheal;

?>



<!DOCTYPE html>
<html lang="fr">
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


// Créer un tableau des infos de la table Gunner de la BDD:
$data_gunner = $conn->query('SELECT * FROM GUNNER');
$exec_data_gunner = $data_gunner->fetchAll(PDO::FETCH_ASSOC);


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


<div class="container" id="container">

    <div class="boat-1" id="boat1">

    <script>

        //Recup array boat 1 et transformation en obj JS
        var dpsa1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydps)) ?>');
        var dpsa2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydps)) ?>');
        var dpsa3=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydps)) ?>');
        var tanka1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraytank)) ?>');
        var tanka2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraytank)) ?>');
        var heala1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arrayheal)) ?>');
        var heala2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arrayheal)) ?>');

        //Recup array boat 2 et transformation en obj JS
        var dpsb1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydps)) ?>');
        var dpsb2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydps)) ?>');
        var dpsb3=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraydps)) ?>');
        var tankb1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraytank)) ?>');
        var tankb2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arraytank)) ?>');
        var healb1=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arrayheal)) ?>');
        var healb2=$.parseJSON('<?php echo str_replace('\\u0000', '', json_encode($arrayheal)) ?>');

        // Création Array BOAT 1 & 2
        var arrayboat1 = [dpsa1, dpsa2, dpsa3, tanka1, heala1];
        var arrayboat2 = [dpsb1, dpsb2, dpsb3, tankb1, healb1];


        // fonction Creation graphique Initiale des Avatars Gunners du BOAT
        function create(arg1, arg2, arg3, arg4) {
            for (let i in arg1) {

                var newH2 = document.createElement("h2");
                newH2.className = arg2 + i + '';
                let name = document.createTextNode(arg1[i].Gunnerclass)
                newH2.appendChild(name);


                var newDiv = document.createElement("div");
                newDiv.className = arg3;
                newDiv.id = arg3+i+'';
                newDiv.style = 'background-image: url(' + arg1[i].Gunnerimg + ');'

                const boat1 = document.querySelector('#arg4');

                arg4.appendChild(newH2);
                arg4.appendChild(newDiv);
            }

                console.log(arg1)

        }

        // appel fonction de creation graphique de Boat1
        create(arrayboat1, 'gunner-class 1', 'circle 1', boat1)

    </script>
        
    </div>

    <div class="boat-2" id="boat2">

    <script>
        // appel fonction de creation graphique de Boat2
        create(arrayboat2, 'gunner-class 2', 'circle 2', boat2)
    </script>


        
    </div>

</div>



<div class="button">
    <input type="submit" id="btnteama1" onclick="pushBoat(arrayboat1, 'gunner-class 1', 'circle 1', dpsa1, dpsa2, dpsa3, tanka1, heala1)" value="3/1/1">
    <input type="submit" id="btnteama2" onclick="pushBoat(arrayboat1, 'gunner-class 1', 'circle 1', dpsa1, dpsa2, tanka1, heala1, heala2)" value="2/1/2">
    <input type="submit" id="btnteama3" onclick="pushBoat(arrayboat1, 'gunner-class 1', 'circle 1', dpsa1, dpsa2, tanka1, tanka2, heala1)" value="2/2/1">
    <input type="submit" id="btnattack" onclick="attackA()" value="A l'abordage">
    <input type="submit" id="btnattack" onclick="attackB()" value="B l'abordage">
    <input type="submit" id="btnteamb1" onclick="pushBoat(arrayboat2, 'gunner-class 2', 'circle 2', dpsb1, dpsb2, dpsb3, tankb1, healb1)" value="3/1/1">
    <input type="submit" id="btnteamb2" onclick="pushBoat(arrayboat2, 'gunner-class 2', 'circle 2', dpsb1, dpsb2, tankb1, healb1, healb2)" value="2/1/2">
    <input type="submit" id="btnteamb3" onclick="pushBoat(arrayboat2, 'gunner-class 2', 'circle 2', dpsb1, dpsb2, tankb1, tankb2, healb1)" value="2/2/1">
</div>



<script>





// Function push pré-compo team
function pushBoat(arg1, arg2, arg3, arg4, arg5, arg6, arg7, arg8) {
    arg1 = [];
    arg1.push(arg4, arg5, arg6, arg7, arg8);

    for (let i in arg1) {
        let title = document.getElementsByClassName(arg2+i+'')
        let circle = document.getElementById(arg3+i+'');
            for(let titre of title){
                titre.textContent = ''+arg1[i].Gunnerclass+'';
            }
        
        circle.style= 'background-image: url('+arg1[i].Gunnerimg+');';

    }

    console.log(arg1);

}




// Pattern Attack BOAT 1
function attackA() {
    for (let i in arrayboat2) {
        arrayboat2[i].Gunnerpv = (arrayboat2[i].Gunnerpv - arrayboat1[i].Gunnerdps);

        if (arrayboat2[i].Gunnerpv < 0) {
            arrayboat2.splice([i],1);
        }
    }

    // Vide le Boat pour le remplir des gunners encore en vie
    $("#boat2").empty();

    create(arrayboat2, 'gunner-class 2', 'circle 2', boat2)

}



// Pattern Attack BOAT 2
function attackB() {
 
    for (let i in arrayboat1) {
        // console.log("attackB",Number(arrayboat2[i].Gunnerdps));
        // console.log("nombre d'attaque",i);
        // console.table(arrayboat2);
        // console.table(arrayboat1);
            arrayboat1[i].Gunnerpv = (Number(arrayboat1[i].Gunnerpv) - Number(arrayboat2[i].Gunnerdps));

        if (arrayboat1[i].Gunnerpv < 0) {
            arrayboat1.splice([i],1);
        }
    }

    $("#boat1").empty();
    create(arrayboat1, 'gunner-class 1', 'circle 1', boat1)
}




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
