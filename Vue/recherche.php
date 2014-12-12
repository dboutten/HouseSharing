<?php
    $entete = entete("Mon site / Recherche");
    $menu = menu("recherche");

    $contenu = "<h2>Contenu de recherche</h2>";
    //$contenu .= "Liste des utilisateurs";
    $contenu .= "Ceci est la recherche";
    //while($ligne = $reponse->fetch()){
       // $contenu .= "<li>".$ligne['identifiant']."</li>";
    //}
    $contenu .= "</ul>";
    
    $pied = pied();

    include 'gabarit.php';
?>
