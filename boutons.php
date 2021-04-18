    <div id="championnats">

      <div id="pays">

      <div id="ref">BIG FIVE</div>

    </br>

      <a type="button" href="top/ligue1.php" id="bouton" class ="bouton_football">
          <h2>Ligue 1</h2>
      </a>

      <a type="button" href="top/premierleague.php" id="bouton" class ="bouton_football">
          <h2>Premier League</h2>
      </a>

      <a type="button" href="top/liga.php" id="bouton" class ="bouton_football">
          <h2>Liga</h2>
      </a>

      <a type="button" href="top/serieA.php" id="bouton" class ="bouton_football">
          <h2>Serie A</h2>
      </a>

      <a type="button" href="top/bundesliga.php" id="bouton" class ="bouton_football">
          <h2>Bundesliga</h2>
      </a>

    </br>

      <div id="ref">TOP PAYS</div>

        </br>

          <a type="button" href="france.php" id="bouton" class ="bouton_football">
              <h2>France</h2>
          </a>
            <a type="button" href="angleterre.php"  id="bouton" class="bouton-premier-league">  <h2 class="bouton">Angleterre</h2>
            </a>
            <a type="button" href="espagne.php" class="bouton" id="bouton">
              <h2>Espagne</h2>
            </a>  

            <a type="button" href="italie.php" class="bouton" id="bouton">
              <h2>Italie</h2>
            </a>

            <a type="button" href="allemagne.php" class="bouton" id="bouton">
              <h2>Allemagne</h2>
            </a>

            <a type="button" href="belgique.php" class="bouton" id="bouton">
              <h2>Belgique</h2>
            </a>

            <a type="button" href="paysbas.php" class="bouton" id="bouton">
              <h2>Pays-Bas</h2>
            </a>

             <a type="button" href="ecosse.php" class="bouton" id="bouton">
              <h2>Ecosse</h2>
            </a>

            <a type="button" href="turquie.php" class="bouton" id="bouton">
              <h2>Turquie</h2>
            </a>

            <a type="button" href="algerie.php" class="bouton" id="bouton">
              <h2>Algérie</h2>
            </a>

            <a type="button" href="etatsunis.php" class="bouton" id="bouton">
              <h2>Etats-Unis</h2>
            </a>

            <a type="button" href="bresil.php" class="bouton" id="bouton">
              <h2>Brésil</h2>
            </a>

            <a type="button" href="europe.php" class="bouton" id="bouton">
              <h2>Europe</h2>
            </a>

            <a type="button" href="monde.php" class="bouton" id="bouton">
              <h2>Monde</h2>
            </a>

            <?php 
            
            if (isset($_SESSION['id'])) {

    echo '<div id="ref">Favori</div>'; 

     echo '<a type="button" href="../../../user/equipe_favorite.php" class="bouton" id="bouton">
      <h2>equipe</h2></a>';

           echo '<a type="button" href="#" class="bouton" id="bouton">
             <h2>matchs</h2>
           </a>'; }
else{

  } ?>

      </div>
