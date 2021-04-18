<?php   session_start();
 $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');


  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();


            if (isset($_SESSION['id'])) {

    echo '<div id="div_profil">';

    echo '<img id="avatar" src="membres/avatar/' . $userinfo['avatar'] . '" width="150" />';

    echo '<a type="button" href="../../../user/editionprofil.php" class="bouton_inscription">
             editionprofil
           </a>';

    echo "</div>"; }
    
else{

   echo '<a type="button" href="../../../../user/inscription.php" id="bouton" class ="bouton_inscription">
            <h2>Inscription</h2> </a>

          <a type="button" href="../../../../user/connexion.php" id="bouton" class ="bouton_connexion">
            <h2>Connexion</h2>  
          </a>';


  } ?>