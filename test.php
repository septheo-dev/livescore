<?php include("fonctions.php"); ?>

<!DOCTYPE php>

<html lang="en">

<head>
  <title>Livescore</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header>
    
    <h1>LIVESCORE</h1>

  </header>

  <div id="container">

    <nav>

      <div id="centrer">

        <div id="sports">

          <a type="button" href="#" id="bouton" class ="bouton_football">
            <h2>Football</h2>
          </a>
          <a type="button" href="#"  id="bouton" class="bouton_rugby">  <h2>Rugby</h2>
          </a>
          <a type="button" href="#" class="bouton_basketball" id="bouton">
            <h2>Basketball</h2>
          </a>

        </div>


    </div>

    <div id="triangle-code"></div>
    
    <div id="pays">

      <div id="championnats">
        
       
      <a type="button" href="#" id="bouton" class ="bouton_football">
          <h2>Ligue 1</h2>
      </a>
        <a type="button" href="#"  id="bouton" class="bouton-premier-league">  <h2>Premier League</h2>
        </a>
        <a type="button" href="#" class="bouton_basketball" id="bouton">
          <h2>Ligua</h2>
        </a>  
      
      </div>


            <div id="resultatfootball">

    <?php echo $test=match_ligue1('france','ligue-1'); ?>
    <?php echo $test=match_ligue1('espagne','ligua'); ?>


      </div> 

      <div id="classement">
        
        <?php
        
        $curl1 = curl_init('https://matchendirect-api.herokuapp.com/classement/pays/france/championnat/ligue-1');

              curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
              $data1 = curl_exec($curl1);
              if ($data1 === false ) 
              {
                var_dump(curl_error($curl1));
              } 

        else {
    
        // Open the table
        echo "<table>";

        for ($i=0; $i < 20 ; $i++) { 
            echo '<tr>';
            echo '<td>' . $data1[$i]["place"] . '</td>';
            echo '<td>' . $data1[$i]["equipe"] . '</td>';
            echo '<td>' . $data1[$i]["points"] . '</td>';
            echo '</tr>';
        }

        // Close the table
        echo "</table>";
    
  }
  curl_close($curl); 
?>
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

