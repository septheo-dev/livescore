<?php 



    if (isset($_POST['choixCheckBox']) && is_array($_POST['choixCheckBox'])) {

    foreach ($_POST['choixCheckBox'] as $element)
	{

        $donnees = explode("_", $element);
        $donnee_equipe_domicile = $donnees[0];
        $donnee_score = $donnees[1];
        $donnee_equipe_exterieur = $donnees[2];

	    echo $donnee_equipe_domicile;
	    echo $donnee_score;
	    echo $donnee_equipe_exterieur;   
    }

} 

?>