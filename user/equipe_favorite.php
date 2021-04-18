<head>
  <title>Livescore</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/c8389bed8e.js" crossorigin="anonymous">
  <?php include("../fonctions.php"); ?>
  <script src="js/jquery.js"></script>
<script src="js/jquery-ui.min.js"></script>
  </script>
</head>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '');


$reponse = $bdd->query('SELECT nom_equipe FROM equipe_favorite');

?>



<!DOCTYPE php>

<html lang="en">


<head>
  <title>Livescore</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/c8389bed8e.js" crossorigin="anonymous">
  <?php include("../../../fonctions.php"); ?>
  </script>
</head>

<body>

  <header>
    
    <h1>LIVESCORE</h1>

    <?php   session_start();
 $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');


  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();


            if (isset($_SESSION['id'])) {

    echo '<div id="div_profil">';

    echo '<img id="avatar" src="membres/avatar/' . $userinfo['avatar'] . '" width="150" />';

    echo '<a type="button" href="editionprofil.php" class="bouton_inscription">
             editionprofil
           </a>';

    echo "</div>"; }
    
else{

   echo '<a type="button" href="inscription.php" id="bouton" class ="bouton_inscription">
            <h2>Inscription</h2> </a>

          <a type="button" href="connexion.php" id="bouton" class ="bouton_connexion">
            <h2>Connexion</h2>  
          </a>';


  } ?>

  </header>

  <div id="container">

    <nav>
      <div id="centrer">

        <div id="sports">

          <a type="button" href="../sports/football/pays/#" id="bouton" class ="bouton_football">
            <h2>Football</h2>
          </a>

        </div>


    </div>

    <div id="triangle-code"></div>
    
    <div id="championnats">

      <div id="pays">

      <div id="ref">BIG FIVE</div>

    </br>

      <a type="button" href="../sports/football/pays/top/ligue1.php" id="bouton" class ="bouton_football">
          <h2>Ligue 1</h2>
      </a>

      <a type="button" href="../sports/football/pays/top/premierleague.php" id="bouton" class ="bouton_football">
          <h2>Premier League</h2>
      </a>

      <a type="button" href="../sports/football/pays/top/liga.php" id="bouton" class ="bouton_football">
          <h2>Liga</h2>
      </a>

      <a type="button" href="../sports/football/pays/top/serieA.php" id="bouton" class ="bouton_football">
          <h2>Serie A</h2>
      </a>

      <a type="button" href="../sports/football/pays/top/bundesliga.php" id="bouton" class ="bouton_football">
          <h2>Bundesliga</h2>
      </a>

    </br>

      <div id="ref">TOP PAYS</div>

        </br>

          <a type="button" href="../sports/football/pays/france.php" id="bouton" class ="bouton_football">
              <h2>France</h2>
          </a>
            <a type="button" href="../sports/football/pays/angleterre.php"  id="bouton" class="bouton-premier-league">  <h2 class="bouton">Angleterre</h2>
            </a>
            <a type="button" href="../sports/football/pays/espagne.php" class="bouton" id="bouton">
              <h2>Espagne</h2>
            </a>  

            <a type="button" href="../sports/football/pays/italie.php" class="bouton" id="bouton">
              <h2>Italie</h2>
            </a>

            <a type="button" href="../sports/football/pays/allemagne.php" class="bouton" id="bouton">
              <h2>Allemagne</h2>
            </a>

            <a type="button" href="../sports/football/pays/belgique.php" class="bouton" id="bouton">
              <h2>Belgique</h2>
            </a>

            <a type="button" href="../sports/football/pays/paysbas.php" class="bouton" id="bouton">
              <h2>Pays-Bas</h2>
            </a>

             <a type="button" href="../sports/football/pays/ecosse.php" class="bouton" id="bouton">
              <h2>Ecosse</h2>
            </a>

            <a type="button" href="../sports/football/pays/turquie.php" class="bouton" id="bouton">
              <h2>Turquie</h2>
            </a>

            <a type="button" href="../sports/football/pays/algerie.php" class="bouton" id="bouton">
              <h2>Algérie</h2>
            </a>

            <a type="button" href="../sports/football/pays/etatsunis.php" class="bouton" id="bouton">
              <h2>Etats-Unis</h2>
            </a>

            <a type="button" href="../sports/football/pays/bresil.php" class="bouton" id="bouton">
              <h2>Brésil</h2>
            </a>

            <a type="button" href="../sports/football/pays/europe.php" class="bouton" id="bouton">
              <h2>Europe</h2>
            </a>

            <a type="button" href="../sports/football/pays/monde.php" class="bouton" id="bouton">
              <h2>Monde</h2>
            </a>

            <?php 
            
            if (isset($_SESSION['id'])) {
    echo '<div id="ref">Favori</div>'; 

     echo '<a type="button" href=../../../user/equipe_favorite.php" class="bouton" id="bouton">
      <h2>equipe</h2></a>';

           echo '<a type="button" href="../sports/football/pays/#" class="bouton" id="bouton">
             <h2>matchs</h2>
           </a>'; }
else{

  } ?>

      </div>


            <div id="resultatfootball">
<?php
while ($donnees = $reponse->fetch())
{
?>

    <strong style="color: white;"> : <?php 

   $string=$donnees['nom_equipe'];

   $test=strip_tags(str_replace(" ","-",$string));

   $appel=equipe_favorite($test);

     ?> </strong>

    <br />
  
 <?php
}

echo $test;



$reponse->closeCursor();
?>

    </br>


      </div> 

      </div>


        </div>    

      </div>
    
    </div>
    
    </nav>

    </div>



</body>

</html>


Theo Trevalinet, Baptiste Cachot ICAM LILLE

