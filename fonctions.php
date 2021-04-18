  <script src="https://kit.fontawesome.com/c8389bed8e.js" crossorigin="anonymous"></script>
  <script src="jquery.js"></script>

<script src="jquery-1.11.1.min.js"></script>

<?php 


function fonction_match($pays,$championnat)
     
     {   


      $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

          @$equipe=$_POST["equipe"];
    @$valider=$_POST["valider"];
   
    if(isset($valider))
    {
        {
          echo  "Vous avez ajouté à myteam le ou les équipes suivante " ;
          echo @implode("",$equipe);
          echo "<hr />";
          $reqfavoris = $bdd->prepare("INSERT INTO equipe_favorite(nom_equipe) VALUES (?)");
          $reqfavoris->execute(array(implode("-",$equipe)));
        }
    }
    



        echo '<div id="matchsplusclassement">';

        $url1 = 'https://matchendirect-api.herokuapp.com/pays/'.$pays.'/championnat/'.$championnat;

$json1 = file_get_contents($url1);

$data1 = json_decode($json1, true);
$compter1 = count($data1);


      echo '<div id="matchs">';

        echo '<div class="championnat_entete">'.$championnat.'</div>';
        
         for ($i=0; $i < $compter1 ; $i++) { 
          
          {

          echo "</br>";

          echo '<form id="match1" method="post" action="">';

          
          echo '<label class="equipe_domicile">' . $data1[$i]["equipe_domicile"]. '</label>';

          echo '<input type="checkbox" name="equipe[]" value="'.$data1[$i]["equipe_domicile"].'"  >';

          echo '<div class="score">';

                if ($data1[$i]["score"] === "& nbsp;") {

                  echo '<div class="score"> ?-? </div>';}

                else           

                  { 

                    echo  '<a class="score" href="#" >'.$data1[$i]["score"].'</a>';

                  

                }//fin du else

          echo '</div>';

          echo '<input type="checkbox" name="equipe[]" value="'.$data1[$i]["equipe_exterieur"].'"  >';

          echo '<label class="equipe_exterieur">' . $data1[$i]["equipe_exterieur"] .  '</label>';

        echo '<button class="star" id="star" value=""><i class="fas fa-x4 fa-star tm-icon"></i></button>';


 echo '<input type="submit" name="valider" value="Ajouter" >';

        echo "</form>";
          }

        } //fin du for




        
echo "</div>";

  $url = 'https://matchendirect-api.herokuapp.com/classement/pays/'.$pays.'/championnat/'.$championnat;
  $json = file_get_contents($url);
  $data = json_decode($json, true);
  $compter = count($data);

          echo '<table class="tableau_classement">';
  echo "<tr>
        <td>place</td>
        <td>equipe</td>
        <td>points</td>
    </tr>";
  for ($i=0; $i < $compter ; $i++){
  
        echo "<tr>";
        echo '<td>'.$data["$i"]["place"].'</td>';
        echo '<td>'.$data["$i"]["equipe"].'</td>';
        echo '<td>'.$data["$i"]["points"].'</td>';
        echo "</tr>";


  
    }
     echo "</tbody></table>";

        echo "</br>";

        echo "</div>";

}

?>


<!--

function format_searh($caract){
    return strip_tags(str_replace(" ","-",$caract));//on vire les espaces
} -->

<?php

function equipe_favorite($equipe_favorite)

{


echo '<div id="matchsplusclassement">';

        $url2 = 'https://matchendirect-api.herokuapp.com/last-score/equipe/'.$equipe_favorite;

$json2 = file_get_contents($url2);
$data2 = json_decode($json2, true);
$compter2 = count($data2);


      echo '<div id="matchs_favoris">';

        echo '<div class="championnat_entete">'.$equipe_favorite.'</div>';
        
         for ($i=0; $i < 10 ; $i++) { 
          
          {

          echo "</br>";

          echo '<div id="match1" >';

          
          echo '<div class="equipe_domicile">' . $data2[$i]["equipe_domicile"]. '</div>';

          echo '<div class="score">';

                if ($data2[$i]["score"] == '\u00a0') {

                  echo '<div class="score"> ?-? </div>';}

                else{              

                  { 

                    echo  '<a class="score" href="#" >'.$data2[$i]["score"].'</a>';

                  }

                }//fin du else

          echo '</div>';

          echo '<div class="equipe_exterieur">' . $data2[$i]["equipe_exterieur"]. '</div>';

        echo "</div>";

          }

        } //fin du for

      }

?>


<!-- echo '<input type="submit" name="valider" value="Ajouter_equipes" >';

        echo "</form>";

        echo "<form>";

        echo '<input type="checkbox" name="equipe[]" value="'.$data1[$i]["equipe_domicile"].'"  >';

        echo '<input type="checkbox" name="equipe[]" value="'.$data1[$i]["score"].'"  >';

        echo '<input type="checkbox" name="equipe[]" value="'.$data1[$i]["equipe_exterieur"].'"  >';


 echo '<input type="submit" name="valider" value="Ajouter_match" >';

 echo "</form>";

 '<i class="fas fa-x4 fa-heart heart"></i>'.


 jQuery("input[type='checkbox']").change(function() {
jQuery(this).submit();
});

-->