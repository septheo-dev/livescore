<?php  


      $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

    @$equipe=$_POST["equipe"];
    @$valider=$_POST["valider"];
   
    if(isset($valider))
    {
        {
          echo  "Vous avez ajouté à myteam le ou les équipes suivante " ;
          echo @implode("",$equipe);
          echo "<hr />";
          $reqfavoris = $bdd->prepare("INSERT INTO match_favori(equipe_domicile,equipe_exterieur) VALUES (?, ?)");
          $reqfavoris->execute(array(implode("-",$equipe)));
        }
    }

$url1 = 'https://matchendirect-api.herokuapp.com/pays/france/championnat/ligue-1';

$json1 = file_get_contents($url1);
$data1 = json_decode($json1, true);
$compter1 = count($data1);

for ($i=0; $i < $compter1 ; $i++) { 
    

    
$infos = $data1[$i]['equipe_domicile'].'_'.$data1[$i]['equipe_exterieur']; ?>

        <form action='traitement.php' method='post'>
    
          <input type="checkBox" id="valider" name="choixCheckBox[]" value="<?php echo $infos; ?>">

          <label><?= $infos ?></label>

          <input type="submit" name="valider" value="Ajouter" >

        </form>  

          <?php } ?>
