<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_POST['forminscription']))
{
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $mail = htmlspecialchars($_POST['mail']);
  $mail2 = htmlspecialchars($_POST['mail2']);
  $mdp = sha1($_POST['mdp']);
  $mdp2 = sha1($_POST['mdp2']);

  if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
  {
    $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo =?");
        $reqpseudo->execute(array($pseudo));
        $pseudoexist = $reqpseudo->rowCount();
        if ($pseudoexist == 0)
        {
          if($mail == $mail2)
          {
            $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail =?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            if ($mailexist == 0)
            {
              if($mdp == $mdp2)
              {
                $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                $insertmbr->execute(array($pseudo,$mail, $mdp));
                $erreur ="Votre compte a bien été crée ! <a href=\"connexion.php\">Me connecter</a>";
              }
              else
              {
                $erreur ="Vos mots de passes ne correspondent pas !";
              }
            }
            else
            {
              $erreur = "Cette adresse mail est déjà utilisée !";
            } 
          }
          else
          {
            $erreur ="Vos adresses mails ne correspondent pas !";
          }
        }
        else
        {
          $erreur = "Ce pseudo existe déjà !";
        }  
  }
  else
  {
    $erreur ="Tous les champs doivent être remplis !";
  }
}

?>

<!DOCTYPE php>
<html lang="en">
 <head>
  <title>Inscription</title>
  <meta charset="utf-8">
 </head>
 <div align="left">
 <a type="button" href="../sports/football/pays/france.php" id="bouton" class ="bouton_retour">
            <h2>Retour</h2>
           </a>
 <body>
   <div align="center">
     <h2>Inscription</h2>
     <br /><br />
     <form method="POST" action="">
       <table>
         <tr>
           <td align="right">
             <label for="pseudo"> Pseudo :</label>
           </td>
           <td>
             <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
           </td>
         </tr>
         <tr>
           <td align="right">
             <label for="mail"> Mail :</label>
           </td>
           <td>
             <input type="email" id="mail" name="mail" placeholder="Votre mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
           </td>
         </tr>
         <tr>
           <td align="right">
             <label for="mail2"> Confirmation du mail :</label>
           </td>
           <td>
             <input type="email" id="mail2" name="mail2" placeholder="Votre confirmation de mail" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
           </td>
         </tr>
         <tr>
           <td align="right">
             <label for="mdp"> Mot de passe :</label>
           </td>
           <td>
             <input type="password" id="mdp" name="mdp" placeholder="Votre mdp" />
           </td>
         </tr>
         </tr>
         <tr>
           <td align="right">
             <label for="mdp2"> Confirmation du mot de passe :</label>
           </td>
           <td>
             <input type="password" id="mdp2" name="mdp2" placeholder="Votre confirmation de mdp" />
           </td>
         </tr>
         <tr>
           <td></td>
           <td align="center">
             <br />
             <input type="submit" name="forminscription" value="Je m'inscris" />
           </td>
         </tr>
       </table>
     </form>
     <?php
     if(isset($erreur))
     {
       echo '<font color="red">'.$erreur."</font>";
     }
     ?>

          
 </body>

</html>