<?php
    $entete = entete("Mon site / Mon Compte");
    $menu = menu("moncompte");
    $sousmenu = sousmenucompte("mesinfos");
    $contenu = "<h2>Contenu de mon compte</h2>";
    $pied = pied();

    include 'gabarit.php';
?>
