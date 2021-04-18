<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_SESSION['id']))
{
  $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
  $requser->execute(array($_SESSION['id']));
  $user = $requser->fetch();

  if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'])
  {
    $newpseudo = htmlspecialchars($_POST['newpseudo']); 
    $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
    $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
    header('Location: profil.php?id='.$_SESSION['id']);
  }

  if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
  {
    $newmail = htmlspecialchars($_POST['newmail']); 
    $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
    $insertmail->execute(array($newmail, $_SESSION['id']));
    header('Location: profil.php?id='.$_SESSION['id']);
  }

  if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
  {
    $mdp1 = sha1($_POST['newmdp1']);
    $mdp2 = sha1($_POST['newmdp2']);

    if($mdp1 == $mdp2)
    {
      $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
      $insertmdp->execute(array($mdp1, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
    }
    else
    {
      $msg = "Vos deux mots de passes ne correspondent pas !";
    }
  }

  if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
  {
    $tailleMax = 2097152;
    $extensionsvalides = array('jpg','jpeg','gif','png');
    if($_FILES['avatar']['size'] <= $tailleMax)
    {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsvalides))
      {
        $chemin = "membres/avatar/".$_SESSION['id'].".".$extensionUpload;
        $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
        if($resultat)
        {
          $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
          $updateavatar->execute(array('avatar' => $_SESSION['id'].".".$extensionUpload,'id' => $_SESSION['id']));
          header('Location: profil.php?id='.$_SESSION['id']);
        }
        else
        {
          $msg = "Il y a eu une erreur lors de l'importation de votre photo de profil";
        }
      }
      else
      {
        $msg = "Votre photo de profil doit être au format jpg,jpeg,gif ou png";
      }
    }
    else
    {
      $msg = "Votre photo de profil dépasse la taille maximal autorisée";
    }

}



?>

<!DOCTYPE php>
<html lang="en">
 <head>
  <title>Profil</title>
  <meta charset="utf-8">
 </head>
         <a type="button" href="../sports/football/pays/france.php" id="bouton" class ="bouton_retour">
            <h2>Retour</h2>
           </a>
 <body>


   <div align="center">
     <h2>Edition de mon profil</h2><br />
     <form method="POST" action="" enctype="multipart/form-data">
      <table>
         <tr>
           <td align="right">
             <label>Pseudo :</label>
           </td>
           <td>
             <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" />
           </td>
         </tr>
         <tr>
           <td align="right">
             <label>Mail :</label>
           </td>
           <td>
             <input type="email" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" />
           </td>
         </tr>
         <tr>
           <td align="right">
             <label>Mot de passe :</label>
           </td>
           <td>
            <input type="password" name="newmdp1" placeholder="Mot de passe" />
           </td>
         </tr>
         <tr>
           <td align="right">
             <label>Confirmation du mot de passe :</label>
           </td>
           <td>
             <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" />
           </td>
         </tr>
          <tr>
           <td align="right">
             <label>Avatar :</label>
           </td>
           <td>
             <input type="file" name="avatar"/>
           </td>
         </tr>
         <tr> 
           <td></td>
           <td align="left">
             <br />
             <input type="submit" value="Mettre à jour mon profil" />
             <a href="deconnexion.php">Deconnexion</a>

           </td>
         </tr>
      </table>
     </form>
     <?php if(isset($msg)) { echo $msg; } ?>
  </body>

</html>
<?php
}
else
{
  header("Location: connexion.php");
}
?>