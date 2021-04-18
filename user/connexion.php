<?php
session_start();


$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_POST['formconnexion']))
{
  $pseudoconnect = htmlspecialchars($_POST['pseudo']);
  $mdpconnect = sha1($_POST['mdp']);
  if(!empty($pseudoconnect) AND !empty($mdpconnect))
  {
    $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
    $requser->execute(array($pseudoconnect, $mdpconnect));
    $userexist = $requser->rowCount();
    if($userexist == 1)
    {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
      $_SESSION['mail'] = $userinfo['mail'];   
      header("Location: profil.php?id=".$_SESSION['id']);


    }
    else
    {
      $erreur = '<div style="color: white;">Votre pseudo ou mot de passe nest pas valide ! <a href="inscription.php"><br />Pas encore de compte ? Cliquer ici pour vous inscrire !</a></div>';
    }
  }
  else
  {
    $erreur ="Tous champs doivent être remplis ! <a href=\"inscription.php\"><br />Pas encore de compte ? Cliquer ici pour vous inscrire !</a>";
  }

}
  



?>

<!DOCTYPE php>
<html lang="en">
 <head>
  <title>Connexion</title>
  <link rel="stylesheet" href="../style.css">
  <meta charset="utf-8">
 </head>
 <div align="left">
 <a type="button" href="../sports/football/pays/france.php" id="bouton" class ="bouton_retour">
            <h2>Retour</h2>
           </a>
 <body id="Connexion">
   <div align="center" id="container_connexion">
     <h2 style="color: white;">Connexion</h2>
     <br /><br />
     <form method="POST" action="">
     <input type="text" name="pseudo" placeholder="Pseudo" id="pseudo" />
     <input type="password" name="mdp" placeholder="Mot de passe" id="mdp" />
     <input type="submit" name="formconnexion" value="Se connecter" id="connexion_bouton" />
       
       
       
     </form>
     <?php
     if(isset($erreur))
     {
       echo '<font color="red">'.$erreur."</font>";
     }
     ?>

          
 </body>

</html>