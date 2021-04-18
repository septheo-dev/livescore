
require_once 'class/testMessage.php';
$match = new openweather()
$forecast = $match->getForecast('1');
var_dump($forecast);

       <?php 
         (session_start()

        if (match_found_in_database()) {

            $_SESSION['loggedin'] = true;
  			$_SESSION['pseudo'] = $pseudo; //$username coming from the form, such as $_POST['username']
                                       //something like this is optional, of course

         if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 

         {

   		echo '<div id="ref">Favori</div>'
     echo '<a type="button" href="monde.php" class="bouton" id="bouton">
      <h2>equipe</h2>
           </a>';
           echo '<a type="button" href="monde.php" class="bouton" id="bouton">
             <h2>match</h2>
           </a>'; 

       } 

        else {
   echo "Please log in first to see this page."; }
})
 ?>
