<?php
    $entete = entete("Mon site / Ajouter un logement");
    $menu = menu("moncompte");
    $sousmenu = sousmenucompte("meslog");
    $contenu = ajoutlog();
    $pied = pied();

    include 'gabarit.php';
?>