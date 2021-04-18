<!DOCTYPE php>

<html lang="en">


<head>
  <title>Livescore</title>
  <link rel="stylesheet" href="../../../style.css">
  <script src="https://kit.fontawesome.com/c8389bed8e.js" crossorigin="anonymous">
  <?php include("../../../fonctions.php"); ?>
  </script>
</head>

<body>

  <header>
    
    <h1>LIVESCORE</h1>

    <?php include '../../../user/bouton_edition.php'; ?>

  </header>

  <div id="container">

    <nav>
      <div id="centrer">

        <div id="sports">

          <a type="button" href="#" id="bouton" class ="bouton_football">
            <h2>Football</h2>
          </a>

        </div>


    </div>

    <div id="triangle-code"></div>
    
<?php include '../../../boutons.php'?>;

            <div id="resultatfootball">

    <?php echo $test=fonction_match("algerie","1-division"); ?>
    <?php echo $test=fonction_match('algerie','2eme-division'); ?>

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

