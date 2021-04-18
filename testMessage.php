<?php

$url = 'https://matchendirect-api.herokuapp.com/pays/espagne/championnat/primera-division';

$json = file_get_contents($url);
$data = json_decode($json, true);
$compter = count($data);

        echo '<div class="championnat_entete">'.$championnat.'</div>';
        
         for ($i=0; $i < $compter ; $i++) { 
          
          {

          echo "</br>";

          echo '<div id="match1">';

          echo '<div class="equipe_domicile">' . $data[$i]["equipe_domicile"] . '</div>';

          echo '<div class="score">';

                if ($data["$i"]["score"] == "") {

                  echo '<div class="score"> ?-? </div>';}

                else{              

                  {

                    echo  '<a class="score" href="#" >'.$data["$i"]["score"].'</a>';

                  }

                }

          echo '</div>';

          echo '<div class="equipe_exterieur">' . $data[$i]["equipe_exterieur"] . '</div>';

          echo '<button class="star"><i class="fas fa-x4 fa-star tm-icon"></i></button>';

          echo "</div>";
          }

        } //fin du for

        echo "</br>";

?>
        