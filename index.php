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
        header('location:index.php');
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



    // Création objet bateau

    // Creation d'un objet player1

    // Creation d'un objet player2
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Battleship</title>
</head>
<body>



<?php
// Créer un tableau des infos de la table boat de la BDD:
$data_boat = $conn->query('SELECT * FROM BOAT');
$exec_data_boat = $data_boat->fetchAll(PDO::FETCH_ASSOC);


// Fonction requete recompense
if (isset($_GET['victoire'])) {
    $winner = $_GET['victoire'];
    $query = 'UPDATE BOAT SET XP = XP + 1 WHERE `NAME` = "'.$winner.'"';
    $sql = $conn->prepare($query);
    $sql -> execute();
    // var_dump($sql);
    // var_dump($query); die();
    header('Location: index.php');
}

// Créer un tableau des infos de la table Gunner de la BDD:
$data_gunner = $conn->query('SELECT * FROM GUNNER');
$exec_data_gunner = $data_gunner->fetchAll(PDO::FETCH_ASSOC);

?>


<div id="select_container">
    
    <div id="select_boat1">

        <h2> <?php echo "Équipe N°1"?></h2>

        <div class="boat1">
        
            <?php
                for($i=0; $i < $countboat; $i++){ ?>
                    <div>
                        <input type="checkbox" class="boxes1" name="interest" value="<?php echo $exec_data_boat[$i]['NAME'] ?>">
                        <label id="boatName" for="coding"><?php echo $exec_data_boat[$i]['NAME'] ?></label>
                        <label for="coding"> - </label>
                        <label id="boatXp" for="coding"><?php echo $exec_data_boat[$i]['XP'] ?></label>
                    </div>
            <?php } ?>
        
            <form name="myForm" action="" method="POST" onsubmit="return validateForm()">
                <input type="txt" name="NAME" placeholder="New Boat" pattern="[a-zA-Z0-9-]+">
                <input type="submit" name="submit_creation" value="Créer">
            </form>
            
            <button id="submit1" onclick="selectboat1(); return false;">Ready!</button>


        </div>
    </div>

    <div id="select_boat2">

         <h2><?php echo "Équipe N°2"?></h2>

         <div class="boat2">
        
                <?php
                    for($i=0; $i < $countboat; $i++){ ?>
                        <div>
                            <input type="checkbox" class="boxes2" name="interest2" value="<?php echo $exec_data_boat[$i]['NAME'] ?>">
                            <label id="boatName" for="coding" ><?php echo $exec_data_boat[$i]['NAME'] ?></label>
                            <label for="coding"> - </label>
                            <label id="boatXp" for="coding" value="<?php echo $exec_data_boat[$i]['XP'] ?>"><?php echo $exec_data_boat[$i]['XP'] ?></label>
                        </div>
                <?php } ?>
            
                <form name="myForm" action="" method="POST" onsubmit="return validateForm()">
                    <input type="txt" name="NAME" placeholder="New Boat" pattern="[a-zA-Z0-9-]+">
                    <input type="submit" name="submit_creation" value="Créer">
                </form>

                <div>
                    <button id="submit2" onclick="selectboat2(); return false;">Ready!</button>
                </div>
            </div>
        </div>
    </div>

    <div id="button-compo">
        <div id="button-p1">
            <h2>Compo équipe N°1</h2>
            <input type="submit" id="btnteama1" onclick="pushBoat(arrayboat1, 'gunner-class 1', 'circle 1', dpsa1, dpsa2, dpsa3, tanka1, heala1, boat1)" value="3/1/1">
            <input type="submit" id="btnteama2" onclick="pushBoat(arrayboat1, 'gunner-class 1', 'circle 1', dpsa1, dpsa2, tanka1, heala1, heala2, boat1)" value="2/1/2">
            <input type="submit" id="btnteama3" onclick="pushBoat(arrayboat1, 'gunner-class 1', 'circle 1', dpsa1, dpsa2, tanka1, tanka2, heala1, boat2)" value="2/2/1">
            <input type="submit" id="p1-validate" onclick="displaybtn1()" value="Ready!">

        </div>

        <div id="button-p2">
        <h2>Compo équipe N°2</h2>
        <input type="submit" id="btnteamb1" onclick="pushBoat(arrayboat2, 'gunner-class 2', 'circle 2', dpsb1, dpsb2, dpsb3, tankb1, healb1, boat2)" value="3/1/1">
        <input type="submit" id="btnteamb2" onclick="pushBoat(arrayboat2, 'gunner-class 2', 'circle 2', dpsb1, dpsb2, tankb1, healb1, healb2, boat2)" value="2/1/2">
        <input type="submit" id="btnteamb3" onclick="pushBoat(arrayboat2, 'gunner-class 2', 'circle 2', dpsb1, dpsb2, tankb1, tankb2, healb1, boat2)" value="2/2/1">
        <input type="submit" id="p2-validate" onclick="displaybtn2()" value="Ready!" >
        
    </div>
</div>


<div class="container" id="container">

    <div class="boat-1" id="boat1">

    <h2 id="Boat-Title-1"></h2>
    
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



        // console.log(objboat1);

    // TEST FUNCTION ATTACK ALL

    // function def(arg1) {
    //     if (arg1.classList != ('clicked-attack')) {
    //         arg1.classList.toggle('click-defend')
    //     }
    // }

// function attack() {

//         let attaquant = document.getElementsByClassName('icon-attack');
//         let defenseur = document.getElementsByClassName('circle');
//         // let testatq = document.getElementsByClassName('icon-attack clicked-attack');
//         // let testdef = document.getElementsByClassName('circle 1 clicked-defend');
//         // let valuetest = testdef.value;


//     for (i = 0; i < attaquant.length; i++) {
//             attaquant[i].addEventListener('click', function(event) {
//                 this.classList.toggle('clicked-attack');
                
//             });
//             defenseur[i].addEventListener('click', function(event) {
//                 this.classList.toggle('clicked-defend');

//             })
            // attaquant[i] = arrayboat1[i];


            // let valuedef = newDiv2.value.Gunnerpv
            // console.log(valuedef);
        // console.log(attaquant[i].Gunnerdps);
        
        // if (i.classList != ('clicked-attack')) {
        // i.classList.toggle('click-defend')
        // }
        // def(attaquant[i]);

        // arrayboat2[i].Gunnerpv = (arrayboat2[i].Gunnerpv - arrayboat2[i].Gunnerdps);

//     }


// }   

// function clickedatq(arg1) {
//     arg1.addEventListener('click', function(event) {
//         this.classList.toggle('clicked-attack');
//     });
// }

// function clickeddef(arg1) {
//     arg1.addEventListener('click', function(event) {
//         this.classList.toggle('clicked-defend');
//     });
// }


// function attack() { 

//     for (i = 0; i < arrayboat1.length; i++) {
//         clickedatq(arrayboat1[i]);
//     };


//     for (i = 0; i < arrayboat2.length; i++) {
//         clickeddef(arrayboat2[i]);
//     }


// }   


    
    // Création Array BOAT 1 & 2
    var arrayboat1 = [dpsa1, dpsa2, dpsa3, tanka1, heala1];
    var arrayboat2 = [dpsb1, dpsb2, dpsb3, tankb1, healb1];


        //TEST Creation graphique des Avatars Gunners + INFO GUNNER
        function create(arg1, arg2, arg3, arg4) {



            for (let i in arg1) {
                
                // Boat Name
                var newH21 =document.createElement("h2"); 
                newH21.id= "Boat-Title-1";


                var newH2 = document.createElement("h2");
                newH2.className = arg2 + i + '';
                let name = document.createTextNode(arg1[i].Gunnerclass)
                newH2.appendChild(name);

                //div info-gunner
                var newDiv1 = document.createElement("div");
                newDiv1.className = "info-gunner";

                //div circle
                var newDiv2 = document.createElement("div");
                newDiv2.className = arg3;
                newDiv2.id = arg3+i+'';
                newDiv2.style = 'background-image: url(' + arg1[i].Gunnerimg + ');'
                // newDiv2.value = arg1[i];
                // console.log(newDiv2.value);

                //DIV PV-GUNNER 
                var newDiv3 = document.createElement("div");
                newDiv3.className = "pv-gunner";
                newDiv3.style = 'background-image: url("./assets/img/cardiogram.png");'

                // SPAN PV
                var newSpan1 = document.createElement("span");
                newSpan1.className = arg2+'pv'+i;
                let pv = document.createTextNode(arg1[i].Gunnerpv);
                
                //DIV DPS-GUNNER
                var newDiv4 = document.createElement("div");
                newDiv4.className = "dps-gunner";
                newDiv4.style = 'background-image: url("./assets/img/swords.png");'

                // SPAN DPS
                var newSpan2 = document.createElement("span");
                newSpan2.className = arg2 + "dps" + i;
                let dps = document.createTextNode(arg1[i].Gunnerdps);

                //DIV SEPARATOR
                var newDiv5 = document.createElement("div");
                newDiv5.className = "separator";

                 //DIV ATTACK
                 var newDiv6 = document.createElement("div");
                newDiv6.className = "icon-attack";
                // newDiv6.value = i;
                // newDiv6.onclick = attack();
                newDiv6.style = 'background-image: url("./assets/img/slash.png");'

                arg4.appendChild(newH21);
                arg4.appendChild(newH2);
                arg4.appendChild(newDiv1);
                newDiv1.appendChild(newDiv2);
                newDiv1.appendChild(newDiv3);
                newDiv3.appendChild(newSpan1);
                newSpan1.appendChild(pv);
                newDiv1.appendChild(newDiv4);
                newDiv4.appendChild(newSpan2);
                newSpan2.appendChild(dps);
                newDiv1.appendChild(newDiv5);
                newDiv1.appendChild(newDiv6);
                
            }
            document.getElementById("Boat-Title-1").innerHTML = str1;
            console.log(arg1)

        }
        
        // appel fonction de creation graphique de Boat1
        create(arrayboat1, 'gunner-class 1', 'circle 1', boat1)
        


    
    </script>
        
    </div>

    <div class="boat-2" id="boat2">
    
    <h2 id="Boat-Title-2"></h2>

    <script>
        // appel fonction de creation graphique de Boat2
        create(arrayboat2, 'gunner-class 2', 'circle 2', boat2)
    </script>


        
    </div>

</div>




<div class="button-attack">
    <input type="submit" id="btnattacka" onclick="attackA()" value="A l'abordage">
    <input type="submit" id="btnattackb" onclick="attackB()" value="B l'abordage">
</div>





<script>




// Function push pré-compo team
function pushBoat(arg1, arg2, arg3, arg4, arg5, arg6, arg7, arg8,arg9) {
    arg1 = [];
    arg1.push(arg4, arg5, arg6, arg7, arg8);

    for (let i in arg1) {
        let title = document.getElementsByClassName(arg2+i+'')
        let circle = document.getElementById(arg3+i+'');
        let pv = document.getElementsByClassName(arg2+'pv'+i);
        let dps = document.getElementsByClassName(arg2+'dps'+i);

            for(let data of title){
                data.textContent = ''+arg1[i].Gunnerclass+'';
            }

            for (let data2 of pv){
                data2.textContent = ''+arg1[i].Gunnerpv+'';
            }

            for (let data3 of dps){
                data3.textContent = ''+arg1[i].Gunnerdps+'';
            }
            

        circle.style= 'background-image: url('+arg1[i].Gunnerimg+');';

    }

    console.log(arg1);
    

}


function attackA() {

  for (let i in arrayboat2) {
      arrayboat2[i].Gunnerpv = (arrayboat2[i].Gunnerpv - arrayboat1[i].Gunnerdps);

      if (arrayboat2[i].Gunnerpv < 1) {
          arrayboat2.splice([i],1);
      }
  }

  // Vide le Boat pour le remplir des gunners encore en vie
  $("#boat2").empty();

  create(arrayboat2, 'gunner-class 2', 'circle 2', boat2);
  
  document.getElementById('btnattackb').style.display = 'block';
  document.getElementById('btnattacka').style.display = 'none';

  endGame();

}


// Pattern Attack BOAT 2
function attackB() {
 
  for (let i in arrayboat1) {
          arrayboat1[i].Gunnerpv = (Number(arrayboat1[i].Gunnerpv) - Number(arrayboat2[i].Gunnerdps));

      if (arrayboat1[i].Gunnerpv < 1) {
          arrayboat1.splice([i],1);
      }
  }

  $("#boat1").empty();
  create(arrayboat1, 'gunner-class 1', 'circle 1', boat1)
  
  
  document.getElementById('btnattackb').style.display = 'none';
  document.getElementById('btnattacka').style.display = 'block';


  endGame();

}


// Joueur 1 Selectionne son bateau et stock son nom dans la variable str1
var str1 = 'Nom Bato 1';

function selectboat1() {
    var checks = document.getElementsByClassName('boxes1');

    
    for (i=0; i<checks.length; i++) {

        if (checks[i].checked === true) {
            str1 = checks[i].value + " ";
            document.getElementById('select_boat1').style.display = 'none';
            document.getElementById('boatplayer1').style.display = 'block';
            document.getElementById('boat1').style.display = 'inline-grid';
            document.getElementById('button-p1').style.display = 'inline-grid';
            document.getElementById("Boat-Title-1").innerHTML = str1;
        }
    }

}

// Joueur 1 Selectionne son bateau et stock son nom dans la variable str1
var str2 = 'Nom bato 2';

function selectboat2() {

    var checks = document.getElementsByClassName('boxes2');

    for (i=0; i<checks.length; i++) {

        if (checks[i].checked === true) {
            str2 = checks[i].value + " ";
            document.getElementById('select_boat2').style.display = 'none';
            document.getElementById('boatplayer2').style.display = 'block';
            document.getElementById('boat2').style.display = 'inline-grid';
            document.getElementById('button-p2').style.display = 'inline-grid';
            document.getElementById("Boat-Title-2").innerHTML = str2;


        }
    }


}
function displaybtn1() {
    document.getElementById('button-p1').style.display = 'none';
}

function displaybtn2() {
    document.getElementById('button-p2').style.display = 'none';
    document.getElementById('btnattacka').style.display = 'block';
}


function endGame() {
    var popUp = document.getElementById('victoire');

    if (arrayboat1.length == 0) {
        popUp.innerHTML += `Victoire de ${str1}`
        document.getElementById('popupVictory').style.display = 'block';
    }

    else if (arrayboat2.length == 0) {
        popUp.innerHTML += `Victory of ${str2}`
        document.getElementById('popupVictory').style.display = 'block';
    }

}

</script>
    <div class="containerboats">
        <div id="boatplayer1"></div>
        <div id="boatplayer2"></div>
    </div>

<!-- Pop Up Victoire -->
<div id="popupVictory">
    <p id="victoire"></p>
    <img  id="treasure" src="assets/img/treasure.png" alt="">
    <input id="btnvictoire" type="submit" value="Récuperer le trésor">
</div>


    <!-- Image audio -->
    <audio id="audio" src="assets/audio/les_gentils_pirates.mp3"></audio>
    <img id="skull" src="assets/img/skull.png" onclick="play()" alt="">


<script>
  document.getElementById("btnvictoire").onclick = function () {
        location.href = `index.php?victoire=${str1}`;
    };
    </script>


</body>
</html>